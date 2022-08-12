<?php
	include '../../../../../wp-load.php';

	switch ($_GET['acao']) {

		case 'busca_procedimentos':

		$slug = $_POST["slug"];
        
		$args = array(
			'post_type' 	 => 'procedimentos',
			'order' 		 => 'DESC',
			'posts_per_page' => -1,
			'tax_query'	   	 => array(
				array (
					'taxonomy' => 'procedimento',
					'field'    => 'slug',
					'terms'    => array($slug),
				),
			),
		);

		$query = new WP_Query( $args );

		if( $query->have_posts() ):
			while( $query->have_posts() ): $query->the_post(); 
				
				echo get_template_part('partials/procedures-item');
			
			endwhile; 
		else: ?>

			<p>Nenhum post encontrado!</p>

		<?php endif; 

				
		break;

	}

?>