<?php
/**
 * The Header for my theme.
 */
global $post;
$client_class="";
if( get_post_type( $post->ID ) == 'bq_clients'){
	$client_class="client-listing";
}

?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=11,chrome=1" />
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<meta name="author" content="Bonlton Quinn">
<meta name="format-detection" content="telephone=no"/>
<meta name="keywords" content="Arts publicity, Arts PR, Cultural public relations, Cultural PR, Museum public relations, Museums PR, Museums public relations, PR UK, Jane Quinn, Erica Bolton" />
<title><?php bloginfo( $show='name' ) ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="dns-prefetch" href="http://ajax.googleapis.com" />
<script>
  document.createElement("main");
  document.createElement("section");
  document.createElement("article");
  document.createElement("nav");
  document.createElement("header");
  document.createElement("footer");
  document.createElement("aside");
</script>

<?php wp_head(); ?>
</head>
<body <?php body_class($client_class); ?> >
