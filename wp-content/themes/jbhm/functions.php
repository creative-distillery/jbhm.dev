<?php

/* Styles and scripts */

  add_action( 'wp_enqueue_scripts', 'cd_theme_styles' );
  add_action( 'wp_enqueue_scripts', 'cd_theme_scripts' );

  function cd_theme_styles() {
    wp_enqueue_style( 'boostrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fa/css/font-awesome.min.css' );
    wp_enqueue_style( 'main_styles', get_template_directory_uri() . '/style.css' );
  }

  function cd_theme_scripts() {
    wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', '', '', false );
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery', 'popper' ), '', true );
    wp_enqueue_script( 'cd_js', get_template_directory_uri() . '/assets/js/cd.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'masonry', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array( 'jquery' ) );
  }

/* Add Theme Supports */

  add_theme_support( 'menus' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'widgets' );

/* Create Menu Locations */

  function register_theme_menus() {
    register_nav_menus(
      array(
        'header-menu' => 'Header Menu',
        'quick-links' => 'Quick Links'
      )
    );
  }
  add_action( 'init', 'register_theme_menus' );

/* Add .nav-item to li elements in navbar */

  add_filter('nav_menu_css_class' , 'cd_nav_item' , 10 , 2);

  function cd_nav_item($classes, $item){
      $classes[] = 'nav-item';
      return $classes;
  }

/* Setup widget location */

  cd_create_widget( 'Footer Left', 'footer-left', 'Displays in the far left of the footer.' );
  cd_create_widget( 'Footer Left-Center', 'footer-left-center', 'Displays in the center-left of the footer.' );
  cd_create_widget( 'Footer Right-Center', 'footer-right-center', 'Displays in the center-right of the footer.' );

  function cd_create_widget( $name, $id, $description ) {
  	register_sidebar(array(
  		'name' => __( $name ),
  		'id' => $id,
  		'description' => __( $description ),
  		'before_widget' => '<div class="widget">',
  		'after_widget' => '</div>',
  		'before_title' => '<h3>',
  		'after_title' => '</h3>'
  	));
  }

/* Include Custom Post Types */
include_once( get_stylesheet_directory() . '/inc/cpt.php' );

/* Setup ACF */

  add_filter('acf/settings/path', 'my_acf_settings_path');

  function my_acf_settings_path( $path ) {
      $path = get_stylesheet_directory() . '/inc/acf/';
      return $path;
  }

  add_filter('acf/settings/dir', 'my_acf_settings_dir');

  function my_acf_settings_dir( $dir ) {
      $dir = get_stylesheet_directory_uri() . '/inc/acf/';
      return $dir;
  }

/* Hide ACF admin area in backend */

  // add_filter('acf/settings/show_admin', '__return_false');

  include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );

  acf_add_options_page();

  include_once( get_stylesheet_directory() . '/inc/fields.php' );
