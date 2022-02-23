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
<section class="page-section page-builders">
	<div class="builder-container">
		<?php while($_builders->have_posts()): $_builders->the_post(); $_builderImage = get_field('homebuilder_rendering'); ?>
		<article class="builder" id="<?php echo str_replace(' ', '-', $post->post_name); ?>">
			<figure class="builder-image">
				<img src="<?php echo $_builderImage['url'] ?>" alt="<?php the_title() ?>" class="aligncenter img-fluid" />
			</figure>
			<p class="collection">
				<strong><?php if($post->post_name == 'lennar-th'): echo 'Lennar'; else: the_title(); endif; ?></strong>
			</p>
			<p class="pricing">
				<?php echo get_field('homebuilder_collection') ?><br/>
				<?php echo get_field('homebuilder_pricing'); ?>
			</p>
			<div class="description"><?php echo get_field('homebuilder_description') ?></div>

			<?php if($post->post_name == 'kb-home' || $post->post_name == 'richmond-american-homes'): ?>
				<a href="<?php the_permalink() ?>" title="view homes by <?php the_title() ?>" class="btn outline-btn gray-btn">View Homes</a>
			<?php else: ?>
				<a title="join vip list" class="btn contactBtn contactCallout outline-btn gray-btn" data-target="contactBox">Join VIP List</a>
			<?php endif; ?>
		</article>
		<?php endwhile; ?>
	</div>
</section>

<?php endif; ?>
