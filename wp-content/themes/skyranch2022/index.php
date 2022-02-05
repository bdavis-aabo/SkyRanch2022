<?php get_header(); ?>

	<section class="page-section ltblue-bg blog-header">
		<h1>Our Journal.</h1>
		<h3>Homes. Lifestyle. Inspiration.</h3>
	</section>

	<?php if(have_posts()): ?>
	<section class="page-section article-section">
		<div class="article-container">
			<?php while(have_posts()): the_post(); $_postThumb = get_field('article_thumbnail')?>
			<article class="blog-post card" id="post-<?php echo $post->ID ?>">
				<div class="front">
					<figure class="article-image">
						<img src="<?php echo $_postThumb['url'] ?>" alt="<?php the_title() ?>" class="" />
					</figure>
				</div>
				<div class="back ultgray-bg">
					<div class="back-contents">
						<h2 class="article-title"><?php the_title() ?></h2>
						<p class="postmeta"><?php echo get_the_date('F Y'); ?> | <?php echo get_post_categories(); ?></p>
						<a href="<?php the_permalink() ?>" title="<?php the_title() ?>" class="arrow-link">
							<?php echo file_get_contents(get_template_directory_uri() . '/assets/images/arrow.svg') ?>
						</a>
					</div>
				</div>
			</article>
			<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>

<?php get_footer(); ?>
