<?php

  // $images = get_field( 'photos' );
  // $first_row = $images[0];
  // $first_image = $first_row['img'];

  if ( get_field( 'header_img' ) || ! empty( $first_image ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

?>

<div class="project-content-wrap">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="row mt-5">
      <div class="col">
        <?php the_title( '<h2 class="project-title">', '</h2>' );  ?>
      </div>
    </div>

    <div class="row mt-3">

      <div class="col-md-9">
        <h4 class="accent mb-3">Project Description</h3>
        <div class="project-description">
          <?php the_content(); ?>
        </div>
      </div>

      <?php $startTails = false; ?>
      <?php if ( have_rows( 'recognition' ) ) : ?>

        <div class="mb-4 col-md-3">
          <div class="project-details">

            <h5>Recognition</h5>

              <?php while ( have_rows( 'recognition' ) ) : the_row(); ?>
                <p><?php the_sub_field( 'name' ); ?></p>
              <?php endwhile; ?>
              <hr>
        <?php $startTails = true; endif; ?>

      <?php if ( get_field( 'square_ft' ) ) : ?>
        <?php if ( ! $startTails ) : ?>
          <div class="col-md-3">
            <div class="project-details">
        <?php $startTails = true; endif; ?>
        <h5>Square Feet</h5>
        <p><?php the_field( 'square_ft' ); ?></p>
      <?php endif; ?>

      <?php if ( get_field( 'completed' ) ) : ?>
        <?php if ( ! $startTails ) : ?>
          <div class="col-md-3">
            <div class="project-details">
        <?php $startTails = true; endif; ?>
        <h5>Completed</h5>
        <p><?php the_field( 'completed' ); ?>
      <?php endif; ?>

      <?php if ( $startTails ) : ?>
          </div>
        </div>
      <?php endif; ?>


    </div>
  </div><!-- .project-content-wrap -->

    <?php
      $gallery = get_field( 'gallery' );


      $count = 6;

      $percol4 = round_up( $count / 4 );
      $percol3 = round_up( $count / 3 );
      $percol2 = round_up( $count / 2) ;

?>

<?php
    if ( $gallery ) : ?>
      <div class="row cd-gallery">

        <?php

        $layout = array();
        $i = 0;

        foreach( $gallery as $image ) :

          $imginfo = array(
            '5' => five_col($i),
            '4' => four_col($i),
            '3' => three_col($i),
            '2' => two_col($i),
            '1' => one_col($i)
          );

          array_push($layout, $imginfo);
        ?>

        <img class="img-fluid mb-3 gallery-img 5_col-<?php echo $imginfo['5']; ?> 4_col-<?php echo $imginfo['4']; ?> 3_col-<?php echo $imginfo['3']; ?> 2_col-<?php echo $imginfo['2']; ?> 1_col-<?php echo $imginfo['1']; ?>" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>

        <?php
          $i++;

        endforeach;

        ?>

            <div id="column_1" class="col-6 col-md-4 col-lg-3">
            </div>
            <div id="column_2" class="col-6 col-md-4 col-lg-3">
            </div>
            <div id="column_3" class="col-6 col-md-4 col-lg-3">
            </div>
            <div id="column_4" class="col-6 col-md-4 col-lg-3">
            </div>

      </div>
    <?php endif; ?>


    <?php endwhile; else: ?>

      <h3 class="mb-4">Sorry, nothing here!</h3>

    <?php endif; ?>



<?php get_footer(); ?>
