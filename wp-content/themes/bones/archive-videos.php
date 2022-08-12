<?php get_header(); ?>

	<main class="c-main">

		<?php echo get_template_part('partials/breadcrumbs') ?>

		<?php if( have_posts() ): ?> 
			<div class="c-archive-video">
				<div class="c-bg">
                    <div class="o-wrapper o-wrapper--1280">
    
                        <div class="c-archive-video__container">
                            <div class="c-archive-video__posts">
                                <h2 class="o-ttl o-ttl--50 o-tll--semibold">Vídeos</h2>
                                
                                <div class="o-grid o-grid__col-2 o-grid__gap-20">
                                    <?php while( have_posts() ): the_post(); ?>
                
                                        <?php echo get_template_part('partials/video-item') ?>
                                                    
                                    <?php endwhile; ?>
                                </div>
                
                                <?php bones_page_navi(); ?>
                            </div>
                            
                            <div class="c-archive-video__filters">
                                <div class="c-archive-video__search">
                            		<?php echo get_template_part('searchform-video') ?>
                                </div>

                                <div class="c-archive-video__posts-visited">
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
                                        <div class="c-archive-video__visiteds">
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
            
                    </div>
                </div>
			</div>
		<?php else : ?>

			<div class="c-not-found">
				<div class="o-wrapper o-wrapper--1280">
					<h2 class="o-ttl o-ttl--30 o-ttl--center">Nenhum post encontrado.</h2>

					<div class="o-btn__center">
						<a href="javascript:history.back()" class="o-btn o-btn--primary">Voltar</a>
					</div>
				</div>
			</div>							

		<?php endif; ?>

	</main>

<?php get_footer(); ?>
