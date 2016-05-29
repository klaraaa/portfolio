	<a href="<?php the_permalink(); ?>">
		<h2>
			<?php the_title(); ?>
		</h2>
	</a>
	<p>
		<?php the_terms($post->ID,'tech','Tech: ', ', ','.'); ?>
	</p>
	<p>
		<?php echo get_post_meta($post->ID, "employer", true); ?>
	</p>
	<p>
		<?php echo get_post_meta($post->ID, "year", true); ?>
	</p>
	<p>
		<?php the_content(); ?>
	</p>