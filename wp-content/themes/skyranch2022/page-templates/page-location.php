<?php /* Template Name: Page - Location */ ?>

<?php get_header(); ?>

	<section class="page-section location-map-section">
		insert mapbox code
	</section>

	<section class="page-section page-content-section">
		<div class="page-content-container">
			<h1 class="page-title"><?php the_title() ?></h1>
			<?php the_content() ?>
		</div>
	</section>

	<section class="page-section location-images">
		<picture>
			<source media="(max-width: 520px)" srcset="<?php bloginfo('template_directory') ?>/assets/images/location-footer_mobile.jpg">
			<img src="<?php bloginfo('template_directory') ?>/assets/images/location-bottom_image.jpg" class="img-fluid" />
		</picture>
	</section>

<?php get_footer(); ?>
