(function ($) {
    function isMobile() {
      return $(window).width <= 991;
    }
  
    function lockScroll() {
      $('html, body').css('overflow', 'hidden');
    }
  
    function unlockScroll() {
      $('html, body').css('overflow', '');
    }
  
    function readLocalCss() {
      var script = $('link').filter(function () {
        return $(this).attr('href').indexOf('/themes/custom/bbseg/css/main.css') >= 0;
      });
  
      script.attr('href', '/themes/custom/bbseg/css/main.css?v=' + parseInt(Math.random() * 100000));
    }
  
    var a = readLocalCss;
  
  
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
  
        othis.$el = $('.region-menu');
  
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
  
    var scroll = {
      sections: null,
      scrollDisabled: false,
  
      init: function () {
        var othis = this;
  
        othis.createSections();
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
        othis.showHideMenu();
  
        if (othis.active == undefined || othis.active.attr('id') != newActive.attr('id')) {
          if (!othis.scrollDisabled) {
            disableScroll();
  
            othis.scrollDisabled = true;
            othis.active = newActive;
  
            if (othis.active.attr('id').indexOf('home') >= 0) {
              $('.main-header').removeClass('menu-fixed');
              $('.pagination-sections').removeClass('pagination-fixed');
            } else {
              $('.main-header').addClass('menu-fixed');
              $('.pagination-sections').addClass('pagination-fixed');
            }
  
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
              scrollTop: othis.active.offset().top
            }, 1000, function () {
              othis.scrollDisabled = false;
              enableScroll();
  
              othis.sections.removeClass('section-active');
              othis.active.addClass('section-active');
  
              othis.lastScrollTop = $(window).scrollTop() <= 0 ? 0 : $(window).scrollTop(); // For Mobile or negative scrolling
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
  
          if (active != undefined)
            return;
          if (st > othis.lastScrollTop) {
            if ($el.offset().top - ($(window).scrollTop() + $(window).height()) < 0)
              active = $el;
          } else {
            if ($el.offset().top - $(window).scrollTop() <= 0)
              active = $el;
          }
        })
  
        return active;
      },
  
      showHideMenu() {
        var othis = this;
        var st = $(window).scrollTop() - 2;
  
        if (st < othis.showHideLastScrollTop) {
          $('.main-header').removeClass('hide-menu');
        } else {
          $('.main-header').addClass('hide-menu');
        }
  
        othis.showHideLastScrollTop = $(window).scrollTop() <= 0 ? 0 : $(window).scrollTop();
      },
  
      createSections: function () {
        var othis = this;
  
        var parent = $('.block-region-content');
        var banner = $('.block-content--banner-homepage');
        var card = $('.block-content--text-principal');
        var section = $('<section id="section-home" class="section"></section>');
        var name = null;
        var className = null;
  
        section.append(banner);
        section.append(card);
  
        section.insertBefore(parent);
  
        parent.find('> *').each(function () {
          className = $(this).attr('class');
  
          if ($(this).attr('class').indexOf('block-content--card') >= 0) {
            name = className.substr(className.indexOf('block-content--card'), className.indexOf(' ')).replace('block-content--card-', '');
            section = $('<section id="section-' + name + '" class="section"></section>');
            section.append($(this));
          } else {
            section.append($(this));
            parent.append(section);
          }
        });
  
        parent.find('> *').unwrap();
  
        othis.sections = $('#fullpage .section');
      },
  
      createControllers: function () {
        var pagination = "<ul class=\"pagination-sections\">";
        var btnNext = $('<div class="button-next"><span class="sr-only">Next</span></div>');
        var activeClass = "";
  
        $(".section").each(function (i) {
          activeClass = "";
          if (i === $.scrollify.currentIndex()) {
            activeClass = "active";
          }
          pagination += "<li><a class=\"" + activeClass + "\" href=\"#" + $(this).attr("id") + "\"><span class=\"sr-only\">" + $(this).attr("id") + "</span></a></li>";
        });
  
        pagination += "</ul>";
  
        $(".main-wrapper").append(pagination);
        $(".main-wrapper").append(btnNext);
  
        $(".button-next").click(function (e) {
          e.preventDefault();
  
          scroll.setActive($('.section.section-active').next());
        });
  
        $(".pagination-sections a").click(function (e) {
          e.preventDefault();
  
          scroll.setActive($($(this).attr('href')));
        });
      }
    }
  
    $(function () {
      initAccordion();
      initAccordionFooter();
  
      scroll.init();
  
      menu.init();
    });
  
  
  })(jQuery);
  