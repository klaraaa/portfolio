<?php 
/*
Template Name: Startpage
*/
get_header(); 
?>
<!-- HEADER -->

<?php get_template_part("template-part-menu"); ?>

<!-- CONTENT START -->
<main class="col-xs-12 col-sm-9">
	<!-- The loop starts here -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h2><?php the_title(); ?></h3>
	<p><?php the_content(); ?></p>

	<!-- The loop ends here -->
	<?php endwhile; else : ?>
		<p><?php echo 'Sorry, no posts matched your criteria.'; ?></p>
	<?php endif; ?>
	<hr>
	<?php 
	$case = new WP_Query(['post_type' => 'case']) ;
	while( $case->have_posts() ) : $case->the_post() ; ?>
	<?php get_template_part("template-part-case"); ?>
	<?php endwhile; ?>
	<hr>
	<?php 
	$education = new WP_Query(['post_type' => 'education']) ;
	while( $education->have_posts() ) : $education->the_post() ; ?>
	<?php get_template_part("template-part-education"); ?>
	<?php endwhile; ?>
	<hr>
	<?php 
	$employment = new WP_Query(['post_type' => 'employment']) ;
	while( $employment->have_posts() ) : $employment->the_post() ; ?>
	<?php get_template_part("template-part-employment"); ?>
	<?php endwhile; ?>
	<hr>
</main>
<!-- CONTENT ENDED -->

<!-- SIDEBAR DIV -->
<div class="col-xs-12 col-sm-3 sidebar">
	<!-- GET SIDEBAR IF ACTIVATED -->
	<?php 
	if( is_active_sidebar('widget-area')){
		dynamic_sidebar('widget-area');
	}
	?>
</div>
<!-- END SIDEBAR DIV-->

<!-- SIDEBAR -->
<?php get_sidebar(); ?>

<!-- FOOTER -->
<?php get_footer(); ?>
