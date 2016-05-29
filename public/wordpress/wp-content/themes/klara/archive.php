<?php get_header(); ?>
<!-- HEADER -->

<!-- MENU -->
<?php get_template_part("template-part-menu"); ?>
<!-- MENU ENDED -->

<!-- CONTENT -->
<main class="col-xs-12 col-sm-9">
	<?php if ( have_posts() ) : ?>
		<?php
			the_archive_title( '<h4>', '</h4>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
		?>
	
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content', get_post_format() ); ?>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p class="smallgray"><?php the_author(); ?>
	<?php the_time(); ?>
	<?php the_date(); ?></p>
	<p><?php the_terms($post->ID,'location','Locations: ', ', ','.'); ?></p>
	<p><?php the_content(); ?></p>
	<?php
		// End the loop.
		endwhile;
		endif;
		?>
</main>
<!-- CONTENT ENDED -->

<!-- SIDEBAR -->
<?php get_sidebar(); ?>

<!-- FOOTER -->
<?php get_footer(); ?>