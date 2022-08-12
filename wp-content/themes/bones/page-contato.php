<?php
/*
 Template Name: Contato
*/
 ?>
 
 <?php get_header(); ?>

	<main class="c-main">

        <?php echo get_template_part('partials/breadcrumbs') ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="c-contact">
                <div class="c-bg">
                    <div class="o-wrapper o-wrapper--1280">
                        <h2 class="o-ttl o-ttl--50 o-tll--semibold">Contato</h2>

                        <div class="c-contact__container">
                            <div class="c-form">
                                <?php echo do_shortcode('[contact-form-7 id="5" title="Contato"]'); ?>
                            </div>

                            <div class="c-contact__info">
                                <h3 class="o-ttl--28">Outras formas de contato:</h3>

                                <div class="c-contact__control">
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/ico-whats.svg">
                                    <p class="o-ttl--medium"><?php echo get_field('phone'); ?></p>
                                </div>

                                <div class="c-contact__control">
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/ico-phone.svg">
                                    <p class="o-ttl--medium"><?php echo get_field('telphone'); ?></p>
                                </div>

                                <div class="c-contact__control">
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/ico-email.svg">
                                    <p class="o-ttl--medium"><?php echo get_field('email'); ?></p>
                                </div>

                                <div class="c-contact__control">
                                    <img src="<?php echo get_template_directory_uri(); ?>/library/images/ico-address.svg">
                                    <p class="o-ttl--medium"><?php echo get_field('address'); ?></p>
                                </div>
                            </div>
                        </div>                      
                    </div>
                </div>

                <div class="c-contact__map">
                    <?php echo get_field('map'); ?>
                </div>
			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
