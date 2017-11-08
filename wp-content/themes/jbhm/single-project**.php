<?php

  $images = get_field( 'photos' );
  $first_row = $images[0];
  $first_image = $first_row['img'];

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
      $gallery = get_field( 'photos' );
    ?>

    <?php if ( have_rows( 'photos' ) ) : ?>

      <div class="row mt-4">
        <div class="col">
          <div class="grid">
            <div class="grid-sizer"></div>

            <?php while ( have_rows( 'photos' ) ) : the_row(); ?>

              <?php $image = get_sub_field( 'img' ); ?>
              <button type="button" data-toggle="modal" data-target="#lightbox<?php echo get_row_index(); ?>">
                <div class="grid-item<?php if ( get_sub_field( 'large' ) ) : ?> grid-item--width2<?php endif; ?>">
                  <img class="img-fluid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                </div>
              </button>

              <div class="modal fade" id="lightbox<?php echo get_row_index(); ?>" tabindex="-1" role="dialog" aria-labelledby="projectPhoto<?php echo get_row_index(); ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="d-flex justify-content-end pb-2">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <img class="img-fluid" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                  </div>
                </div>
              </div>

            <?php endwhile; ?>

          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( get_field( 'testimonial_content' ) ) : ?>

      <div class="row cd-testimonial">
        <div class="col-12">
          <blockquote class="blockquote">


            <div class="text-center">
              <?php the_field( 'testimonial_content' ); ?>

              <footer class="blockquote-footer my-3">
                <?php the_field( 'testimonial_source' ); ?>
              </footer>
            </div>

          </blockquote>
        </div>
      </div>

    <?php endif; ?>

    <div class="cd-blog-nav project-content-wrap mt-5 mb-4">
      <?php previous_post_link( '<p class="blog-nav-link">%link</p>','<i class="fa fa-caret-left accent"></i> Previous Project' ); ?>
      <?php next_post_link( '<p class="blog-nav-link">%link</p>', 'Next Project <i class="fa fa-caret-right accent"></i>' ); ?>
    </div>

  <?php endwhile; else: ?>

    <h3 class="mb-4">Sorry, nothing here!</h3>

  <?php endif; ?>

<?php get_footer(); ?>
