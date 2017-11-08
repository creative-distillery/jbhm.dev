<div class="col-md-6 col-lg-3 order-md-4 text-left text-md-right cd-footer-col">
  <?php if ( get_field( 'copyright_label', 'option' ) ) : ?>
    <p class="cd-copyright">&copy; <?php the_field( 'copyright_label', 'option' ); ?> <?php echo date_i18n('Y'); ?>
  <?php endif; ?>
</div>
