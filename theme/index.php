<?php
get_header();
get_template_part( 'nav' );

?>
<!-- <div id="test"></div> -->

			<?php if( is_home() ) : //home means blog home not actual site home?>
				<?php get_template_part( 'content', 'archive' ); ?>

			<?php elseif(  is_front_page() ) : ?>
				<?php get_template_part( 'content', 'home' ); ?>

			<?php elseif(  is_page() ) : ?>
				<?php get_template_part( 'content', 'page' ); ?>

			<?php else : ?>
				<section class="container">
					<div class="row">
						<div id="no-content" class="col-sx-12">
							There are no posts or pages.
						</div>
					</div>
				</section>
			<?php endif; /*is_home*/ ?>



<?php get_footer(); ?>