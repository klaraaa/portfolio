<h3>
	<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
</h3>
<p class="smallgray">
	<?php the_author(); ?>
	<?php the_time(); ?>
	<?php the_date(); ?>
</p>
<p class="locationsVisibility">
	<?php the_terms($post->ID,'location','Locations: ', ', ','.'); ?>
</p>
<p>
	<?php the_terms($post->ID,'tech','Tech: ', ', ','.'); ?>
</p>
<p>
	<?php the_terms($post->ID,'bransch','Bransch: ', ', ','.'); ?>
</p>
<p>
	<?php the_content(); ?>
</p>
