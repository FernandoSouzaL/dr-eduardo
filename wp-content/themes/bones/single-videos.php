<?php get_header(); ?>

	<main class="c-main">

		<?php echo get_template_part('partials/breadcrumbs') ?>

        <?php setPostViews( get_the_ID() ); ?>

		<?php if (have_posts()): ?> 
			<div class="c-single">
                <div class="c-bg">
                    <div class="o-wrapper o-wrapper--1280">
    
                        <?php while( have_posts() ): the_post(); ?>
        
                            <div class="c-single-video__container">
                                <div class="c-single-video__posts">
                                    <h2 class="o-ttl o-ttl--50 o-tll--semibold">Vídeos</h2>
                                    
                                    <div 
                                        class="c-video js-video-player" 
                                        data-video="https://www.youtube.com/embed/<?php echo get_field('video_id'); ?>?autoplay=1&rel=0" 
                                        style="background-image: url('https://img.youtube.com/vi/<?php echo get_field('video_id'); ?>/sddefault.jpg')"
                                    >
                                        <svg class="c-video__svg">
                                            <use xlink:href="#ico-play"/>
                                        </svg>
                                        <iframe id="yt-video" class="c-video__player js-video-play" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
            
                                    <div class="c-single-video__content">
                                        <h2 class="o-ttl--28 o-ttl--blue"><?php the_title(); ?></h2>
                                        
                                        <div class="c-single-video__footer">
                                            <a href="javascript:history.back()" class="o-ttl--bold">
                                                <svg width="13.119" height="9.422">
                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-left" />
                                                </svg>
                                                Voltar
                                            </a>
    
                                            <p class="o-ttl--14 o-ttl--semibold">Publicado em: <?php echo get_the_date('d/m/Y'); ?></p>
    
                                            <?php get_sidebar(); ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="c-single-video__filters">
                                    <div class="c-single-video__search">
                                        <?php echo get_template_part('searchform-video') ?>
                                    </div>
    
                                    <div class="c-single-video__posts-visited">
                                        <h2 class="o-ttl o-ttl--28 o-tll--semibold">Mais visitados</h2>
                                        
                                        <?php
                                            $args = array(
                                                'post_type'   				=> 'videos',
                                                'orderby'     				=> 'meta_value_num',
                                                'meta_key'    				=> 'post_views_count',
                                                'order'       	 			=> 'DESC',
                                                'ignore_sticky_posts'       => 1,
                                                'posts_per_page' 			=> 5,
                                            );
    
                                            $query = new $wp_query( $args );
    
                                            while( $query->have_posts() ): $query->the_post();
                                        ?>
                                            <div class="c-single-video__visiteds">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <svg width="13.119" height="9.422">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-right" />
                                                    </svg>
                                                    <h3 class="o-ttl o-ttl--16 o-ttl--medium">
                                                        <?php the_title(); ?> <br>
                                                        <span class="o-ttl o-ttl--14 o-ttl--semibold"><?php echo get_the_date('d/m/Y') ?></span>
                                                    </h3>
                                                </a>
                                            </div>
                                        <?php endwhile; wp_reset_postdata(); ?>
                                    </div>
                                </div>                                                                        
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>

                <div class="c-bg">
                    <div class="o-wrapper o-wrapper--1280">
                        <div class="c-single-video__slider">
                            <h2 class="o-ttl o-ttl--50 o-tll--semibold">Confira outros vídeos</h2>
                            
                            <?php
                                $args = array(
                                    'post_type'      => 'videos',
                                    'order'          => 'DESC',
                                    'posts_per_page' => 6,
                                    'post__not_in'   => array($post->ID)
                                );
    
                                $query = new WP_Query( $args );
    
                                if( $query->have_posts() ):
                            ?>
                                <div class="swiper-container js-slider-video">
                                    <div class="swiper-wrapper">
                                        <?php while( $query->have_posts() ): $query->the_post(); ?>
    
                                            <div class="swiper-slide">
                                                <?php echo get_template_part('partials/video-item') ?>
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
