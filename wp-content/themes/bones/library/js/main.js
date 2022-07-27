jQuery(document).ready(function ($) {

  // Slides
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto',
    centeredSlides: true,
    paginationClickable: true,
    //spaceBetween: 5000,
    autoplay: {
      delay: 8000,
    },
    pagination: {
      el: '.swiper-container .swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-container .swiper-button-next",
      prevEl: ".swiper-container .swiper-button-prev",
    },
    //loop: true,
    // breakpoints: {
    //     // when window width is <= 320px
    //     1024: {
    //       slidesPerView: 2,
    //     },
    //     // when window width is <= 480px
    //     768: {
    //       slidesPerView: 1,
    //       spaceBetween: 20
    //     }
    //   }
  });

  // Header
  $(window).on('scroll', function() {
    const $html = $('html'),
          $this = $(this);
    
    if ($this.scrollTop() != 0) {
      $html.addClass('is-active-header')
    } else {
      $html.removeClass('is-active-header')
    }
  });

  // Remove action
  $('.js-no-action').on('click', function(e) {
    e.preventDefault();
  });

  // Menu mobile
  $('.js-menu-mobile').on('click', function(e) {
    const $html = $('html');

    $html.toggleClass('is-active-menu');
  });

  // MASKED INPUT
  $(".js-data").mask("99/99/9999");
  $(".js-cpf").mask("999.999.999-99");
  $(".js-cep").mask("99999-999");
  $(".js-cnpj").mask("99.999.999/9999-99");
  $('.js-phone').focusout(function(){
    var phone, element;
    element = $(this);
    element.unmask();
    phone = element.val().replace(/\D/g, '');
    if(phone.length > 10) {
      element.mask("(99) 99999-999?9");
    } else {
      element.mask("(99) 9999-9999?9");
    }
  }).trigger('focusout');

});