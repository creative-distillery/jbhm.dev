jQuery(document).ready(function($) {

  $('li.nav-item > a').addClass('nav-link');
  $('#quick_links_wrapper > ul').addClass('list-unstyled');

  var gallery = document.querySelector('.cd-gallery');
  var masonry = new Masonry(gallery, {
    itemSelector: '.gallery-item',
    columnWidth: '.grid-sizer',
    percentPosition: true,
  });



  // var industryGallery = document.querySelector('.industry-gallery');
  // var industryMasonry = new Masonry(industryGallery, {
  //   itemSelector: '.industry-gallery-item',
  //   columnWidth: '.industry-grid-sizer',
  //   percentPosition: true,
  //   gutter: 10
  // });

  var $industryMasonry = $('.industry-gallery').masonry({
    itemSelector: '.industry-gallery-item',
    columnWidth: '.industry-grid-sizer',
    percentPosition: true,
    gutter: 10
  });

  $industryMasonry.imagesLoaded().progress( function() {
    $industryMasonry.masonry('layout');
  });

  $('.carousel').on('slide.bs.carousel', function () {
    var height = $('data-height');
    console.log(height);
    $('.carousel').css('height', height + 'px' );
  });

  $('#cd_search_start').on('click', function() {
    $('#cd_search_start').hide();
    $('#cd_search_form').css('display', 'flex');
  });

  $('#breadcrumb_toggle').on('click', function() {
    if ($('#industry_list').data('expanded') == false) {
      $('#industry_list').css('display', 'flex');
      $('#industry_list').data('expanded', true);
      $({deg: 0}).animate({deg: -180}, {
          duration: 300,
          step: function(now){
              $('#breadcrumb_toggle').css({
                   transform: "rotate(" + now + "deg)"
              });
          }
      });

    } else if ($('#industry_list').data('expanded') == true) {
      $('#industry_list').css('display', 'none');
      $('#industry_list').data('expanded', false);
      $({deg: 180}).animate({deg: 0}, {
          duration: 300,
          step: function(now){
              $('#breadcrumb_toggle').css({
                   transform: "rotate(" + now + "deg)"
              });
          }
      });
    }

  });

}); //document.ready

// document.getElementById('learn_more_link').on

function rotateCaret(){

  var elem = jQuery("#learn_more_caret");

  if ( ! jQuery('#learn_more_caret').hasClass('open-caret') ) {

    jQuery({deg: 0}).animate({deg: 90}, {
        duration: 100,
        step: function(now){
            elem.css({
                 transform: "rotate(" + now + "deg)"
            });
        }
    });

    jQuery('#learn_more_caret').addClass('open-caret');

  } else {

    jQuery({deg: 90}).animate({deg: 0}, {
        duration: 100,
        step: function(now){
            elem.css({
                 transform: "rotate(" + now + "deg)"
            });
        }
    });

    jQuery('#learn_more_caret').removeClass('open-caret');

  }


}
