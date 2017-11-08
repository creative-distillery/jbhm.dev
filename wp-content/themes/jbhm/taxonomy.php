<?php

  get_header();


?>

<h1>taxonomy.php</h1>
    <div class="row">
      <div class="col">

      <div class="cd-grid">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


          <div class="cd-grid-item">
            <a href="<?php the_permalink(); ?>">

                <h4><?php the_title(); ?></h4>
                <hr class="accent">



            </a>

          </div>


        <?php endwhile; else: ?>



    <h3 class="mb-4">Sorry, nothing here! This is the taxonomy.php template though!</h3>

  <?php endif; ?>
</div>
</div>
</div>

<?php get_footer(); ?>
