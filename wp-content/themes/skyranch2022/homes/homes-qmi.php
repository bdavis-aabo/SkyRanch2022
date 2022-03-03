<?php
	$_quickmoves = new WP_Query();
	$_args = array(
	  'post_type' 			=> 'quickmoves',
	  'post_status' 		=> 'publish',
	  'posts_per_page' 	=> -1,
	  'order' 					=> 'DESC',
	  'orderby' 				=> 'date'
	);
	$_quickmoves->query($_args);
?>

<?php if($_quickmoves->have_posts()): ?>
<section class="page-section page-builders page-qmi">
	<div class="builder-container">
	<?php while($_quickmoves->have_posts()): $_quickmoves->the_post();
		$_homeImage = get_field('home_image');
		$_terms = get_the_terms($post->ID, 'builder');
		$_builder = array_pop($_terms);
	?>
		<article class="builder" id="<?php echo str_replace(' ', '-', $post->post_name); ?>">
			<figure class="home-image">
				<img src="<?php echo $_homeImage['url'] ?>" alt="<?php the_title() ?>" class="aligncenter img-fluid" />
			</figure>
			<p class="collection">
				<strong><?php echo get_field('home_address') ?><strong><br/>
				<?php echo $_builder->name; ?>
			</p>
			<?php if(have_rows('home_details')): while(have_rows('home_details')): the_row(); ?>
			<p class="pricing details">
				<?php echo get_sub_field('home_square_footage') . ' sq. ft. | ' . get_sub_field('home_beds') . ' beds | ' . get_sub_field('home_baths') . ' bath | ' . get_sub_field('home_garage') . ' garage' ?>
			</p>
			<?php endwhile; endif; ?>
			<p>
				<?php if(get_field('home_price') != 'Coming Soon'): echo '$' . get_field('home_price'); else: echo get_field('home_price'); endif; ?>
			</p>

			<a href="<?php echo get_field('home_url') ?>" title="view home: <?php the_title() ?>" class="btn outline-btn gray-btn" target="_blank">View Home</a>
		</article>
	<?php endwhile; ?>
	</div>
</section>

<?php endif; ?>
