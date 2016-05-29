<?php get_header(); ?>
<!-- HEADER -->

<!-- MENU -->
<?php get_template_part("template-part-menu"); ?>
<!-- MENU ENDED -->

<?php
if(is_page("info")) {
echo "Text som bara finns på min statiska info-sida";
}
?>

<!-- CONTENT START -->
<main class="col-xs-12 col-sm-9">
	<!-- The loop starts here -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h3><?php the_title(); ?></h3>
	<p><?php the_content(); ?></p>

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
