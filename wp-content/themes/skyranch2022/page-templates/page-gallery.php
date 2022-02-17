<?php /* Template Name: Page - Gallery */ ?>

<?php get_header(); ?>

<section class="page-section dkblue-bg blog-header">
	<h1>Our Gallery.</h1>
	<h3>lorem ipsum</h3>
</section>

<section class="page-section gallery-section">
	<div class="gallery-container">
		<?php echo do_shortcode('[envira-gallery slug="sky-ranch-photo-gallery"]') ?>
	</div>
</section>

<?php get_footer(); ?>
