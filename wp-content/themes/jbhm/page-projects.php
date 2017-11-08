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
  <div class="col">
    <div class="cd-grid">

      <?php foreach ( $query->get_terms() as $term ) : ?>

        <?php $acf_term_id = 'industries_' . $term->term_id; ?>
        <?php $img = get_field( 'industry_image', $acf_term_id ); ?>

        <div class="cd-grid-item">

          <a href="../industries/<?php echo $term->slug; ?>">

            <img class="img-fluid" src="<?php echo $img['sizes']['thumbnail']; ?>" alt="<?php echo $img['alt']; ?>"/>

            <div class="industry-info">
              <h4><?php echo $term->name; ?></h4>
              <p class="cd-more">More  <i class="fa fa-caret-right fa-lg accent"></i></p>
            </div>

          </a>

        </div>

      <?php endforeach; ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
