<?php
/*
 Template Name: Procedimentos e Exames
*/
 ?>
 
 <?php get_header(); ?>

	<main class="c-main">

        <?php $banner = get_field('banner'); ?>
		<section class="c-banner c-banner--page">
            <div class="c-banner__item" style="background: url('<?php echo $banner['image'] ?>');">
                <div class="c-banner__control">
                    <div class="o-wrapper o-wrapper--1280">
                        <div class="c-banner__txt">
                            <h2 class="o-ttl o-ttl--60 o-ttl--white o-ttl--center"><?php echo $banner['title'] ?></h2>
                        </div>
                    </div>
                </div>
            </div>
		</section>

        <?php echo get_template_part('partials/breadcrumbs') ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="c-procedures">
                <div class="c-bg">
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
                                            <a href="<?php echo $term->slug ?>" class="c-procedures__category js-ajax-procedures">
                                                <h3 class="o-ttl--15 o-ttl--medium o-ttl--upper"><?php echo $term->name; ?></h3>
                                            </a>
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
                        'posts_per_page' => -1,
                    );

                    $query = new WP_Query( $args );

                    if( $query->have_posts() ):
                ?>
                    <div class="c-bg">
                        <div class="o-wrapper o-wrapper--1280">
                            <div class="o-grid o-grid__col-3 o-grid__gap-35 js-ajax-container">
                                <?php while( $query->have_posts() ): $query->the_post(); ?>

                                    <?php echo get_template_part('partials/procedures-item') ?>

                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>

                            <div class="c-procedures__loading"></div>
                        </div>
                    </div>
                <?php endif; ?>
			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
