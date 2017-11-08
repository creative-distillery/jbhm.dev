jQuery(document).ready(function($) {

  $('li.nav-item > a').addClass('nav-link');
  $('#quick_links_wrapper > ul').addClass('list-unstyled');

  // $('#learn_more_link').click(rotateCaret());

  $('.grid').masonry({
    // options
    percentPosition: true,
    columnWidth: '.grid-sizer',
    itemSelector: '.grid-item',
    columnWidth: 200,
    gutter: 5
  });


});

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
