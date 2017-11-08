<div class="col-md-6 col-lg-3 text-md-right order-md-2 order-lg-3 cd-footer-col quick-links-container">
	<h6 class="quick-links">Quick Links</h6>
	<?php

		$quickLinks = array(
			'theme_location' => 'quick-links',
			'container_id' => 'quick_links_wrapper'
		);

		wp_nav_menu( $quickLinks );

	?>
</div>
