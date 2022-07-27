<?php get_header(); ?>

	<main class="c-main">

		<?php if( have_posts() ): ?> 
			<div class="c-archive">
				<div class="o-wrapper o-wrapper--1280">
	
					<?php while( have_posts() ): the_post(); ?>
		
						<?php the_title(); ?>
									
					<?php endwhile; ?>
	
					<?php bones_page_navi(); ?>
		
				</div>
			</div>
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

	</main>

<?php get_footer(); ?>
