<?php
	/* ----- Home Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
?>

<main role="main">
	<aside>
		<?php if(get_field('logos')): ?>
			<?php $loop_counter = 0; ?>
			<?php while(the_repeater_field('logos')): ?>
				<?php
					$image_id = get_sub_field('logo');
					$image = wp_get_attachment_image_src( $image_id, 'full' );
				?>
				
				<a href="#" title="Client logo" style="background-image: url(<?php echo $image[0] ?>);"></a>

				<?php ++$loop_counter ?>
			<?php endwhile; ?>
		<?php endif; ?>

	</aside>
	<article class="content">
		<section>
			<header>
			<h1><?php the_title(); ?></span></h1>
			</header>
			<?php 
				if( get_field('file_group_title') ){
					echo '<h2>';
					the_field('file_group_title');
					echo '</h2>';
				}
			?>

			<?php if(get_field('press_files')): ?>
				<?php while(the_repeater_field('press_files')): ?>

					<p><a href="<?php the_sub_field('single_file'); ?>" title="<?php the_sub_field('file_name'); ?>" target="_blank"><?php the_sub_field('file_name'); ?></a></p>

				<?php endwhile; ?>
			<?php endif; ?>		

	    	<?php 
	    		if( get_field('details') ){
	    			the_field('details');
	    		}
	    	?>
	    	<h2>Contact</h2>
	    	<?php 
	    		if( get_field('contact_details') ){
	    			the_field('contact_details');
	    		}
	    	?>
	    </section>
	</article>
</main>