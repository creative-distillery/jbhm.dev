<?php

  get_header();

  $args = array(
    'taxonomy' => 'services',
    'hide_empty' => false,
    'orderby' => 'name',
    'order' => 'ASC'
  );

  $query = new WP_Term_Query( $args );

?>

<div class="row mt-2">

      <?php foreach ( $query->get_terms() as $term ) : ?>

        <?php $acf_term_id = 'services_' . $term->term_id; ?>
        <?php $img = get_field( 'image', $acf_term_id ); ?>

        <div class="col-6 col-md-4 col-lg-3 project-grid-item-container">
          <a href="../services/<?php echo $term->slug; ?>">

          <div class="project-grid-item" style="background-image: url(<?php echo $img['sizes']['thumbnail']; ?>)">

              <div class="industry-info">
                <h4><?php echo $term->name; ?></h4>
                <p class="cd-more">More  <i class="fa fa-caret-right fa-lg accent"></i></p>
              </div>

          </div>
        </a>

        </div>

      <?php endforeach; ?>

</div>

<?php get_footer(); ?>
