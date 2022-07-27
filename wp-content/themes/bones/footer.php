		<footer class="c-footer">

			<div class="o-wrapper o-wrapper--1280">

				<?php get_template_part('partials/main-nav-footer'); ?>

				<p class="c-footer__copyright o-ttl o-ttl--white o-ttl--center">
					&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. Todos os direitos reservados. 
					<a href="https://ondaweb.com.br" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/library/images/ondaweb-ico-white.png" />
					</a>
				</p>

			</div>

		</footer>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php include get_template_directory() . '/partials/svgs.php' ?>

		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
