<?php
/*
 Template Name: Home
*/
 ?>
 
 <?php get_header(); ?>

	<main class="c-main">

		<?php if( have_rows('slider') ): ?>
			<section class="c-banner c-banner--slider">
				<div class="swiper-container js-home-slider">
					<div class="swiper-wrapper">
						<?php while( have_rows('slider') ): the_row(); ?>

							<div class="swiper-slide" style="background: url('<?php echo get_sub_field('image'); ?>');">

							</div>

						<?php endwhile; wp_reset_postdata(); ?>
					</div>
					<div class="swiper-button swiper-button-prev">
						<svg width="18" height="34">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-prev" />
						</svg>
					</div>
					<div class="swiper-button swiper-button-next">
						<svg width="18" height="34">
							<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-next" />
						</svg>
					</div>
					<div class="swiper-pagination"></div>
				</div> 
			</section>
		<?php endif; ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="c-home">

			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
