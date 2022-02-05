<?php

$_contact = new WP_Query();
$_args = array(
  'post_type' 			=> 'page',
  'post_status' 		=> 'publish',
  'posts_per_page' 	=> 1,
	'pagename'				=> 'stay-connected'
);
$_contact->query($_args);
?>

<?php if($_contact->have_posts()): while($_contact->have_posts()): $_contact->the_post(); ?>
<section class="contact-form-section">
	<figure class="contact-logo">
		<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/skyranch-logo_gray.svg') ?>
	</figure>
	<button class="closeContactForm"><i class="fal fa-times"></i></button>
	<div class="contact-form-container">

		<div class="form-contents">
			<h1 class="white-txt"><?php the_title() ?></h1>
			<?php the_content() ?>
		</div>
	</div>
</section>

<?php endwhile; endif; ?>
