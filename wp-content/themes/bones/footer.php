		<footer class="c-footer">

			 <div class="c-testimonial">
				<div class="o-wrapper o-wrapper--928">
					<h2 class="o-ttl o-ttl--50 o-ttl--white o-tll--semibold o-ttl--center">Depoimentos</h2>
					<?php 
						$args = array(
							'post_type' 	 => 'depoimentos',
							'order'			 => 'DESC',
							'posts_per_page' => -1
						);

						$query = new WP_Query( $args );

						if( $query->have_posts() ):
					?>
							<div class="swiper-container js-slider-testimonial">
								<div class="swiper-wrapper">
									<?php while( $query->have_posts() ): $query->the_post(); ?>

										<div class="swiper-slide">
											<?php echo get_field('testimonial'); ?>
											<div class="c-testimonial__underline"></div>
											<h3 class="o-ttl--16 o-ttl--white o-ttl--bold o-ttl--center"><?php the_title(); ?></h3>
										</div>

									<?php endwhile; wp_reset_postdata(); ?>
								</div>
								<div class="swiper-scrollbar swiper-scrollbar--secondary"></div>
							</div>
					<?php endif; ?>
				</div>
			 </div>

			<div class="o-wrapper o-wrapper--1280">
				<div class="c-footer__container">
					<div class="c-footer__item">
						<h3 class="o-ttl o-ttl--16 o-ttl--white o-ttl--semibold"><?php echo get_field('title_footer', 86); ?></h3>
						<p class="o-ttl--14 o-ttl--white"><?php echo get_field('info_footer', 86); ?></p>

						<div class="c-menu-redes">
							<p class="o-ttl--white o-ttl--semibold o-ttl--upper">Redes sociais</p>

							<ul class="c-menu-redes__list">
								<?php get_template_part('partials/main-redes-menu'); ?>
							</ul>
						</div>
					</div>

					<div class="c-footer__item">
						<h3 class="o-ttl o-ttl--16 o-ttl--white o-ttl--semibold o-ttl--upper">Consultório</h3>
						<p class="o-ttl--14 o-ttl--white">Endereço: <?php echo get_field('address', 17); ?></p>
						<p class="o-ttl--14 o-ttl--white">Celular: <?php echo get_field('phone', 17); ?></p>
						<p class="o-ttl--14 o-ttl--white">Telefone: <?php echo get_field('telphone', 17); ?></p>
						<p class="o-ttl--14 o-ttl--white">E-mail: <?php echo get_field('email', 17); ?></p>
					</div>
					
					<div class="c-footer__item">
						<h3 class="o-ttl o-ttl--16 o-ttl--white o-ttl--semibold o-ttl--upper">Newsletter</h3>
						<?php echo do_shortcode('[contact-form-7 id="64" title="Newsletter"]'); ?>
					</div>
				</div>

				<p class="c-footer__copyright o-ttl o-ttl--white">
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
