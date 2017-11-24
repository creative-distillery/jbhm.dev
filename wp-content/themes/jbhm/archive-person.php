<?php

  get_header();

  $all = true;
  $team = false;
  $principals = false;

  if ( isset( $_GET['p'] ) ) {
      switch ( $_GET['p'] ) {
        case 'All':
          break;
        case 'Team':
          $filter = 'team';
          $all = false;
          $team = true;
          break;
        case 'Principals':
          $filter = 'principals';
          $all = false;
          $principals = true;
          break;
      }
  }

  $query = array();

  if ( ! empty( $filter ) ) {

    $query = new WP_Query( array(
      'post_type' => 'person',
      'category_name' => $filter
    ) );

  } else {

    $query = new WP_Query( array(
      'post_type' => 'person'
    ) );
  }

?>

<div class="row">
  <div class="col">
    <div class="d-flex my-3">

      <h2>People</h2>

      <a class="btn people-filter-btn<?php if ($all) : ?> active-filter<?php endif; ?>" href="?p=All" id="filter_all">All</a>
      <a class="btn people-filter-btn<?php if ($principals) : ?> active-filter<?php endif; ?>" href="?p=Principals" id="filter_principals">Principals</a>
      <a class="btn people-filter-btn<?php if ($team) : ?> active-filter<?php endif; ?>" href="?p=Team" id="filter_team">Team</a>

    </div>
  </div>
</div>


    <div class="row mb-4">


        <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

          <?php $headshot = get_field( 'headshot' ); ?>

          <div class="cd-grid-item">

            <a href="<?php the_permalink(); ?>">
              <div class="cd-grid-inner"  style="background-image: url(<?php echo $headshot['sizes']['thumbnail']; ?>)">

                <div class="cd-grid-content-person h-size-adjust">
                  <h3><?php the_title(); ?></h3>
                  <hr class="accent">
                  <h4><?php the_field( 'position' ); ?></h4>
                </div>

              </div>
            </a>

          </div>


        <?php endwhile; else: wp_reset_postdata(); ?>



    <h3 class="mb-4">Sorry, nothing here!</h3>

  <?php endif; ?>

</div>

<?php get_footer(); ?>
