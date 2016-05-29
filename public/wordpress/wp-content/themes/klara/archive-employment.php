<?php get_header(); ?>
<!-- HEADER -->

<!-- MENU -->
<?php get_template_part("template-part-menu"); ?>
<!-- MENU ENDED -->

<!-- CONTENT START -->
<main class="col-xs-12 col-sm-9">
	<!-- The loop starts here -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
	<?php get_template_part("template-part-employment"); ?>
	<!-- The loop ends here -->
	<?php endwhile; else : ?>
		<p><?php echo 'Sorry, no posts matched your criteria.'; ?></p>
	<?php endif; ?>
</main>
<!-- CONTENT ENDED -->

<!-- SIDEBAR -->
<?php get_sidebar(); ?>

<!-- FOOTER -->
<?php get_footer(); ?>
