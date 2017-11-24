      <div class="row cd-footer">

        <div class="col-md-6 col-lg-3 order-md-1 cd-footer-col">
          <?php dynamic_sidebar( 'footer-left' ); ?>
        </div>

        <div class="col-md-6 col-lg-3 order-md-3 order-lg-2 cd-footer-col">
          <?php get_sidebar( 'footer_left_center' ); ?>
        </div>

        <div class="col-md-6 col-lg-3 text-md-right order-md-2 order-lg-3 cd-footer-col quick-links-container">
          <?php get_sidebar( 'footer_right_center' ); ?>
        </div>

        <div class="col-md-6 col-lg-3 order-md-4 text-left text-md-right cd-footer-col">
          <?php get_sidebar( 'footer_right' ); ?>
        </div>


      </div>
    </div><!--.container-fluid-->

      <?php wp_footer(); ?>

      <?php get_template_part( '/assets/a/gtm', 'footer' ); ?>
  </body>
</html>
