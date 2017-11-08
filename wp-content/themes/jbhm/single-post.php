<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="row">
    <div class="col">
      <div class="cd-blog-post-wrap">

        <h3>News</h3>

        <?php the_title( '<h2 class="accent">', '</h2>' ); ?>

        <div class="cd-blog-post-tails">
          <p><?php the_time( 'n.j.Y' ); ?></p>
          <p><?php the_author(); ?></p>
          <hr class="accent">
        </div>

        <?php the_content() ?>

        <div class="cd-blog-nav">
          <?php previous_post_link( '<p class="blog-nav-link">%link</p>','<i class="fa fa-caret-left accent"></i> Previous Story' ); ?>
          <?php next_post_link( '<p class="blog-nav-link">%link</p>', 'Next Story <i class="fa fa-caret-right accent"></i>' ); ?>
        </div>
    </div>

    </div>
  </div>

<?php endwhile; else: ?>

  <h3 class="mb-4">Sorry, nothing here!</h3>

<?php endif; ?>

<?php get_footer(); ?>
