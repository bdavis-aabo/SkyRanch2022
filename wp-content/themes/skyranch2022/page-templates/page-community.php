<?php /* Template Name: Page - Community */ ?>

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
		</section>

		<?php if(have_rows('community_education')): ?>
		<section class="page-section education-section">
			<div class="education-container">
				<?php while(have_rows('community_education')): the_row(); $_educationImage = get_sub_field('education_image'); ?>
				<figure class="education-image">
					<img src="<?php echo $_educationImage['url'] ?>" alt="<?php echo $_educationImage['alt'] ?>" class="img-fluid" />
				</figure>
				<div class="education-content peach-bg">
					<div class="education-content-container"><?php echo get_sub_field('education_content'); ?></div>
				</div>
				<?php endwhile; ?>
			</div>
		</section>
		<?php endif; ?>

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
