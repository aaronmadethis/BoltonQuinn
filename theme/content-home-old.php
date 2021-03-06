<?php
	/* ----- Home Template ----- */
	$theme_dir_path = get_stylesheet_directory_uri();
	$home = get_page_by_title( 'Home' );
	$about = get_page_by_title( 'About' );
	$clients = get_page_by_title( 'Clients' );
	$contact = get_page_by_title( 'Contact' );
?>

<main role="main">
	
	<?php if(get_field('i_and_c', $home->ID)): ?>

		<?php $loop_counter = 0; ?>
		<?php while(the_repeater_field('i_and_c', $home->ID)): ?>

			<?php
				$image_id = get_sub_field('h_image');
				$image = wp_get_attachment_image_src( $image_id, 'full' );
			?>

			<article class="leading-image sticky" data-index="<?php echo $loop_counter; ?>" style="background-image: url('<?php echo $image[0]; ?>');">
				<section class="opening-text first-text">
					<?php
						if(get_field('home_intro', $home->ID) && $loop_counter == 0 ){
							the_field('home_intro', $home->ID);
						}
					?>
					<button type="button" title="Advance to next example"></button>
				</section>
				<aside>
					<section>
						<h2><?php echo get_sub_field('i_title'); ?></h2>
						<h3><?php echo get_sub_field('i_caption'); ?></h3>
						<cite><?php echo get_sub_field('i_credit'); ?></cite>
						<button type="button" class="open-button" title="Read the caption"><span>+</span> Caption</button>
						<button type="button" class="close-button" title="Close the caption"></button>
					</section>
				</aside>
			</article>

			<?php ++$loop_counter ?>
		<?php endwhile; ?>
	<?php endif; ?>

	<a name="about"></a>
	<article class="content about">
		<section>
			<header>
				<h1><?php echo $about->post_title; ?></h1>
			</header>
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
	</article>

	<a name="clients"></a>
	<article class="content clients">
		<section>
			<header>
				<h1><?php echo $clients->post_title; ?></h1>
			</header>
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
			<cite>
				<?php
					if(get_field('c_footnote', $clients->ID)){
						the_field('c_footnote', $clients->ID);
					}
				?>
			</cite>
		</section>
	</article>

	<a name="contact"></a>
	<article class="content contact">
		<section>
			<header>
				<h1><?php echo $contact->post_title; ?></h1>
			</header>
			<section class="vcard">
				<?php
					$content = apply_filters('the_content', $contact->post_content);
					$content = str_replace(']]>', ']]&gt;', $content);
				
					echo $content;
				?>
			</section>
		</section>
	</article>
		
</main>

<!-- 
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
-->