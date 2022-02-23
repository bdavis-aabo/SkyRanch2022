<?php /* Template Name: Page - Builder */ ?>

<?php get_header(); ?>

	<?php if(have_posts()): while(have_posts()): the_post();
		$_logo = get_field('homebuilder_logo');
	?>
		<?php if(have_rows('page_heroimage')): while(have_rows('page_heroimage')): the_row();
			$_lgImage  = get_sub_field('page_large_image');
			$_mobImage = get_sub_field('page_mobile_image');
		?>
		<section class="page-section builder-heroimage">
			<picture>
				<source media="(max-width: 520px)" srcset="<?php echo $_mobImage['url'] ?>">
				<img src="<?php echo $_lgImage['url'] ?>" alt="<?php echo $_lgImage['alt'] ?>" class="heroimage-img img-fluid" />
			</picture>
			<div class="ltblue-bg builder-logo">
				<img src="<?php echo $_logo['url'] ?>" alt="<?php the_title() ?>" class="img-fluid" />
			</div>
		</section>
		<?php endwhile; endif; ?>

		<section class="page-section page-content-section">
			<div class="page-content-container">
				<?php the_content() ?>

				<p class="builder-location">
					<strong>Sales Office Information</strong><br/>
					<?php if(is_page('kb-home')): ?> Temporary sales office located at:<br/><?php endif; ?>
					<?php echo get_field('homebuilder_address') ?><br/>
					<?php echo get_field('homebuilder_phone') ?>
				</p>
				<p class="builder-hours">
					<strong><?php echo 'Sales Office Hours' ?></strong><br/>
					<?php echo get_field('homebuilder_hours') ?>
				</p>
			</div>
			<div class="page-divider">
				<img src="<?php bloginfo('template_directory') ?>/assets/images/color-bar.png" class="img-fluid" alt="color bar" />
			</div>
		</section>

		<?php if(have_rows('homebuilder_plans')): ?>
		<section class="page-section builder-plan-section">
			<div class="plan-container">
			<?php while(have_rows('homebuilder_plans')): the_row(); $_planImage = get_sub_field('plan_image'); ?>
				<div class="builder-plan">
					<figure class="plan-image">
						<img src="<?php echo $_planImage['url'] ?>" alt="<?php echo get_sub_field('plan_name') ?> - image" class="img-fluid aligncenter" />
					</figure>
					<div class="plan-information">
						<p class="collection">
							<strong><?php echo get_sub_field('plan_name') ?></strong><br/>
							<?php the_title(); ?>
						</p>
						<p class="pricing">
							<?php echo 'Priced from ' . get_sub_field('plan_price'); ?>
						</p>
						<p class="plan-details">
							<?php echo get_sub_field('plan_details'); ?>
						</p>
						<?php if(get_sub_field('plan_link') != ''): ?>
							<p class="plan-link">
								<a href="<?php echo get_sub_field('plan_link') ?>" title="view homes by <?php the_title() ?>" class="btn outline-btn gray-btn">Learn More</a>
							</p>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
		</section>
		<?php endif; ?>

		<?php if(get_field('homebuilder_gallery') != ''): $_gallery = get_field('homebuilder_gallery'); ?>
		<section class="page-section builder-gallery-section">
			<div class="gallery-container">
				<h2 class="sub-heading">Model Home Gallery</h2>
				<?php echo do_shortcode($_gallery); ?>
			</div>
		</section>
		<?php endif; ?>
	<?php endwhile; endif; ?>

<?php get_footer(); ?>
