<?php
/**
 * The main index file.
 *
 * @subpackage Bolton Quinn
 * @since Bolton Quinn v. 1.0.0
 */
 get_header(); ?>


  <main role="main">
    <?php
      $query_images_args = array(
        'post_type' => 'attachment', 'post_mime_type' =>'image', 'post_status' => 'inherit', 'posts_per_page' => -1,
      );

      $query_images = new WP_Query( $query_images_args );
      $images = array();
      foreach ( $query_images->posts as $image) {
        $images[] = $image->ID;
      }

      function getRandomNumber( $array, $length ) {
        $randomNum =  rand( 0, $length - 1 );
        for ($i = 0; $i < count($array); $i++) {
          if ($array[$i] === $randomNum) {
            return getRandomNumber( $array, $length );
          }
        }
        return $randomNum;
      }

      $testImages = array();
      $testImages[0] = getRandomNumber( $testImages, count($images) );
      $testImages[1] = getRandomNumber( $testImages, count($images) );
      $testImages[2] = getRandomNumber( $testImages, count($images) );

      $count = 0;
      while ( $count < 3 ) {
        $index = $images[ $testImages[$count] ];
        $imageMobileURL = wp_get_attachment_image_src( $index, 'mobile' );
        $imageURL = wp_get_attachment_url( $index );
        $title = get_post_meta( $index, 'meta_title', true );
        $artist = get_post_meta( $index, 'meta_artist', true );
        $location = get_post_meta( $index, 'meta_location', true );
        $citation = get_post_meta( $index, 'meta_citation', true );
    ?>
    <style>
      .leading-image[data-index="<?php echo $count; ?>"] { background-image: url(<?php echo $imageURL; ?>); }
      @media screen and (max-width: 1024px) {
        .leading-image[data-index="<?php echo $count; ?>"] { background-image: url(<?php echo $imageMobileURL; ?>); }
      }
    </style>
    <article class="leading-image sticky" data-index="<?php echo $count; ?>">
      <section class="opening-text first-text">
        <?php if ( $count === 0 ) { ?>
        <p><span>Bolton &amp; Quinn</span> is an international public relations consultancy for arts and culture.</p>
        <?php } ?>
        <button type="button" title="Advance to next example"></button>
      </section>
      <aside>
        <section>
          <h2><?php echo $title; ?><?php if ( $artist !== '' ) { ?><span><?php if ( $title !== '' ) { ?>,<?php } ?> <?php echo $artist; ?></span><?php } ?></h2>
          <h3><?php echo $location; ?></h3>
          <cite><?php echo $citation; ?></cite>
          <button type="button" class="open-button" title="Read the caption"><span>+</span> Caption</button>
          <button type="button" class="close-button" title="Close the caption"></button>
        </section>
      </aside>
    </article>
    <?php
        $count++;
      }
      unset( $count );
      unset( $index );
      unset( $imageMobileURL );
      unset( $imageURL );
      unset( $title );
      unset( $artist );
      unset( $location );
      unset( $citation );
      unset( $testImages );
      unset( $query_images_args );
      unset( $query_images );
      unset( $images );
    ?>

    <a name="about"></a>
    <article class="content about">
      <section>
        <header>
        <?php $about = get_post(8); ?>
          <h1><?php echo $about->post_title; ?></h1>
        </header>
        <?php echo $about->post_content; ?>
      </section>
    </article>

    <a name="clients"></a>
    <article class="content clients">
      <section>
        <header>
        <?php $clients = get_post(5); ?>
          <h1><?php echo $clients->post_title; ?></h1>
        </header>
        <?php echo $clients->post_content; ?>
        <cite></cite>
      </section>
    </article>

    <a name="contact"></a>
    <article class="content contact">
      <section>
        <header>
        <?php $contact = get_post(10); ?>
          <h1><?php echo $contact->post_title; ?></h1>
        </header>
        <?php echo $contact->post_content; ?>
      </section>
    </article>
  </main>

<?php get_footer(); ?>