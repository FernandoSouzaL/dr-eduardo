<?php get_header(); ?>

	<main class="c-main">
        
        <?php if (have_posts()): ?> 
            <?php $banner = get_field('banner', 15); ?>
            <section class="c-banner c-banner--page">
                <div class="c-banner__item" style="background: url('<?php echo $banner['image'] ?>');">
                    <div class="c-banner__control">
                        <div class="o-wrapper o-wrapper--1280">
                            <div class="c-banner__txt">
                                <h2 class="o-ttl o-ttl--60 o-ttl--white o-ttl--center"><?php the_title(); ?></h2>
                                <p class="o-ttl o-ttl--28 o-ttl--center o-ttl--white"><?php echo $banner['title'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    
            <?php echo get_template_part('partials/breadcrumbs') ?>

            <div class="c-bg">
                    <div class="o-wrapper o-wrapper--600">
                        <div class="swiper-container js-slider-categories">
                            <div class="swiper-wrapper">
                                <?php 
                                    $terms = get_the_terms( $post->ID, 'procedimento', array(
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

			<div class="c-single-procedures">
                <?php while( have_posts() ): the_post(); ?>

                    <div class="c-bg">
                        <div class="c-single-procedures__container">
                            <div class="c-single-procedures__image">
                                <img src="<?php echo get_field('ico'); ?>" class="c-ico-svg c-ico-svg--secondary">
                            </div>

                            <div class="c-single-procedures__text">
                                <?php echo get_field('description'); ?>
                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>

                <div class="c-bg">
                    <div class="o-wrapper o-wrapper--1280">
                        <div class="c-single-procedures__slider">
                            <h2 class="o-ttl o-ttl--50 o-tll--semibold o-ttl--center">Outros Procedimentos</h2>
                            
                            <?php
                                $args = array(
                                    'post_type'      => 'procedimentos',
                                    'order'          => 'DESC',
                                    'posts_per_page' => -1,
                                    'post__not_in'   => array($post->ID)
                                );
    
                                $query = new WP_Query( $args );
    
                                if( $query->have_posts() ):
                            ?>
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
    
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
			</div>
		<?php else : ?>

			<div class="c-not-found">
				<div class="o-wrapper o-wrapper--1280">
					<h2 class="o-ttl o-ttl--30 o-ttl--center">Post não encontrado.</h2>

					<div class="o-btn__center">
						<a href="<?php echo home_url(); ?>" class="o-btn o-btn--primary">Voltar para home</a>
					</div>
				</div>
			</div>

		<?php endif; ?>

	</main>

<?php get_footer(); ?>
