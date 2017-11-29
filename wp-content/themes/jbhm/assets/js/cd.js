jQuery(document).ready(function($) {

  $('li.nav-item > a').addClass('nav-link');
  $('#quick_links_wrapper > ul').addClass('list-unstyled');

  //initialize Masonry plugin
  var $industryMasonry = $('.cd-gallery').masonry({
    itemSelector: '.cd-gallery-item',
    columnWidth: '.cd-gallery-sizer',
    percentPosition: true,
    gutter: 10
  });

  $industryMasonry.imagesLoaded().progress( function() {
    $industryMasonry.masonry('layout');
  });

  // $('.carousel').on('slide.bs.carousel', function () {
  //   var height = $('data-height');
  //   console.log(height);
  //   $('.carousel').css('height', height + 'px' );
  // });

  $('#cd_search_start').on('click', function() {
    // When the search icon is clicked, do this:
    $('#cd_search_start').hide(); // Hide the search icon (icon is replaced by identical icon used as the submit button)
    $('#cd_search_form').css('display', 'flex'); // Show the search form
    $('#menu-main-menu').hide('fast', function() { // Hide the menu items so the nav bar doesn't get crowded and funky looking, then...
      $(document).one('click', function(e){
        var target = e.target;
        if (!$(target).is('#cd_search_form') && !$(target).parents().is('#cd_search_form')) {
          // When anything but the search form is clicked, undo everything.
          $('#menu-main-menu').show('fast');
          $('#cd_search_form').css('display', 'none');
          $('#cd_search_start').show();
        }
      })
    });
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

  lightbox.option({
       'resizeDuration': 200,
       'wrapAround': true
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
