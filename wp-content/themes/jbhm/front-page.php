<?php

  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

?>

  <div class="row">
    <div class="col">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="text-center mt-3">
          <a class="cd-more" id="learn_more_link" data-toggle="collapse" onclick="rotateCaret()" href="#homeContentWrap" aria-expanded="false" aria-controls="homeContentWrap">
            LEARN MORE  <i class="fa fa-caret-right fa-lg accent" id="learn_more_caret"></i>
          </a>
        </div>

        <div class="home-content-wrap collapse" id="homeContentWrap">
          <?php the_content(); ?>
        </div>

      <?php endwhile; else: ?>


        <h3 class="mb-4">Sorry, nothing here!</h3>

      <?php endif; ?>
    </div>
  </div>
<?php get_footer(); ?>
