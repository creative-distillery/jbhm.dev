      <div class="row cd-footer">

        <div class="col-12 col-md-3 col-lg-4 cd-footer-col">
          <div class="text-md-center">
          	<div class="d-inline-block text-left">
              <?php dynamic_sidebar( 'footer-left' ); ?>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-3 col-lg-2 cd-footer-col">
          <div class="text-md-center">
          	<div class="d-inline-block text-left">
              <?php get_sidebar( 'footer_left_center' ); ?>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-3 col-lg-2 cd-footer-col quick-links-container">
          <div class="text-md-center">
          	<div class="d-inline-block text-left">
              <?php get_sidebar( 'footer_right_center' ); ?>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-3 col-lg-4 cd-copyright text-md-center cd-footer-col">
          <?php get_sidebar( 'footer_right' ); ?>
        </div>

      </div>

    </div><!--.container-fluid-->

      <?php wp_footer(); ?>

      <?php get_template_part( '/assets/a/gtm', 'footer' ); ?>
  </body>
</html>
