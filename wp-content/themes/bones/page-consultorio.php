<?php
/*
 Template Name: Consultório
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

			<div class="c-clinic">
                <div class="c-bg">
                    <?php $sliderText = get_field('slider_text'); ?>
                    <div class="c-clinic__container">
                        <div class="c-clinic__slider">
                            <div class="swiper-container js-slider-gallery">
                                <div class="swiper-wrapper">

                                    <?php while( have_rows('slider_text') ): the_row(); ?>
                                        <?php $slider = get_sub_field('slider'); ?>
                                        <?php foreach( $slider as $image ): ?>

                                            <div class="swiper-slide">
                                                <img src="<?php echo esc_url($image['url']); ?>">
                                            </div>  
                                            
                                        <?php endforeach; ?>
                                    <?php endwhile; ?>
                                </div>
					            <div class="swiper-scrollbar"></div>
                            </div>                        
                        </div>

                        <div class="c-clinic__text">
                            <?php echo $sliderText['text'] ?>
                        </div>
                    </div>
                </div>

                <div class="c-bg">
                    <div class="c-clinic__hospitals">
                        <h2 class="o-ttl o-ttl--50 o-tll--semibold">Hospitais Parceiros</h2>
                        
                        <?php
                            $args = array(
                                'post_type'      => 'hospitais',
                                'order'          => 'DESC',
                                'posts_per_page' => -1
                            );

                            $query = new WP_Query( $args );

                            if( $query->have_posts() ):
                        ?>
                            <div class="swiper-container js-slider-hospitals">
                                <div class="swiper-wrapper">
                                    <?php $counter = 1; while( $query->have_posts() ): $query->the_post(); ?>

                                        <div class="swiper-slide">
                                            <div class="c-clinic__image">
                                                <div class="c-clinic__overlay">
                                                    <div class="c-clinic__tooltip">
                                                        <button onclick="copy<?php echo $counter ?>()">
                                                            <input type="text" value="<?php echo get_field('link'); ?>" id="input-hidden-<?php echo $counter ?>">
                                                            <span class="c-clinic__tooltip-text" id="tooltip-<?php echo $counter ?>">Copiar</span>
                                                            <svg width="32.168" height="32.149">
                                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#copy" />
                                                            </svg>
                                                        </button>

                                                        <script>
                                                            // Copy to clipboard
                                                            function copy<?php echo $counter ?>() {
                                                                var copyText = document.getElementById("input-hidden-<?php echo $counter ?>");
                                                                copyText.select();
                                                                copyText.setSelectionRange(0, 99999);
                                                                navigator.clipboard.writeText(copyText.value);
                                                                
                                                                var tooltip = document.getElementById("tooltip-<?php echo $counter ?>");
                                                                tooltip.innerHTML = "Copiado!";
                                                            }
                                                        </script>
                                                    </div>

                                                    <a href="<?php echo get_field('link'); ?>" target="_blank">
                                                        <svg width="27.883" height="27.87">
                                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#link" />
                                                        </svg>
                                                    </a>
                                                </div>
                                                <img src="<?php echo get_field('image'); ?>" alt="<?php the_title(); ?>">
                                            </div>
                                            <h3 class="o-ttl--28 o-ttl--center"><?php the_title(); ?></h3>
                                            <div class="c-clinic__underline"></div>
                                            <p class="o-ttl--24 o-ttl--center"><?php echo get_field('address'); ?></p>
                                        </div>

                                    <?php $counter++; endwhile; wp_reset_postdata(); ?>
                                </div>
                                <div class="swiper-scrollbar swiper-scrollbar--hospital"></div>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
