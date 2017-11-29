<?php
  if ( get_field( 'header_img' ) ) {
    get_header( 'header_img' );
  } else {
    get_header();
  }
?>

<div class="row mt-2">
  <div class="page-content">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php the_title( '<h2 class="accent">', '</h2>' ); ?>

    <?php the_content() ?>

    <?php endwhile; else: ?>

      <h3 class="mb-4">Sorry, nothing here!</h3>

    <?php endif; ?>

  </div>
</div>

<?php get_footer(); ?>
