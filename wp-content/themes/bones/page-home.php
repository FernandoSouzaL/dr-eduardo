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

							<div class="swiper-slide c-banner__item" style="background: url('<?php echo get_sub_field('image'); ?>');">
								<div class="c-banner__control">
									<div class="o-wrapper o-wrapper--1280">
										<?php $title = get_sub_field('title');
											  $subtitle = get_sub_field('subtitle'); ?>

										<?php if( $title ): ?>
											<h2 class="o-ttl o-ttl--60 o-ttl--white o-ttl--center"><?php echo $title; ?></h2>
										<?php endif; ?>

										<?php if( $subtitle ): ?>
											<p class="o-ttl--28 o-ttl--white o-ttl--center"><?php echo $subtitle; ?></p>
										<?php endif; ?>
									</div>
								</div>
							</div>

						<?php endwhile; wp_reset_postdata(); ?>
					</div>
					<div class="swiper-scrollbar"></div>
				</div> 
			</section>
		<?php endif; ?>
		
		<?php echo get_template_part('partials/breadcrumbs') ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="c-home">
				<div class="c-bg">
                    <?php $imageText = get_field('about'); ?>
                    <div class="c-about__container">
                        <div class="c-about__image">
                            <img src="<?php echo $imageText['image'] ?>">
                        </div>

                        <div class="c-about__text">
                            <?php echo $imageText['text'] ?>

							<a href="<?php echo get_permalink(11); ?>" class="o-btn o-btn--primary"><span>Saiba mais</span></a>
                        </div>
                    </div>
                </div>

				<div class="c-bg">
					<div class="c-about__banner">
						<?php $bannerBottom = get_field('banner_botttom', 11); ?>
						<div class="o-wrapper o-wrapper--1100">
							<div class="c-about__banner-container">
								<div class="c-about__banner-text">
									<h3 class="o-ttl--48 o-ttl--white o-ttl--center o-ttl--semibold"><?php echo $bannerBottom['title'] ?></h3>
									<p class="o-ttl--24 o-ttl--white o-ttl--center o-ttl--semibold"><?php echo $bannerBottom['description'] ?></p>
								</div>

								<div class="c-about__banner-logo">
									<img src="<?php echo $bannerBottom['logo'] ?>">
								</div>
							</div>
						</div>
					</div>
				</div>				
				
				<div class="c-bg">
					<div class="c-bg">
						<h2 class="o-ttl o-ttl--50 o-tll--semibold o-ttl--center">Procedimentos e Exames</h2>
						
						<div class="o-wrapper o-wrapper--600">
							<div class="swiper-container js-slider-categories">
								<div class="swiper-wrapper">
									<?php 
										$terms = get_terms( 'procedimento', array(
											'hide_empty' => false,
											'orderby'    => 'name'
										) );

										foreach( $terms as $term ):
									?>
											
											<div class="swiper-slide">
												<h3 class="o-ttl--15 o-ttl--medium o-ttl--upper"><?php echo $term->name; ?></h3>
											</div>

									<?php endforeach; wp_reset_postdata(); ?>
								</div>
								<div class="swiper-scrollbar swiper-scrollbar--categories"></div>
							</div>
						</div>
					</div>

					<?php 
						$args = array(
							'post_type'      => 'procedimentos',
							'order'          => 'DESC',
							'orderby'		 => 'rand',
							'posts_per_page' => 6,
						);

						$query = new WP_Query( $args );

						if( $query->have_posts() ):
					?>
						<div class="c-bg">
							<div class="o-wrapper o-wrapper--1280">
								<div class="swiper-container js-slider-procedures">
									<div class="swiper-wrapper">
										<?php while( $query->have_posts() ): $query->the_post(); ?>

											<div class="swiper-slide">
												<?php echo get_template_part('partials/procedures-item') ?>
											</div>
	
										<?php endwhile; wp_reset_postdata(); ?>
									</div>
                                    <div class="swiper-scrollbar swiper-scrollbar--secondary"></div>
								</div>

								<div class="c-procedures__loading"></div>
							</div>
							<div class="o-btn__center">
								<a href="<?php echo get_permalink(15); ?>" class="o-btn o-btn--primary"><span>Ver todos</span></a>
							</div>
						</div>
					<?php endif; ?>
				</div>

				<div class="c-bg c-bg--blog">
					<div class="o-wrapper o-wrapper--1280">
						<div class="c-single-blog__slider">
							<h2 class="o-ttl o-ttl--50 o-tll--semibold">Blog</h2>
							
							<?php
								$args = array(
									'post_type'      => 'blog',
									'order'          => 'DESC',
									'orderby'		 => 'rand',
									'posts_per_page' => 6,
								);
	
								$query = new WP_Query( $args );
	
								if( $query->have_posts() ):
							?>
								<div class="swiper-container js-slider-blog">
									<div class="swiper-wrapper">
										<?php while( $query->have_posts() ): $query->the_post(); ?>
	
											<div class="swiper-slide">
												<?php echo get_template_part('partials/blog-item') ?>
											</div>
	
										<?php endwhile; wp_reset_postdata(); ?>
									</div>
									<div class="swiper-scrollbar swiper-scrollbar--secondary c-home__scrollbar"></div>
								</div>
	
							<?php endif; ?>
						</div>

						<a href="<?php echo get_post_type_archive_link( 'blog' ); ?>" class="o-btn o-btn--primary"><span>Ver todos</span></a>
                    </div>
				</div>

				<div class="c-bg c-bg--video">
					<div class="o-wrapper o-wrapper--1280">
						<div class="c-single-video__slider">
							<h2 class="o-ttl o-ttl--50 o-tll--semibold">Vídeos</h2>
							
							<?php
								$args = array(
									'post_type'      => 'videos',
									'order'          => 'DESC',
									'orderby'		 => 'rand',
									'posts_per_page' => 6,
								);
	
								$query = new WP_Query( $args );
	
								if( $query->have_posts() ):
							?>
								<div class="swiper-container js-slider-blog">
									<div class="swiper-wrapper">
										<?php while( $query->have_posts() ): $query->the_post(); ?>
	
											<div class="swiper-slide">
												<?php echo get_template_part('partials/video-item') ?>
											</div>
	
										<?php endwhile; wp_reset_postdata(); ?>
									</div>
									<div class="swiper-scrollbar swiper-scrollbar--secondary c-home__scrollbar"></div>
								</div>
	
							<?php endif; ?>
						</div>

						<a href="<?php echo get_post_type_archive_link( 'videos' ); ?>" class="o-btn o-btn--primary"><span>Ver todos</span></a>
                    </div>
				</div>
			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
