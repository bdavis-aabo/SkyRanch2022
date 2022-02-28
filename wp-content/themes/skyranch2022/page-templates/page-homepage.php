<?php /* Template Name: Page - Homepage */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<?php if(have_rows('homepage_heroimage')): while(have_rows('homepage_heroimage')): the_row();
		$_lgImage  = get_sub_field('large_heroimage');
		$_mobImage = get_sub_field('mobile_heroimage');
	?>
	<section class="homepage-section homepage-heroimage">
		<picture>
			<source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
			<img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
		</picture>
	</section>
	<?php endwhile; endif; // end heroimage ?>

	<section class="homepage-section homepage-content-section">
		<div class="homepage-container">
			<?php the_content() ?>
		</div>
		<div class="homepage-divider">
			<img src="<?php bloginfo('template_directory') ?>/assets/images/color-bar.png" class="img-fluid" alt="color bar" />
		</div>
	</section>

	<?php if(have_rows('homepage_callouts')): ?>
	<section class="homepage-section homepage-callout-section">
		<div class="callout-container">
		<?php while(have_rows('homepage_callouts')): the_row(); $_calloutImage = get_sub_field('callout_image'); ?>
			<article class="homepage-callout">
				<figure class="callout-image">
					<img src="<?php echo $_calloutImage['url'] ?>" alt="<?php echo $_calloutImage['alt'] ?>" class="img-fluid aligncenter" />
				</figure>
				<?php echo get_sub_field('callout_content') ?>

				<a href="<?php echo get_sub_field('callout_page') ?>" class="arrow-link">
					<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/arrow.svg') ?>
				</a>
			</article>
		<?php endwhile; ?>
		</div>
	</section>
	<?php endif; //homepage callouts ?>

	<?php if(have_rows('homepage_location_callout')): ?>
	<section class="homepage-section homepage-location-section">
		<div class="location-container">
			<?php while(have_rows('homepage_location_callout')): the_row(); ?>
			<div class="location-left-contents peach-bg">
				<div class="left-container">
					<?php echo get_sub_field('callout_content'); ?>
					<a href="<?php get_sub_field('callout_page') ?>" title="Everything important within reach." class="btn outline-btn white-btn">Learn more</a>
				</div>
			</div>
			<?php endwhile; ?>
			<div class="location-right">
				<div class="map-container homepage-map" id="homepageMap"></div>
			</div>
		</div>
	</section>

	<?php endif; // location callout ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
