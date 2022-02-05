<?php // Single Blog Article Template ?>

<?php get_header(); ?>

	<?php if(have_posts()): ?>
	<section class="page-section single-article-section">
		<div class="ltgray-bg static-bar"></div>

		<div class="article-container">
		<?php while(have_posts()): the_post(); ?>
			<article class="single-article" id="<?php echo 'post-' . $post->ID ?>">
				<h1 class="article-title ltgray-txt"><?php the_title() ?></h1>
				<p class="meta peach-txt"><?php echo get_the_date('F Y'); ?></p>

				<figure class="article-image">
					<?php echo get_the_post_thumbnail($post->ID, 'full', array('class' => 'img-fluid')); ?>
				</figure>

				<div class="article-content"><?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
		</div>

	</section>
	<?php endif; ?>

<?php get_footer(); ?>
