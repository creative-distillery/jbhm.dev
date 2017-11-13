<?php

  $gallery = get_field( 'gallery' );

?>

<?php if ( $gallery ) : ?>

  <div class="cd-gallery">

    <div class="grid-sizer"></div>

    <?php foreach( $gallery as $image ) : ?>

      <?php

        $width = $image['width'];
        $height = $image['height'];

        $ratio = $width / $height;
        // print_r($image);

        if ( $ratio >= 2 ) {
          $wideImg = true;
          if ( $image['sizes']['thumbnail-width'] > 710 ) {
            $imgSrc = $image['sizes']['thumbnail'];
          } elseif ( $image['sizes']['medium-width'] > 710 ) {
            $imgSrc = $image['sizes']['medium'];
          } elseif ( $image['sizes']['large-width'] > 710 ) {
            $imgSrc = $image['sizes']['large'];
          } else {
            $imgSrc = $image['url'];
          }
        } else {
          $wideImg = false;
          if ( $image['sizes']['thumbnail-width'] > 350 ) {
            $imgSrc = $image['sizes']['thumbnail'];
          } elseif ( $image['sizes']['medium-width'] > 350 ) {
            $imgSrc = $image['sizes']['medium'];
          } elseif ( $image['sizes']['large-width'] > 350 ) {
            $imgSrc = $image['sizes']['large'];
          } else {
            $imgSrc = $image['url'];
          }
        }


      ?>

      <button type="button" class="gallery-item<?php if ( $wideImg ) : ?> gallery-wide<?php endif; ?> p-2" data-toggle="modal" data-target="#imgLightbox<?php echo $image['ID']; ?>">
        <img class="img-fluid gallery-img" src="<?php echo $imgSrc; ?>" alt="<?php echo $image['alt']; ?>"/>
      </button>

      <div class="modal fade" id="imgLightbox<?php echo $image['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="imgLightbox<?php echo $image['ID']; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="cd-lightbox-content">
            <div class="cd-lightbox-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
              <img class="lightbox-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
          </div>
        </div>
      </div>

    <?php endforeach; ?>

  </div>


<?php endif; ?>
