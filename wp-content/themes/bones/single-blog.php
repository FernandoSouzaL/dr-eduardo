<?php get_header(); ?>

	<main class="c-main">

		<?php echo get_template_part('partials/breadcrumbs') ?>

        <?php setPostViews( get_the_ID() ); ?>

		<?php if (have_posts()): ?> 
			<div class="c-single">
                <div class="c-bg">
                    <div class="o-wrapper o-wrapper--1280">
    
                        <?php while( have_posts() ): the_post(); ?>
        
                            <div class="c-single-blog__container">
                                <div class="c-single-blog__posts">
                                    <h2 class="o-ttl o-ttl--50 o-tll--semibold">Blog</h2>
                                    
                                    <img src="<?php echo get_field('image_info'); ?>" alt="<?php the_title(); ?>">
            
                                    <div class="c-single__cats">
                                        <?php 
                                            $terms = get_the_terms( $post->ID, 'categorias', array(
                                                'hide_empty' => false,
                                                'orderby'    => 'name'
                                            ) );
                                                    
                                            if(!empty($terms)):
                                                $termlist = "";
                                                foreach( $terms as $term ) {
                                                    $termlist .=  '#' . $term->name . ', ';
                                                } 
                                        ?>
                                            <p class="o-ttl--14 o-ttl--semibold"><?php echo rtrim($termlist, ', '); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="c-single-blog__content">
                                        <h2 class="o-ttl--28 o-ttl--blue"><?php the_title(); ?></h2>
                                        
                                        <?php echo get_field('text'); ?>
    
                                        <div class="c-single-blog__footer">
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
                                
                                <div class="c-single-blog__filters">
                                    <div class="c-single-blog__search">
                                        <?php echo get_template_part('searchform-blog') ?>
                                    </div>
    
                                    <div class="c-single-blog__categories">
                                        <h2 class="o-ttl o-ttl--28 o-tll--semibold">Categorias</h2>
                                        <div class="c-single-blog__categories-container">
                                            <?php 
                                                $terms = get_terms( 'categorias', array(
                                                    'hide_empty' => false,
                                                    'orderby'    => 'name'
                                                ) );
    
                                                foreach( $terms as $term ):
                                            ?>
                                                
                                                <div class="c-single-blog__categories-item">
                                                    <a href="<?php echo get_term_link( $term->slug, 'categorias' ); ?>" class="o-ttl--14 o-ttl--center">
                                                        #<?php echo $term->name; ?>
                                                    </a>
                                                </div>
    
                                            <?php endforeach; wp_reset_postdata(); ?>
                                        </div>
                                    </div>
    
                                    <div class="c-single-blog__posts-visited">
                                        <h2 class="o-ttl o-ttl--28 o-tll--semibold">Mais visitados</h2>
                                        
                                        <?php
                                            $args = array(
                                                'post_type'   				=> 'blog',
                                                'orderby'     				=> 'meta_value_num',
                                                'meta_key'    				=> 'post_views_count',
                                                'order'       	 			=> 'DESC',
                                                'ignore_sticky_posts'       => 1,
                                                'posts_per_page' 			=> 5,
                                            );
    
                                            $query = new $wp_query( $args );
    
                                            while( $query->have_posts() ): $query->the_post();
                                        ?>
                                            <div class="c-single-blog__visiteds">
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
                        <div class="c-single-blog__slider">
                            <h2 class="o-ttl o-ttl--50 o-tll--semibold">Confira outros posts</h2>
                            
                            <?php
                                $args = array(
                                    'post_type'      => 'blog',
                                    'order'          => 'DESC',
                                    'posts_per_page' => 6,
                                    'post__not_in'   => array($post->ID)
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
