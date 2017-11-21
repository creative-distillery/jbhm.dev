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

  </head>

  <body <?php body_class(); ?>>

        <nav class="navbar navbar-expand-md cd-nav">

          <a class="navbar-brand w-75 mr-auto" href="<?php bloginfo('url'); ?>">
            <?php if ( get_field( 'logo', 'option' ) ) : ?>
              <?php $logo = get_field( 'logo', 'option' ); ?>
              <img class="img-fluid cd-logo" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"/>
            <?php else: ?>
              <h1><?php bloginfo( 'title' ); ?></h1>
            <?php endif; ?>
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

               <i id="cd_search_start" class="fa fa-search fa-2x ml-2 accent"></i>


               <form id="cd_search_form" method="get" action="<?php echo home_url(); ?>">

                 <input id="search_box" class="form-control" type="text" name="s">

                 <i type="submit" id="cd_search" class="fa fa-search fa-2x ml-2 accent"></i>

               </form>

          </div>
        </nav>

        <?php get_template_part( 'breadcrumbs' ); ?>

      <div class="container-fluid">
