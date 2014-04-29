<?php
/**
 * Bolton & Quinn functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @package WordPress
 * @subpackage Bolton Quinn
 * @since Bolton Quinn v. 1.0.0
 */

/* Allow for featured image in posts */
if ( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}

/* Set new rendition size */
if ( function_exists( 'add_image_size' ) ) {
  add_image_size( 'mobile', 1800, false, true);
}

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Fourteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function twentyfourteen_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() ) {
    return $title;
  }

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title = "$title $sep $site_description";
  }

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 ) {
    $title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
  }

  return $title;
}

/**
  * Maintains image quality from resized JPG/JPEG images
  * From http://wordpress.stackexchange.com/questions/1567/best-collection-of-code-for-your-functions-php-file/35526#35526
  */
function ajx_sharpen_resized_files( $resized_file ) {
  $image = wp_load_image( $resized_file );
  if ( !is_resource( $image ) )
    return new WP_Error( 'error_loading_image', $image, $file );
  $size = @getimagesize( $resized_file );
  if ( !$size )
    return new WP_Error('invalid_image', __('Could not read image size'), $file);
  list($orig_w, $orig_h, $orig_type) = $size;
  switch ( $orig_type ) {
    case IMAGETYPE_JPEG:
      $matrix = array(
        array(-1, -1, -1),
        array(-1, 16, -1),
        array(-1, -1, -1),
      );
      $divisor = array_sum(array_map('array_sum', $matrix));
      $offset = 0; 
      imageconvolution($image, $matrix, $divisor, $offset);
      imagejpeg($image, $resized_file,apply_filters( 'jpeg_quality', 90, 'edit_image' ));
      break;
    case IMAGETYPE_PNG:
      return $resized_file;
    case IMAGETYPE_GIF:
      return $resized_file;
  }
  return $resized_file;
}

if ( function_exists( 'add_filter' ) ) {
  add_filter( 'wp_title', 'twentyfourteen_wp_title', 10, 2 );
  add_filter('image_make_intermediate_size', 'ajx_sharpen_resized_files', 900);
}

/**
  * Add custom meta data to images for use in the main image feed area
  * From http://www.wpbeginner.com/wp-tutorials/how-to-add-additional-fields-to-the-wordpress-media-uploader/
  * @param $form_fields Array for fields to include in this media
  * @param $post Object of record in the database
  * @return $form_fields The modified collection
  */
function add_image_meta_field( $form_fields, $post ) {
  $form_fields['meta-title'] = array(
    'label' => 'Artwork Title',
    'input' => 'text',
    'value' => get_post_meta( $post->ID, 'meta_title', true ),
    'helps' => 'The title of the artwork or exhibition; will not be italicized'
  );

  $form_fields['meta-artist'] = array(
    'label' => 'Artist or Collective\'s Name',
    'input' => 'text',
    'value' => get_post_meta( $post-> ID, 'meta_artist', true ),
    'helps' => 'The name of the artist or collective; will be italicized'
  );

  $form_fields['meta-location'] = array(
    'label' => 'Exhibition Location',
    'input' => 'text',
    'value' => get_post_meta( $post->ID, 'meta_location', true ),
    'helps' => 'Location of the exhibition, or secondary info'
  );

  $form_fields['meta-citation'] = array(
    'label' => 'Image credit',
    'input' => 'text',
    'value' => get_post_meta( $post->ID, 'meta_citation', true ),
    'helps' => 'The photographer or other credit'
  );

  return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'add_image_meta_field', 10, 2 );

/**
  * Save values above in the media uploader
  * @param $post Array of post data
  * @param $attachment Array of fields
  * @return $post The modified array
  */
function add_image_meta_field_save( $post, $attachment ) {
  if ( isset( $attachment['meta-title'] ) ) {
    update_post_meta( $post['ID'], 'meta_title', $attachment['meta-title'] );
  }

  if ( isset( $attachment['meta-artist'] ) ) {
    update_post_meta( $post['ID'], 'meta_artist', $attachment['meta-artist'] );
  }

  if ( isset( $attachment['meta-location'] ) ) {
    update_post_meta( $post['ID'], 'meta_location', $attachment['meta-location'] );
  }

  if ( isset( $attachment['meta-citation'] ) ) {
    update_post_meta( $post['ID'], 'meta_citation', $attachment['meta-citation'] );
  }

  return $post;
}

add_filter( 'attachment_fields_to_save', 'add_image_meta_field_save', 10, 2 );

?>