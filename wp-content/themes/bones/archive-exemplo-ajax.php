<?php get_header(); ?>

    <main class="c-main">

        <!-- Filter -->
        <div class="o-wrapper o-wrapper--1280">
            <form id="filter" class="c-filter" action="#">
                <div class="c-filter__control">
                    <select name="data" class="c-filter__select">
                        <option value="">Todas as Datas</option>
                        <?php 
                            $taxData = get_terms( 'datas', array(
                                'parent' 	   => 0,
                                'hide_empty' => false,
                            ) );
                
                            foreach( $taxData as $data): 
                        ?>
                            <option value="<?php echo $data->term_id; ?>"><?php echo $data->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="c-filter__control">
                    <select name="category" class="c-filter__select">
                        <option value="">Categoria</option>
                        <?php 
                            $taxData = get_terms( 'categories', array(
                            'parent' 	   => 0,
                            'hide_empty' => false,
                            ) );
            
                            foreach( $taxData as $data): 
                        ?>
                            <option value="<?php echo $data->term_id; ?>"><?php echo $data->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="c-filter__control">
                    <select name="public" class="c-filter__select">
                        <option value="">Público</option>
                        <?php 
                            $taxData = get_terms( 'publico', array(
                            'parent' 	   => 0,
                            'hide_empty' => false,
                            ) );
            
                            foreach( $taxData as $data): 
                        ?>
                            <option value="<?php echo $data->term_id; ?>"><?php echo $data->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="c-filter__control">
                    <button class="c-filter__btn">Filtrar</button>
                </div>
                
                <input type="hidden" name="action" value="filter">
            </form>
        </div>
        <!-- End: Filter -->

        <!-- Ajax -->
        <div class="o-wrapper o-wrapper--1280">
            <?php if (have_posts()): ?>
                
                <div class="exemplo__container">
                    <?php while (have_posts()) : the_post(); ?>

                        <?php echo get_template_part( 'partials/example-ajax' ); ?>

                    <?php endwhile; ?>
                </div>

                <?php if( $wp_query->max_num_pages > 1 ): ?>
                    <div class="o-btn__center">
                        <div id="loadmore" class="o-btn o-btn--primary">Carregar mais</div>
                    </div>
                <?php endif; ?>
        
            <?php else : ?>
    
                <div class="c-not-found">
                    <div class="o-wrapper o-wrapper--1280">
                        <h2 class="o-ttl o-ttl--30 o-ttl--center">Nenhum post encontrado.</h2>

                        <div class="o-btn__center">
                            <a href="<?php echo home_url(); ?>" class="o-btn o-btn--primary">Voltar para home</a>
                        </div>
                    </div>
                </div>	

            <?php endif; ?>
        </div>
        <!-- End: Ajax -->

    </main>

<?php get_footer(); ?>
