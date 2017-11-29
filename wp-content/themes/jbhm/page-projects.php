<?php

  get_header();

  $args = array(
    'taxonomy' => 'industries',
    'hide_empty' => false,
    'orderby' => 'name',
    'order' => 'ASC'
  );

  $query = new WP_Term_Query( $args );

?>

<div class="row mt-2">

      <?php foreach ( $query->get_terms() as $term ) : ?>

        <?php $acf_term_id = 'industries_' . $term->term_id; ?>
        <?php $img = get_field( 'industry_image', $acf_term_id ); ?>

        <div class="cd-grid-item col-12 col-sm-6 col-md-4 col-xl-3">

          <a href="../industries/<?php echo $term->slug; ?>">
            <div class="cd-grid-parent">
              <div class="cd-grid-inner" style="background-image: url(<?php echo $img['sizes']['thumbnail']; ?>)">

                <div class="cd-grid-content d-none d-md-flex">
                  <h3><?php echo $term->name; ?></h3>
                  <p class="more-link">More  <i class="fa fa-caret-right fa-lg accent"></i></p>
                </div>

              </div>
              <div class="cd-grid-mobile-content d-flex d-md-none">
                <h3><?php echo $term->name; ?></h3>
                <p class="more-link">More  <i class="fa fa-caret-right fa-lg accent"></i></p>
              </div>
            </div>
          </a>

        </div>

      <?php endforeach; ?>

</div>

<?php get_footer(); ?>
