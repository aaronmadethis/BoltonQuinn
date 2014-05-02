<?php
	/* ----- Navigation Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
?>

<?php if(is_front_page() ) : ?>

	<a class="top" name="top"></a>
	<section class="header">
		<header>
		  	<button type="button" class="nav-mobile-button"></button>
		  	<a id="top" href="#top" title="Bolton & Quinn homepage"><h1 class="logo">Bolton &amp; Quinn</h1></a>
			<nav role="navigation" class="hidden-nav">
				<?php
					$bq_menu = wp_get_nav_menu_items( 'Primary Navigation' );
					foreach ($bq_menu as $key => $menu_item) {
						echo '<a href="' . $menu_item->url . '" title="' . $menu_item->post_title . '">' . $menu_item->post_title  . '</a>';
					}
				?>
			</nav>
		</header>
	</section>

<?php else : ?>

	<a class="top" name="top"></a>
	<section class="header">
		<header>
			<h1 class="logo">Bolton &amp; Quinn</h1>
		</header>
	</section>

<?php endif; /*is_front_page*/ ?>