<!-- SIDEBAR DIV -->
<div class="col-xs-12 col-sm-3 sidebar">
	<!-- GET SIDEBAR IF ACTIVATED -->
	<ul>
	<?php 
	if( is_active_sidebar('sidebar')){
		dynamic_sidebar('sidebar');
	}
	?>
	</ul>
</div>
<!-- END SIDEBAR DIV-->