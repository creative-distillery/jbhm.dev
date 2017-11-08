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

        <div class="col-md-3">
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
    ?>

    <?php if ( $gallery ) : ?>
      <div class="row">
        <div class="col">
          <div class="cd-gallery">

            <?php foreach( $gallery as $image ) : ?>

              <?php
                $width = $image['width'];
                $height = $image['height'];
              ?>
              <div class="cd-gallery-item">
                <img class="img-fluid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
              </div>

            <?php endforeach; ?>

          </div>
        </div>
      </div>
    <?php endif; ?>


    <?php endwhile; else: ?>

      <h3 class="mb-4">Sorry, nothing here!</h3>

    <?php endif; ?>



<?php get_footer(); ?>
