<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icon path here -->
    <link rel="icon" href="">
    <?php get_template_part( '/assets/a/gtm', 'head' ); ?>

    <?php wp_head(); ?>

    <style>
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
            <img class="d-block w-100 img-slider" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
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

      <div class="cd-slider-nav">
        <nav class="navbar navbar-expand-md cd-nav" id="cd_header_slider">

          <a class="navbar-brand img-fluid mr-auto" href="<?php bloginfo('url'); ?>">
            <?php if ( get_field( 'logo', 'option' ) ) : ?>
              <?php $logo = get_field( 'logo', 'option' ); ?>
              <img class="cd-logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
            <?php else: ?>
              <h1><?php bloginfo( 'title' ); ?></h1>
            <?php endif; ?>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu" aria-expanded="false" aria-label="Toggle Main Menu">
            <i class="fa fa-bars fa-2x"></i>
          </button>

          <div class="collapse navbar-collapse cd-menu text-right text-md-left" id="main_menu">

            <?php
              $args = array(
                'theme_location' => 'header-menu',
                'menu_class'  => 'navbar-nav nav align-items-end',
                'container'   => 'false'
              );
              wp_nav_menu( $args );
            ?>

             <i class="fa fa-search fa-2x ml-2 accent" data-toggle="modal" data-target="#searchForm"></i>

          </div>

        </nav>

        <?php get_template_part( 'breadcrumbs' ); ?>

      </div><!-- .cd-slider-nav -->
    </div><!-- .carousel -->

    <div class="container-fluid">
