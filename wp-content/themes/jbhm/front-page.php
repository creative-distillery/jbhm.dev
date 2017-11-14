<?php

  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

?>

  <div class="row mb-3">
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

      <?php endwhile; endif; ?>

    </div>
  </div>

  <div class="row">

    <?php

      $args = array(
        'post_type' => 'project',
        'orderby' => 'date',
        'posts_per_page' => 20
      );

      $projectQuery = new WP_Query( $args );

    ?>

    <?php if ( $projectQuery->have_posts() ) : ?>

      <div class="industry-gallery">

        <div class="industry-grid-sizer"></div>

        <?php while ( $projectQuery-> have_posts() ) : $projectQuery->the_post(); ?>

          <?php

            if ( get_field( 'header_img' ) ) {
              $img = get_field( 'header_img' );
            } else {
              $gallery = get_field( 'gallery' );
              $img = $gallery[0];
            }
            $width = $img['width'];
            $height = $img['height'];
            $ratio = $width / $height;

          ?>

          <a class="industry-gallery-item<?php if ( $ratio > 1.8 ) : ?> industry-gallery-wide<?php endif;?>" href="<?php the_permalink(); ?>">

            <img class="img-fluid" src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>"/>

            <div class="project-info">

              <div class="text-left w-auto">
                <h4><?php the_title(); ?></h4>
                <hr class="accent">
                <h5><?php the_field( 'location' ); ?></h5>
              </div>
              <div class="text-right w-100">
                <p class="cd-more">More  <i class="fa fa-caret-right fa-lg accent"></i></p>
              </div>

            </div>

          </a>

      <?php endwhile; wp_reset_postdata(); ?>

    </div>

  <?php endif; ?>

</div>

<?php get_footer(); ?>
