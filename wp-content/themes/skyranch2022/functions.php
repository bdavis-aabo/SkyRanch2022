<?php
// Theme Functions

/* Remove Admin Bar from Frontend */
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar(){
  show_admin_bar(false);
}

if (function_exists('add_theme_support')){
  // Add Menu Support
  add_theme_support('menus');

  // Add Thumbnail Theme Support
  add_theme_support('post-thumbnails');
  add_image_size('large', 700, '', true);  		// Large Thumbnail
  add_image_size('medium', 250, '', true); 		// Medium Thumbnail
  add_image_size('small', 125, '', true);  		// Small Thumbnail
  add_image_size('custom-size', 700, 200, true);  // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

  // Enables post and comment RSS feed links to head
  add_theme_support('automatic-feed-links');
}

add_action('after_setup_theme', 'wpt_setup');
if(!function_exists('wpt_setup')):
  function wpt_setup() {
    register_nav_menu('primary', __('Primary Navigation', 'wptmenu'));
  }
endif;

function wpt_register_js(){
  if( !is_admin()){
    wp_deregister_script('jquery');

    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.min.js', 'jquery', '', true);
    wp_enqueue_script('jquery.popper.min', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', 'jquery', '', true);
  	      wp_enqueue_script('jquery.bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', 'jquery', '', true);
  	      wp_enqueue_script(
      'jquery.extras.min',
      get_template_directory_uri() . '/assets/js/min/main.min.js',
      array(),
      filemtime(get_template_directory().'/assets/js/min/main.min.js'),
      true
    );

  }
}

function wpt_register_css(){
  wp_enqueue_style('bootstrap.min', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
  wp_enqueue_style('fontawesome.min', '//use.fontawesome.com/releases/v5.6.3/css/all.css');
  wp_enqueue_style(
    'main.min',
    get_template_directory_uri() . '/assets/css/main.min.css',
    array(),
    filemtime(get_stylesheet_directory().'/assets/css/main.min.css'),
    'all'
  );
}
add_action('init','wpt_register_js');
add_action('wp_enqueue_scripts', 'wpt_register_css');

// Custom Post Types
add_action('init','create_post_type');
function create_post_type(){
  register_post_type('home-builders', array(
	  'label' => __('Home Builders'),
    'singular_label' => __('Home Builder'),
    'public' => true,
    'show_ui' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'rewrite' => array('slug' => 'home-builders'),
    'supports' => array('title','author','excerpt','thumbnail','order','page-attributes','editor'),
    'menu_position' => 16,
    'has_archive' => true,
    'menu_icon' => 'dashicons-admin-home'
  ));
}


function modify_read_more_link(){
  $_moreLink = '<a class="link link--arrowed" href="' . get_permalink() . '">';
  $_moreLink .= file_get_contents(get_template_directory_uri() . '/assets/images/icons/arrow-icon.svg');
  $_moreLink .= '</a>';

  return $_moreLink;
}
add_filter('the_content_more_link', 'modify_read_more_link');

add_filter('get_the_archive_title', function($title) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
    $title = '<span class="vcard">' . get_the_author() . '</span>' ;
  } elseif ( is_tax() ) { //for custom post types
    $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
  } elseif (is_post_type_archive()) {
    $title = post_type_archive_title( '', false );
  }
  return $title;
});

// get post id by slug
function get_id_slug($slug){
  $post = get_page_by_path($slug);
  if($post){
    return $page->ID;
  } else {
    return null;
  }
}

// Add Class to Images posted on pages
function add_responsive_class($content){
  $content = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8');
  $document = new DOMDocument();
  libxml_use_internal_errors(true);
  $document->loadHTML(utf8_decode($content));

  $imgs = $document->getElementsByTagName('img');
  foreach($imgs as $img){
    $existing_class = $img->getAttribute('class');
    $img->setAttribute('class', 'img-fluid ' . $existing_class);
  }
  $html = $document->saveHTML();
	      return $html;
}
add_filter('the_content', 'add_responsive_class');

?>
