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
    wp_enqueue_script( 'images_loaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'masonry', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', array( 'jquery', 'images_loaded' ) );
  //  wp_enqueue_script( 'focusingly', get_template_directory_uri() . '/assets/js/focusingly.min.js', '', '', true );
    // wp_enqueue_script( 'cd_gallery', get_template_directory_uri() . '/assets/js/cd-gallery.js', '', '', true );

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
//include_once( get_stylesheet_directory() . '/inc/cpt.php' );

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
  //
  acf_add_options_page();
  //
  // include_once( get_stylesheet_directory() . '/inc/fields.php' );




  function round_up($number, $precision = 0) {
    $fig = (int) str_pad('1', $precision, '0');
    return (ceil($number * $fig) / $fig);
  }

  function five_col($i) {
    while ( $i > 4 ) {
      $i -= 5;
    }
  ;
    return $i + 1;
  }

  function four_col($i) {
    while ( $i > 3 ) {
      $i -= 4;
    }
  ;
    return $i + 1;
  }

  function three_col($i) {
    while ( $i > 2 ) {
      $i -= 3;
    }
  ;
    return $i + 1;
  }

  function two_col($i) {
    while ( $i > 1 ) {
      $i -= 2;
    }
  ;
    return $i + 1;
  }

  function one_col($i) {
    while ( $i > 0 ) {
      $i -= 1;
    }
  ;
    return $i + 1;
  }

  include_once( get_stylesheet_directory() . '/inc/breadcrumbs.php' );
