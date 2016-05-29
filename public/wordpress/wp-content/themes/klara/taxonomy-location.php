<?php get_header(); ?>
<!-- HEADER -->

<!-- MENU -->
<div class="col-xs-12 menu">
	<?php get_template_part("template-part-menu"); ?>
</div>
<!-- MENU ENDED -->

<!-- CONTENT -->
<main class="col-xs-12 col-sm-9">
	<h2><?php $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); 
	echo $term->name;?></h2>
	<!-- The loop starts here -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p class="smallgray"><?php the_author(); ?>
	<?php the_time(); ?>
	<?php the_date(); ?></p>
	<?php the_time(); ?>
	<p><?php the_terms($post->ID,'location','Locations: ', ', ','.'); ?></p>
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
