<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>
<?php 
	_e( 'Posts', 'html5blank' );
	get_template_part('loop');
	get_template_part('pagination');
?>
		</section>

		<section>
			<h1><?php _e( 'Tidigare projekt', 'html5blank' ); ?></h1>
			<?php
				$project = new WP_Query(['post_type' => 'project']);
				if ($project->have_posts()) {
					// while ($project->have_posts()){
						get_template_part('projectloop');
					// }
				} else {
			?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php }//ends else ?>
		</section>
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
