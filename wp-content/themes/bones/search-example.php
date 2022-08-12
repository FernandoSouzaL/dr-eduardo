<?php get_header(); ?>

	<main class="c-main">

		<div class="o-wrapper o-wrapper--1280">
			<h2 class="archive-title">Resultados para: <?php echo esc_attr(get_search_query()); ?></h2>
		</div>

		<?php if( have_posts() ): ?> 
			<div class="c-search">
				<div class="o-wrapper o-wrapper--1280">
				
					<?php while ( have_posts() ): the_post(); ?>

						<div class="c-search__item">
							<a href="<?php echo get_template(); ?>"><?php the_title(); ?></a>
						</div>

					<?php endwhile; ?>

					<?php bones_page_navi(); ?>
				</div>
			</div>
		<?php else : ?>

			<div class="c-not-found">
				<div class="o-wrapper o-wrapper--1280">
					<h2 class="o-ttl o-ttl--30">Desculpe, sem resultados.</h2>

					<p>Tente buscar por outro termo.</p>
				</div>
			</div>	

		<?php endif; ?>

	</main>

<?php get_footer(); ?>
