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
	<section class="row">
		<!-- The loop starts here -->
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="col-xs-12">
				<h2><?php the_title(); ?></h2>
				<p><?php the_content(); ?></p>
			</div>
		<!-- The loop ends here -->
		<?php endwhile; else : ?>
			<div class="col-xs-12 col-sm-4 articlewrapper">
				<article>
					<p>
						<?php echo 'Sorry, no posts matched your criteria.'; ?>
					</p>
				</article>
			</div>
		<?php endif; ?>
	</section>
	<hr>
	<section class="row">
		<div class="col-xs-12">
			<h2>Posts:</h2>
		</div>
		<?php 
		$blogpost = new WP_Query(['post_type' => 'post']) ;
		while( $blogpost->have_posts() ) : $blogpost->the_post() ; ?>
			<div class="col-xs-12 col-sm-4 articlewrapper">
				<article>
					<?php get_template_part("template-part-post"); ?>
				</article>
			</div>
		<?php endwhile; ?>
	</section>
	<hr>
	<section class="row">
		<div class="col-xs-12">
			<h2>Cases:</h2>
		</div>
		<?php 
		$case = new WP_Query(['post_type' => 'case']) ;
		while( $case->have_posts() ) : $case->the_post() ; ?>
			<div class="col-xs-12 col-sm-4 articlewrapper">
				<article>
					<?php get_template_part("template-part-case"); ?>
				</article>
			</div>
		<?php endwhile; ?>
	</section>
	<hr>
	<section class="row">
		<div class="col-xs-12">
			<h2>Education:</h2>
		</div>
		<?php 
		$education = new WP_Query(['post_type' => 'education']) ;
		while( $education->have_posts() ) : $education->the_post() ; ?>
			<div class="col-xs-12 col-sm-4 articlewrapper">
				<article>
					<?php get_template_part("template-part-education"); ?>
				</article>
			</div>
		<?php endwhile; ?>
	</section>
	<hr>
	<section class="row">
		<div class="col-xs-12">
			<h2>Job experience:</h2>
		</div>
		<?php 
		$employment = new WP_Query(['post_type' => 'employment']) ;
		while( $employment->have_posts() ) : $employment->the_post() ; ?>
			<div class="col-xs-12 col-sm-4 articlewrapper">
				<article>
					<?php get_template_part("template-part-employment"); ?>
				</article>
			</div>
		<?php endwhile; ?>
	</section>
</main>
<!-- CONTENT ENDED -->

<!-- SIDEBAR -->
<?php get_sidebar(); ?>

<!-- FOOTER -->
<?php get_footer(); ?>
