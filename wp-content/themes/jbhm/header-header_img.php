<?php

  // if ( get_field( 'header_img' ) ) {

    $headerImg = get_field( 'header_img' );
    $headerHeight = get_field( 'header_height' );
    $headerHeightCss = 'height: ' . $headerHeight . 'px;';

  // } else {

  //   $images = get_field( 'photos' );
  //   $first_row = $images[0];
  //   $headerImg = $first_row['img'];
  //   $headerHeight = $headerImg['height'];
  //   $headerHeightCss = 'height: ' . $headerHeight . 'px;
  //   max-height: 100vh;';
  // }

  $headerImgCss = 'background: url(' . $headerImg['url'] . ');';


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



      <div class="header-img">

        <nav class="navbar navbar-expand-md cd-nav">

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
