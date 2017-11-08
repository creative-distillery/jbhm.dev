<?php get_header(); ?>

<div class="row">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="col-12 col-md-6">
      <div class="cd-blog-card">

          <?php the_post_thumbnail( 'medium_large', ['class' => 'blog-thumb'] ); ?>

        <div class="cd-blog-desc">

          <div class="cd-blog-tails">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <hr class="accent">
            <p><?php the_time( 'n.j.y'); ?></p>
          </div>

          <div class="text-right">
            <a href="<?php the_permalink(); ?>" class="cd-more">
              More <i class="fa fa-caret-right accent"></i>
            </a>
          </div>

        </div>

      </div>
    </div>

  <?php endwhile; else: ?>

    <h3 class="mb-4">Sorry, nothing here!</h3>

  <?php endif; ?>

</div>

<?php get_footer(); ?>
