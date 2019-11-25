(function ($, Drupal) {

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
  
    // function scrollToElement(el) {
    //     var $el = $(el);
  
    //     $('html, body').animate({
    //         scrollTop: $el.offset().top
    //     }, 500);
    // }
  
    function initScrollify() {
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
  
      $.scrollify({
        section: ".section",
        before: function (i, panels) {
  
          var ref = panels[i].attr("id");
          var header = $('.main-header');
  
          if (ref.indexOf('home') >= 0) {
            header.removeClass('menu-fixed');
          } else if (!header.hasClass('menu-fixed')) {
            header.hide().addClass('menu-fixed');
  
            setTimeout(function () {
              header.show();
            }, 300);
          }
  
          $(".section").removeClass("section-active");
          $(".section#" + ref).addClass("section-active");
          $(".pagination-sections .active").removeClass("active");
          $(".pagination-sections").find("a[href=\"#" + ref + "\"]").addClass("active");
        },
  
        afterRender: function () {
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
  
          $.scrollify.next()
  
          $(".main-wrapper").append(pagination);
          $(".main-wrapper").append(btnNext);
  
          $(".button-next").on("click", $.scrollify.next);
          $(".pagination-sections a").on("click", $.scrollify.move);
        }
      });
    }
  
    function showHideMenu() {
      var lastScrollTop = 0;
  
      $(window).scroll(function (event) {
        var st = $(this).scrollTop();
  
        if (st > lastScrollTop) {
          $('.main-header').addClass('hide-menu');
        } else {
          $('.main-header').removeClass('hide-menu');
        }
  
        lastScrollTop = st <= 0 ? 0 : st;
      });
    }
  
  
    $(function () {
      initAccordion();
      initAccordionFooter();
  
      initScrollify();
      showHideMenu();
  
      menu.init();
  
      $(window).resize(function () {
        // initAccordionFooter();
      });
  
    });
  
  })(jQuery, Drupal);
  