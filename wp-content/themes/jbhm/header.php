<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Icon path here -->
    <link rel="icon" href="">

    <?php wp_head(); ?>

  </head>

  <body <?php body_class(); ?>>

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

      <div class="container-fluid">
