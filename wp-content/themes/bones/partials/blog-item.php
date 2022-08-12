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