(function($) {
  'use strict';

    var navSearch = $('.main-nav__search');
    var popupSearch = $('.search-popup');
    var popupSearchClose = $('.search-popup__close');

    var navToggle = $('.nav-toggle__icon');
    var nav = $('.main-nav');
    var contentOverlay = $('.content-overlay');

    navSearch.on('click', function(){
      popupSearch.addClass('search-popup--active').find('input[type="text"]').focus();
    });

    popupSearchClose.on('click', function(){
      popupSearch.removeClass('search-popup--active');
    });

    navToggle.on('click', function(){
      nav.addClass('main-nav--mobile');
      contentOverlay.addClass('content-overlay--active');
    });

    contentOverlay.on('click', function(){
      nav.removeClass('main-nav--mobile');
      contentOverlay.removeClass('content-overlay--active');
    });

    jQuery('.ajaxclass').click(function(){
        $.ajax({
          'url':jekono.admin_ajax,
          'type':'POST',
          'data':{'name':'tuhin','action':'jekono_name','security':jekono.security},
          'success':function(output){
            jQuery('.ekhane').html(output);
          },
          'error':function(){
            alert('error');
          },
        })
        return false;
    });

})(jQuery);
