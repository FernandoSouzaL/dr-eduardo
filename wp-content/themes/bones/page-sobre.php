<?php
/*
 Template Name: Sobre
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

			<div class="c-about">
                <div class="c-bg">
                    <?php $imageText = get_field('image_text'); ?>
                    <div class="c-about__container">
                        <div class="c-about__image">
                            <img src="<?php echo $imageText['image'] ?>">
                        </div>

                        <div class="c-about__text">
                            <?php echo $imageText['text'] ?>
                        </div>
                    </div>
                </div>

                <div class="c-bg">
                    <div class="o-wrapper o-wrapper--1100">
                        <h2 class="o-ttl o-ttl--50 o-tll--semibold">Formação</h2>
                        <?php echo get_field('formation'); ?>
                    </div>
                </div>

                <div class="c-about__banner">
                    <?php $bannerBottom = get_field('banner_botttom'); ?>
                    <div class="o-wrapper o-wrapper--1100">
                        <div class="c-about__banner-container">
                            <div class="c-about__banner-text">
                                <h3 class="o-ttl--48 o-ttl--white o-ttl--center o-ttl--semibold"><?php echo $bannerBottom['title']; ?></h3>
                                <p class="o-ttl--24 o-ttl--white o-ttl--center o-ttl--semibold"><?php echo $bannerBottom['description']; ?></p>
                            </div>

                            <div class="c-about__banner-logo">
                                <img src="<?php echo $bannerBottom['logo']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
