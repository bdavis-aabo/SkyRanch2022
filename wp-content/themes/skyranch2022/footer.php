	<?php get_template_part('page/footer-builders'); ?>

	<footer class="footer">
		<section class="footer-top ltblue-bg">
			<figure class="map-image">
				<img src="<?php bloginfo('template_directory') ?>/assets/images/directional-map.png" alt="Directions to Sky Ranch" class="aligncenter img-fluid" />
			</figure>
			<div class="directions-container">
				<?php if(is_active_sidebar('footer-address')): dynamic_sidebar('footer-address'); endif; ?>
			</div>
		</section>
		<section class="footer-bottom white-bg">
			<p class="copyright">&copy<?php echo date('Y') ?> Pure Cycle</p>
			<?php if(is_active_sidebar('footer-copyright')): dynamic_sidebar('footer-copyright'); endif; ?>
		</section>
	</footer>

	<?php get_template_part('page/page-contact') ?>

	<?php wp_footer(); ?>
</body>
</html>
