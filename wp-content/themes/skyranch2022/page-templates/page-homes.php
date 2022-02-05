<?php /* Template Name: Page - Homes */ ?>

<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

	<?php if(have_rows('page_heroimage')): while(have_rows('page_heroimage')): the_row();
	$_lgImage  = get_sub_field('page_large_image');
	$_mobImage = get_sub_field('page_mobile_image');
	?>
	<section class="page-section homepage-heroimage">
		<picture>
			<source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
			<img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
		</picture>
	</section>
	<?php endwhile; endif; // end heroimage ?>

	<section class="page-section page-content-section">
		<div class="page-content-container">
			<h1 class="page-title"><?php the_title() ?></h1>
			<?php the_content() ?>
		</div>
		<div class="page-divider">
			<img src="<?php bloginfo('template_directory') ?>/assets/images/color-bar.png" class="img-fluid" alt="color bar" />
		</div>
		<h2 class="sub-heading">Home Collections</h2>
	</section>

	<?php if(is_page('homes')): get_template_part('page/page-builders'); endif; ?>


<?php endwhile; endif; // end loop ?>

<?php get_footer(); ?>
