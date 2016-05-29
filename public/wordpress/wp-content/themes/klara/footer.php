				<footer class="col-xs-12">
					<!-- GETS FOOTER-SIDEBAR -->
					<ul>
					<?php
					if( is_active_sidebar('footer-sidebar')){
						dynamic_sidebar('footer-sidebar');
					}
					?>
					</ul>
					<!-- FOOTER-SIDEBAR ENDS -->
				</footer>
			</div><!-- CLOSE ROW-->
		</div><!--CLOSE CONTAINER-->
		<?php wp_footer(); ?>
	</body>
</html>