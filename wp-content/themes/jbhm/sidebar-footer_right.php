  <?php if ( get_field( 'copyright_label', 'option' ) ) : ?>
    <p class="cd-copyright">&copy; <?php the_field( 'copyright_label', 'option' ); ?> <?php echo date_i18n('Y'); ?>
  <?php endif; ?>
