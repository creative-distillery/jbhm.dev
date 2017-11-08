<?php

  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }

?>

<div class="person-content-wrap">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="row">
      <div class="col-6">

        <?php the_title( '<h2 class="mb-1">', '</h2>' );  ?>

        <?php if ( get_field( 'position' ) ) : ?>
          <h4 class="accent"><?php the_field( 'position' ); ?></h4>
        <?php endif; ?>

        <?php if ( get_field( 'bio' ) ) : ?>
          <?php the_field( 'bio' ); ?>
        <?php endif; ?>

        <?php if ( have_rows( 'awards' ) ) : ?>
          <h5 class="mt-4">Awards</h5>
          <ul class="award-list">
            <?php while ( have_rows( 'awards' ) ) : the_row(); ?>
              <li><span class="award-name"><?php the_sub_field( 'name' ); ?></span></li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>

        <?php if ( get_field( 'vision' ) ) : ?>
          <h5 class="mt-4">Firm Vision</h5>
          <?php the_field( 'vision' ); ?>
        <?php endif; ?>

      </div>

      <div class="col-6">

        <?php if ( get_field( 'headshot' ) ) : ?>
          <?php $headshot = get_field( 'headshot' ); ?>
            <img class="img-fluid" src="<?php echo $headshot['url']; ?>" alt="<?php echo $headshot['alt']; ?>"/>
        <?php endif; ?>

        <div class="person-details">

          <?php if ( get_field( 'email' ) ) : ?>
            <p><?php the_field( 'email' ); ?></p>
          <?php endif; ?>

          <?php if ( get_field( 'phone' ) ) : ?>
            <p><?php the_field( 'phone' ); ?></p>
          <?php endif; ?>

        </div>

        <hr class="accent">

      </div>
    </div>


    <div class="cd-blog-nav mt-5 mb-4">
      <div class="row w-100">
        <div class="col-6 w-50 text-left">
          <?php previous_post_link( '<p class="blog-nav-link">%link</p>','<i class="fa fa-caret-left accent"></i> Previous' ); ?>
        </div>
        <div class="col-6 w-50 text-right">
          <?php next_post_link( '<p class="blog-nav-link">%link</p>', 'Next <i class="fa fa-caret-right accent"></i>' ); ?>
        </div>
      </div>
    </div>

  <?php endwhile; else: ?>

    <h3 class="mb-4">Sorry, nothing here!</h3>

  <?php endif; ?>
</div><!-- .service-content-wrap -->


<?php get_footer(); ?>
