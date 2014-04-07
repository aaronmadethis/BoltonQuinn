<?php
	/* ----- Navigation Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
?>


<nav role="navigation">
	<?php wp_nav_menu( array( 'theme_location' => 'main', 'depth' => 1, 'container' => false ) ); ?>
</nav>