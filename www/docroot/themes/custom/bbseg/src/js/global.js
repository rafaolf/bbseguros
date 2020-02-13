(function ($) {
  function isMobile() {
    return $(window).width() <= 991;
  }

  $.fn.hasScrollBar = function () {
    return this.get(0).scrollHeight > this.height();
  }

  function lockScroll() {
    $('html, body').css('overflow', 'hidden');
  }

  function unlockScroll() {
    $('html, body').css('overflow', '');
  }

  function showLoading() {
    $('.loading').addClass('active');
  }

  function hideLoading() {
    $('.loading').removeClass('active');
  }

  function initAccordion() {
    jQuery('.accordion').each(function () {
      var el = jQuery(this);
      var header = el.find('.accordion-header, > a');
      var content = el.find('.accordion-content');

      content.hide();

      header.click(function (e) {
        e.preventDefault();

        if (header.hasClass('active')) {
          header.removeClass('active');
          content.removeClass('active').slideUp();
        } else {
          header.addClass('active');
          content.addClass('active').slideDown();
        }
      })
    });
  }

  function initAccordionFooter() {
    if (!isMobile())
      return;

    jQuery('.accordion-mob').each(function () {
      var el = jQuery(this);
      var header = el.find('li').first();
      var content = el.find('li:not(:first-child)');

      content.hide();

      header.click(function (e) {
        if (!isMobile())
          return;

        e.preventDefault();

        if (header.hasClass('active')) {
          header.removeClass('active');
          content.removeClass('active').slideUp();
        } else {
          header.addClass('active');
          content.addClass('active').slideDown();
        }
      })
    });
  };

  var menu = {
    $el: null,
    $active: null,

    init: function () {
      var othis = this;

      othis.$el = $('#fullMenu');

      othis.addEvenetListeners();
    },

    addEvenetListeners: function () {
      var othis = this;

      $('[menu-open]').click(function (e) {
        e.preventDefault();

        if (othis.$active == null)
          othis.open($(this));
        else
          othis.close($(this));
      })

      $('[menu-close]').click(function (e) {
        e.preventDefault();

        othis.close($(this));
      })
    },

    open: function ($click) {
      var othis = this;

      lockScroll();

      othis.$active = $click;

      $click.addClass('menu-active');
      othis.$el.addClass('menu-active');
    },

    close: function () {
      var othis = this;

      othis.$el.removeClass('menu-active');
      othis.$active.removeClass('menu-active');

      othis.$active = null;

      unlockScroll();
    }
  }

  /***** ALL SCROLLS FUNCTIONS ******/

  function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
      e.preventDefault();
    e.returnValue = false;
  }

  function preventDefaultForScrollKeys(e) {
    // left: 37, up: 38, right: 39, down: 40,
    // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
    var keys = {
      37: 1,
      38: 1,
      39: 1,
      40: 1
    };
    if (keys[e.keyCode]) {
      preventDefault(e);
      return false;
    }
  }

  function disableScroll() {
    if (window.addEventListener) // older FF
      window.addEventListener('DOMMouseScroll', preventDefault, false);
    document.addEventListener('wheel', preventDefault, {
      passive: false
    }); // Disable scrolling in Chrome
    window.onwheel = preventDefault; // modern standard
    window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
    window.ontouchmove = preventDefault; // mobile
    document.onkeydown = preventDefaultForScrollKeys;
  }

  function enableScroll() {
    if (window.removeEventListener)
      window.removeEventListener('DOMMouseScroll', preventDefault, false);
    document.removeEventListener('wheel', preventDefault, {
      passive: false
    }); // Enable scrolling in Chrome
    window.onmousewheel = document.onmousewheel = null;
    window.onwheel = null;
    window.ontouchmove = null;
    document.onkeydown = null;
  }

  var scrollHome = {
    sections: null,
    scrollDisabled: false,

    init: function () {
      var othis = this;

      othis.header = $('.region-full-menu');
      othis.sections = $('#fullpage .section');

      if ($('.section-home').length <= 0)
        return;

      othis.createControllers();

      othis.addEventListeners();
    },

    addEventListeners: function () {
      var othis = this;

      othis.setActive();

      othis.lastScrollTop = 0;
      othis.showHideLastScrollTop = 0;

      $(window).scroll(function (e) {
        othis.setActive();
      });
    },

    setActive: function (toActive) {
      var othis = this;
      var newActive = toActive != undefined ? toActive : othis.searchActive();

      // othis.showHideMenu();

      if (othis.active == undefined || othis.active.attr('id') != newActive.attr('id')) {
        if (!othis.scrollDisabled) {
          disableScroll();

          othis.scrollDisabled = true;
          othis.active = newActive;

          if (othis.active.attr('id').indexOf('footer') >= 0) {
            $('.button-next').fadeOut();
          } else {
            $('.button-next').fadeIn();
          }

          $(".pagination-sections a").removeClass('active');
          var paginationActive = $('.pagination-sections a[href="#' + othis.active.attr('id') + '"]');

          if (paginationActive.length > 0)
            paginationActive.addClass('active');

          $('html, body').stop().animate({
            scrollTop: othis.active.offset().top - othis.header.outerHeight(true)
          }, 1000, function () {
            setTimeout(function () {
              othis.scrollDisabled = false;
              enableScroll();

              othis.sections.removeClass('section-active');
              othis.active.addClass('section-active');

              othis.lastScrollTop = $(window).scrollTop() <= 0 ? 0 : $(window).scrollTop(); // For Mobile or negative scrolling
            }, 200);
          });
        }
      }
    },

    searchActive: function () {
      var othis = this;
      var active;
      var st = $(window).scrollTop();

      $(othis.sections.get().reverse()).each(function () {
        var $el = $(this);

        if (active == undefined) {

          if (st > othis.lastScrollTop) {
            if (($(window).scrollTop() + $(window).height() - $el.offset().top).toFixed(2) > 5) {
              active = $el;
            }
          } else {
            if (($(window).scrollTop() + othis.header.outerHeight(true) - $el.offset().top).toFixed(2) > 5) {
              active = $el;
            }
          }
        }
      });

      if (active == undefined)
        active = othis.sections.first();

      return active;
    },

    // showHideMenu() {
    //   var othis = this;
    //   var st = $(window).scrollTop() - 2;

    //   if (st < othis.showHideLastScrollTop) {
    //     $('.main-header').removeClass('hide-menu');
    //   } else {
    //     $('.main-header').addClass('hide-menu');
    //   }

    //   othis.showHideLastScrollTop = $(window).scrollTop() <= 0 ? 0 : $(window).scrollTop();
    // },

    createControllers: function () {
      var pagination = "<ul class=\"pagination-sections\">";
      var btnNext = $('<div class="button-next"><span class="sr-only">Next</span></div>');

      $(".section").each(function (i) {
        pagination += "<li><a href=\"#" + $(this).attr("id") + "\"><span class=\"sr-only\">" + $(this).attr("id") + "</span></a></li>";
      });

      pagination += "</ul>";

      $(".main-wrapper").append(pagination);
      $('.section').append(btnNext);

      $(".button-next").click(function (e) {
        e.preventDefault();

        scrollHome.setActive($('.section-active').nextAll('.section'));
      });

      $(".pagination-sections a").click(function (e) {
        e.preventDefault();

        scrollHome.setActive($($(this).attr('href')));
      });
    }
  }

  var navegacaoGuiada = {

    init: function () {
      var othis = this;

      othis.form = $('#webform-submission-navegacao-guiada-form-ajax');
      othis.formID = othis.form.find('form').attr('data-drupal-form-fields');
      othis.btnNext = othis.form.find('.webform-button--next');
      othis.btnPrev = othis.form.find('.webform-button--previous');
      othis.btnOpen = $('.open-navegacao-guiada');
      othis.steps = othis.form.find('.is-active').index('.progress-step');

      othis.showHidePrevButton();
      // othis.showHideProgress();
      othis.addEventListener();
    },

    addEventListener: function () {
      var othis = this;

      othis.btnOpen.click(function (e) {
        e.preventDefault();

        othis.open();
      });

      othis.form.find('.btn-next').click(function (e) {
        e.preventDefault();

        othis.next();
      });

      othis.form.find('.form-type-radio label').click(function (e) {
        // e.preventDefault();

        setTimeout(function () {
          othis.next();
        }, 300);
      });

      othis.form.find('.btn-prev').click(function (e) {
        e.preventDefault();

        othis.prev();
      });

      othis.form.find('.btn-sair').click(function (e) {
        e.preventDefault();

        othis.close();
      });

      $(window).resize(function () {
        othis.showHideProgress();
      });
    },

    reloadElements: function () {
      var othis = this;

      if (othis.steps == 5) {
        alert('Fim!');
        return;
      }

      showLoading();

      var reload = setInterval(function () {
        if (othis.form.find('form') == undefined || othis.formID == othis.form.find('form').attr('data-drupal-form-fields'))
          return;

        clearInterval(reload);

        othis.init();

        hideLoading();
      }, 200);

    },

    next: function () {
      var othis = this;

      othis.btnNext.trigger('click');

      othis.reloadElements();
    },

    prev: function () {
      var othis = this;

      othis.btnPrev.trigger('click');

      othis.reloadElements();
    },

    open: function () {
      var othis = this;

      othis.form.addClass('active');
      lockScroll();
    },

    close: function () {
      var othis = this;

      othis.form.removeClass('active');
      unlockScroll();
    },

    showHidePrevButton: function () {
      var othis = this;

      othis.form.find('.btn-prev').addClass('inactive');

      if (othis.btnPrev.length > 0)
        othis.form.find('.btn-prev').removeClass('inactive');
    },

    showHideProgress: function () {
      var othis = this;

      if (othis.form.hasScrollBar())
        othis.form.find('.webform-progress').hide();
    }
  }

  function openSubmenu() {
    $('.open-sub-menu').click(function (e) {
      e.preventDefault();

      var $this = $(this);
      var $el = $('.region-sub-menu');

      if ($('.modal-search').hasClass('active')) {
        $('.modal-search').removeClass('active');
        $('.open-search, .modal-search .button-close').removeClass('active');
      }

      if ($el.hasClass('active')) {
        $this.removeClass('active');
        $el.removeClass('active');
        $el.slideUp();
      } else {
        $this.addClass('active');
        $el.addClass('active');
        $el.slideDown();
      }
    });
  }

  function openSearch() {
    $('.open-search, .modal-search .button-close').click(function (e) {
      e.preventDefault();

      var $this = $('.open-search, .modal-search .button-close');
      var $el = $('.modal-search');

      if ($('.open-sub-menu').hasClass('active')) {
        $('.open-sub-menu').removeClass('active');
        $('.region-sub-menu').removeClass('active');
      }

      if ($el.hasClass('active')) {
        $this.removeClass('active');
        $el.removeClass('active');
      } else {
        $this.addClass('active');
        $el.addClass('active');
      }
    });
  }

  var $ = jQuery;

  $(function () {
    initAccordion();
    initAccordionFooter();

    scrollHome.init();

    menu.init();
    navegacaoGuiada.init()

    openSubmenu();
    openSearch();
  });

})(jQuery);


function readLocalCss() {
  jQuery('link').each(function () {
    $el = jQuery(this);
    var href = $el.attr('href');
    if (href.indexOf('main.css') >= 0) {
      if (href.indexOf('?') >= 0)
        href = href.split('?')[0];
      $el.attr('href', href + "?v=" + parseInt(Math.random() * 100000));
    }
  });
}