<?php
	/* ----- Home Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
	$home = get_page_by_title( 'Home' );
	$about = get_page_by_title( 'About' );
	$clients = get_page_by_title( 'Clients' );
	$contact = get_page_by_title( 'Contact' );
?>
<section id="home-wrapper">

	<section id="hero-wrapper">
		<div>
		<?php
			if(get_field('home_intro', $home->ID)){
				the_field('home_intro', $home->ID);
			}
		?>
		</div>

		<?php if(get_field('i_and_c', $home->ID)): ?>

			<?php $loop_counter = 1; ?>
			<?php while(the_repeater_field('i_and_c', $home->ID)): ?>
				<article>
					<?php
						$image_id = get_sub_field('h_image');
						$image = wp_get_attachment_image_src( $image_id, 'full' );
					?>
					<img src="<?php echo $image[0]; ?>" class="hero-<?php echo $loop_counter; ?>">
					<div class="caption">
						<span><?php echo get_sub_field('i_title'); ?></span>
						<span><?php echo get_sub_field('i_caption'); ?></span>
						<span><?php echo get_sub_field('i_credit'); ?></span>
						<?php ++$loop_counter ?>
					</div>
				</article>
			<?php endwhile; ?>

		<?php endif; ?>
	</section>

	<section id="about-wrapper">
		<h1><?php echo $about->post_title; ?></h1>
		
		<?php
			if(get_field('a_intro', $about->ID)){
				the_field('a_intro', $about->ID);
			}
		?>

		<?php if(get_field('a_content', $about->ID)): ?>
			<?php $loop_counter = 1; ?>
			<?php while(the_repeater_field('a_content', $about->ID)): ?>

				<h2> <?php the_sub_field('section_title'); ?> </h2>
				<?php the_sub_field('section_text'); ?>

				<?php ++$loop_counter ?>
			<?php endwhile; ?>
		<?php endif; ?>

	</section>

	<section id="clients-wrapper">
		<h1><?php echo $clients->post_title; ?></h1>

		<?php
			if(get_field('c_intro', $clients->ID)){
				the_field('c_intro', $clients->ID);
			}
		?>

		<?php
			if(get_field('c_list', $clients->ID)){
				the_field('c_list', $clients->ID);
			}
		?>

		<?php
			if(get_field('c_footnote', $clients->ID)){
				the_field('c_footnote', $clients->ID);
			}
		?>

	</section>

	<section id="contact-wrapper">
		<h1><?php echo $contact->post_title; ?></h1>

		<?php
			$content = apply_filters('the_content', $contact->post_content);
			$content = str_replace(']]>', ']]&gt;', $content);
		
			echo $content;
		?>

	</section>

</section>