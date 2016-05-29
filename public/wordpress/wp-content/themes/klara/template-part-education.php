<h3>
	<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
</h3>
<p>
	<?php the_terms($post->ID,'tech','Tech: ', ', ','.'); ?>
</p>
<p>
	<?php the_terms($post->ID,'bransch','Bransch: ', ', ','.'); ?>
</p>
<p>
	<?php the_content(); ?>
</p>
