<?php get_header(); ?>

	<main class="c-main">

		<?php echo get_template_part('partials/breadcrumbs') ?>

		<?php if( have_posts() ): ?> 
			<div class="c-archive">
				<div class="c-bg">
                    <div class="o-wrapper o-wrapper--1280">
    
                        <div class="c-archive-blog__container">
                            <div class="c-archive-blog__posts">
                                <h2 class="o-ttl o-ttl--50 o-tll--semibold"><?php single_cat_title(); ?></h2>
                                
                                <div class="o-grid o-grid__col-2 o-grid__gap-20">
                                    <?php while( have_posts() ): the_post(); ?>
                
                                        <div class="c-archive-blog__item">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <img src="<?php echo get_field('image'); ?>" alt="<?php the_title(); ?>">
        
                                                <div class="c-archive-blog__content">
                                                    <div class="c-archive-blog__cats">
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
                                                    <div class="c-archive-blog__date">
                                                        <p class="o-ttl--14 o-ttl--semibold"><?php echo get_the_date('d/m/Y'); ?></p>
                                                    </div>
                                                </div>
        
                                                <h3 class="o-ttl o-ttl--28 o-ttl--blue"><?php the_title(); ?></h3>
        
                                                <p><?php echo get_field('description'); ?></p>
    
                                                <p class="c-archive-blog__btn o-ttl--bold o-ttl--right">
                                                    <svg width="13.119" height="9.422">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-right" />
                                                    </svg>
                                                    Ler mais
                                                </p>
                                            </a>
                                        </div>
                                                    
                                    <?php endwhile; ?>
                                </div>
                
                                <?php bones_page_navi(); ?>
                            </div>
                            
                            <div class="c-archive-blog__filters">
                                <div class="c-archive-blog__search">
                            		<?php echo get_template_part('searchform-blog') ?>
                                </div>

                                <div class="c-archive-blog__categories">
                                    <h2 class="o-ttl o-ttl--28 o-tll--semibold">Categorias</h2>
                                    <div class="c-archive-blog__categories-container">
                                        <?php 
                                            $terms = get_terms( 'categorias', array(
                                                'hide_empty' => false,
                                                'orderby'    => 'name',
                                            ) );

                                            foreach( $terms as $term ):
                                        ?>
                                            
                                            <div class="c-archive-blog__categories-item">
                                                <a href="<?php echo get_term_link( $term->slug, 'categorias' ); ?>" class="o-ttl--14 o-ttl--center">
                                                    #<?php echo $term->name; ?>
                                                </a>
                                            </div>

                                        <?php endforeach; wp_reset_postdata(); ?>
                                    </div>
                                </div>

                                <div class="c-archive-blog__posts-visited">
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
                                        <div class="c-archive-blog__visiteds">
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
