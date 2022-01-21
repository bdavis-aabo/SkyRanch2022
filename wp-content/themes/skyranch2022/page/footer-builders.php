<?php
	$_builders = new WP_Query();
	$_args = array(
  	'post_type' 			=> 'page',
  	'post_status' 		=> 'publish',
  	'posts_per_page' 	=> -1,
  	'order' 					=> 'ASC',
  	'orderby' 				=> 'title',
		'post_parent'			=> get_id_slug('homes')
	);
	$_builders->query($_args);
?>

	<?php if($_builders->have_posts()): ?>
	<section class="footer-section dkblue-bg">
		<div class="builder-logo-container">
			<ul class="builder-list">
			<?php while($_builders->have_posts()): $_builders->the_post(); $_logo = get_field('homebuilder_logo'); ?>
				<li class="builder">
					<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
						<img src="<?php echo $_logo['url'] ?>" alt="<?php the_title() ?>" class="img-fluid aligncenter" />
					</a>
				</li>
			<?php endwhile; ?>
			</ul>
		</div>
	</section>





	<?php endif; ?>
