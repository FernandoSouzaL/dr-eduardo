jQuery(document).ready(function ($) {

  // Slides
  var swiper = new Swiper('.js-home-slider', {
    slidesPerView: 'auto',
    centeredSlides: true,
    paginationClickable: true,
    autoplay: {
      delay: 8000,
    },
    scrollbar: {
      el: ".js-home-slider .swiper-scrollbar",
    }
  });

  var swiper = new Swiper('.js-slider-testimonial', {
    slidesPerView: 1,
    centeredSlides: true,
    paginationClickable: true,
    scrollbar: {
      el: ".js-slider-testimonial .swiper-scrollbar",
    },
  });

  var swiper = new Swiper('.js-slider-gallery', {
    slidesPerView: 1,
    centeredSlides: true,
    paginationClickable: true,
    scrollbar: {
      el: ".js-slider-gallery .swiper-scrollbar",
    },
  });

  var swiper = new Swiper('.js-slider-hospitals', {
    slidesPerView: 3,
    paginationClickable: true,
    spaceBetween: 30,
    scrollbar: {
      el: ".js-slider-hospitals .swiper-scrollbar",
    },
    breakpoints: {
      1023: {
        slidesPerView: 2,
      },
      425: {
        slidesPerView: 1,
        spaceBetween: 20
      }
    }
  });

  var swiper = new Swiper('.js-slider-categories', {
    slidesPerView: 3,
    paginationClickable: true,
    spaceBetween: 30,
    scrollbar: {
      el: ".js-slider-categories .swiper-scrollbar",
    },
    breakpoints: {
      655: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      375: {
        slidesPerView: 1,
        spaceBetween: 5
      }
    }
  });

  var swiper = new Swiper('.js-slider-procedures', {
    slidesPerView: 3,
    paginationClickable: true,
    spaceBetween: 30,
    scrollbar: {
      el: ".js-slider-procedures .swiper-scrollbar",
    },
    breakpoints: {
      1023: {
        slidesPerView: 2,
      },
      560: {
        slidesPerView: 1,
        spaceBetween: 20
      }
    }
  });

  var swiper = new Swiper('.js-slider-blog', {
    slidesPerView: 3,
    paginationClickable: true,
    spaceBetween: 30,
    scrollbar: {
      el: ".js-slider-blog .swiper-scrollbar",
    },
    breakpoints: {
      1023: {
        slidesPerView: 2,
      },
      560: {
        slidesPerView: 1,
        spaceBetween: 20
      }
    }
  });

  var swiper = new Swiper('.js-slider-video', {
    slidesPerView: 3,
    paginationClickable: true,
    spaceBetween: 30,
    scrollbar: {
      el: ".js-slider-blog .swiper-scrollbar",
    },
    breakpoints: {
      1023: {
        slidesPerView: 2,
      },
      560: {
        slidesPerView: 1,
        spaceBetween: 20
      }
    }
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

  // Ajax procedures
  $('.js-ajax-procedures').on('click', function(e) {
    e.preventDefault();

    const $this = $(this),
          value = $this.attr('href');

    $('.js-ajax-procedures').removeClass('is-current-category');
    $this.addClass('is-current-category');

    $.ajax({
      type: 'POST',
      url: '../wp-content/themes/bones/library/php/busca-procedimentos.php?acao=busca_procedimentos',
      data: {
        slug: value
      },
      beforeSend : function() {
        $('.c-procedures__loading').show();
      },
      success : function(e) {
        $('.c-procedures__loading').hide();
        $('.js-ajax-container').html('');
        $('.js-ajax-container').append(e);
      }
    });
  });

  // Play video yt
  $('.js-video-player').on('click', function() {
    const $video = $(this),
          videoSrc = $video.data('video'),
          videoPlayer = $video.children('.js-video-play');
    
    $video.addClass('is-playing');
    videoPlayer.attr('src', videoSrc);
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