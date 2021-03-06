<?php
/**
 * The header for Bolton & Quinn.
 *
 * @subpackage Bolton Quinn
 * @since Bolton Quinn v. 1.0.0
 */
?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php wp_title( '—', true, 'right' ); ?></title>
  <!-- <title>Bolton & Quinn — An international public relations consultancy for arts and culture</title> -->
  <meta name="format-detection" content="telephone=no"/>
  <meta name="keywords" content="Arts publicity, Arts PR, Cultural public relations, Cultural PR, Museum public relations, Museums PR, Museums public relations, PR UK, Jane Quinn, Erica Bolton" />
  <meta name="description" content='<?php if (is_single()) {
    the_excerpt();
  } else {
    bloginfo( 'description' );
  }
  ?>' />
  <link rel="stylesheet" type="text/css" media="screen, projection" href="<?php echo get_template_directory_uri(); ?>/style.css" />
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
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <?php wp_head(); ?>
</head>
<body>
  <a class="top" name="top"></a>
  <section class="header">
    <header>
      <button type="button" class="nav-mobile-button"></button>
      <a id="top" href="#top" title="Bolton & Quinn homepage"><h1 class="logo">Bolton &amp; Quinn</h1></a>
      <nav role="navigation" class="hidden-nav">
        <a href="#about" title="About">About</a>
        <a href="#clients" title="Clients">Clients</a>
        <a href="#contact" title="Contact">Contact</a>
      </nav>
    </header>
  </section>