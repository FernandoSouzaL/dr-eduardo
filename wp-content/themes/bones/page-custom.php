<?php
/*
 Template Name: 
*/
 ?>
 
 <?php get_header(); ?>

	<main class="c-main">

		<?php $banner = get_field('banner'); ?>
		<section class="c-banner c-banner--page" style="background: url('<?php echo $banner['image'] ?>');">
			<div class="c-banner__container">
				<div class="o-wrapper o-wrapper--1280">
					<div class="c-banner__txt">
						<h2 class="o-ttl o-ttl--30 o-ttl--white"><?php echo $banner['title'] ?></h2>
						<?php if (!empty($banner['description'])): ?>
							<p class="o-ttl o-ttl--20 o-ttl--white"><?php echo $banner['description'] ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="">

			</div>

		<?php endwhile; endif; ?>

	</main>

 <?php get_footer(); ?>
