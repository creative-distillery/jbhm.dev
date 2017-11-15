<?php

  if ( get_field( 'header_img' ) ) {

    $headerImg = get_field( 'header_img' );
    $headerImg = $headerImg['url'];
    $headerHeight = get_field( 'header_height' );
    $headerHeightCss = 'height: ' . $headerHeight . 'px;';

  } else {

    $images = get_field( 'gallery' );
    $firstImg = $images[0];
    $headerImg = $firstImg['url'];
    if ( get_field( 'header_height' ) ) {
      $headerHeight = get_field( 'header_height' );
    } elseif ( $firstImg['height'] < 450 ) {
      $headerHeight = $firstImg['height'];
    } else {
      $headerHeight = 450;
    }
    // max-height: 100vh;';
  }
  $headerHeightCss = 'height: ' . $headerHeight . 'px;';
  $headerImgCss = 'background: url(' . $headerImg . ');';


 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icon path here -->
    <link rel="icon" href="">

    <?php wp_head(); ?>

    <style>
      div.header-img {
        <?php echo $headerImgCss; ?>
        background-size: cover;
        background-repeat: no-repeat;
        <?php if ( is_front_page() ) : ?>
          height: 100vh;
        <?php else : ?>
          <?php echo $headerHeightCss; ?>
        <?php endif; ?>
        background-position: center;
      }
      nav.cd-nav {
        background-color: rgba(55, 55, 55, .6);
      }
    </style>

  </head>

  <body <?php body_class(); ?>>

    <?php
      $gallery = get_field( 'gallery' );
      $sliders = array();
      foreach ( $gallery as $image ) {
        if ( get_field( 'slider', $image['ID'] ) ) {
          array_push( $sliders, $image );
        }
      }
    ?>

      <div id="header_carousel_<?php echo $post->ID; ?>" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
          <?php $i = 0; ?>
          <?php foreach ( $sliders as $indicator ) : ?>
            <li data-target="#header_carousel_<?php echo $post->ID; ?>" data-slide-to="<?php echo $i; ?>"<?php if ( $i == 0 ) :?> class="active"<?php endif; ?>></li>
            <?php $i++; ?>
          <?php endforeach; ?>
        </ol>

        <div class="carousel-inner">
          <?php $i = 0; ?>
          <?php foreach ( $sliders as $image ) : ?>
            <div class="carousel-item<?php if ( $i == 0 ) : ?> active<?php endif; ?>" data-height="<?php echo $image['height']; ?>">
              <img class="d-block w-100" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#header_carousel_<?php echo $post->ID; ?>" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#header_carousel_<?php echo $post->ID; ?>" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

        <nav class="navbar navbar-expand-md cd-nav cd-slider-nav">

          <a class="navbar-brand w-75 mr-auto" href="<?php bloginfo('url'); ?>">
            <svg height="77" width="140">
              <line x1="0" y1="15" x2="140" y2="15" class="accent" style="stroke-width:5;" />
            </svg>
            <h1>JBHM <span class="architecture">Architecture</span></h1>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle Main Menu">
            <i class="fa fa-bars fa-2x"></i>
          </button>

          <div class="collapse navbar-collapse cd-menu" id="main_menu">

            <?php

              $args = array(
                'theme_location' => 'header-menu',
                'menu_class'  => 'navbar-nav nav justify-content-end',
                'container'   => 'false'
              );
              wp_nav_menu( $args );

               ?>

               <a href="#"><i class="fa fa-search fa-2x ml-2 accent"></i></a>

          </div>
        </nav>

      </div><!-- .header-img -->

      <div class="container-fluid">