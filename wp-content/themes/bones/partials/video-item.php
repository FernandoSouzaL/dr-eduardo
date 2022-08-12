<div class="c-archive-video__item">
    <a href="<?php echo get_permalink(); ?>">
        <div class="c-archive-video__image">
            <div class="c-archive-video__overlay">
                <svg width="60" height="69">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#ico-play" />
                </svg> 
            </div>
            <img src="<?php echo get_field('image'); ?>" alt="<?php the_title(); ?>">
        </div>

        <h3 class="o-ttl--28"><?php the_title(); ?></h3>
    </a>
</div>