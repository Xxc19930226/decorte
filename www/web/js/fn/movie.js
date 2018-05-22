decorte = window.decorte ? decorte : {};
decorte.movie = function()
{
    "use strict";

    decorte.core.apply(this);


    /**
     * properties
     */
    this.isFirstViewing     = false;
    this.isFirstMovingEvent = true;


    /**
     * initialize
     */
    this.init = function()
    {
        this.setMovieCoat();
        this.setDisplaySize();
        this.addEventResize();
        this.addEvents();
    };


    /**
     * add event
     */
    this.addEvents = function()
    {
        var self = this;

        if (! this.isMobile())
        {
            var scroll_event = 'onwheel' in document ? 'wheel' : 'onmousewheel' in document ? 'mousewheel' : 'DOMMouseScroll';

            $(document)
                .on(scroll_event, function(e){
                    e.preventDefault();

                    if (e && e.originalEvent) {
                        if (e.originalEvent.wheelDelta < 0 || e.originalEvent.deltaY > 0) {
                            self.moveNextSection(scroll_event);
                        }
                    }
                    else {
                        self.moveNextSection(scroll_event);
                    }
                })
                .on('keydown', function(e){
                    if (self.isFirstMovingEvent && (e.keyCode == 40 || (e.keyCode == 32 && e.shiftKey == false))) {
                        self.moveNextSection(scroll_event);
                    }
                })
                .on("click", ".keyvisual__movie__coat__arrow", function(){
                    self.moveNextSection(scroll_event);
                });
        }
    };


    /**
     * move next section
     */
    this.moveNextSection = function(scroll_event)
    {
        var option = { duration: 500, offset: $(window).height(), easing: "ease" };

        $(document).off(scroll_event);
        $("html").velocity("scroll", option);

        this.isFirstMovingEvent = false;
    };


    /**
     * set movie coat
     */
    this.setMovieCoat = function()
    {
        if (! this.isMobile())
        {
            $(".keyvisual__movie__coat").css({
                height  : "100%",
                left    : 0,
                position: "absolute",
                top     : 0,
                width   : "100%",
                zIndex  : 3
            }).show();
            $(".keyvisual__movie__coat__arrow").css({
                bottom      : "64px",
                cursor      : "pointer",
                height      : "16px",
                left        : "50%",
                marginRight : "-20px",
                position    : "absolute",
                width       : "40px"
            });
        }
        else {
            $(".keyvisual__movie__coat").hide();
        }
    };


    /**
     * set arrow style
     */
    this.setArrowStyle = function()
    {
        var tar = $(".keyvisual__movie__coat__arrow");
        var img = $("img", tar);

        if (tar.size() > 0 && tar.is(":visible")) {
            tar.css({
                height      : img.height(),
                marginLeft  : "-" + (img.width() / 2) + "px",
                width       : img.width()
            });
        }
    };


    /**
     * get fullscreen size
     */
    this.getFullscreenSize = function()
    {
        return {
            height  : $(window).height() - $(".global-header").get(0).clientHeight,
            width   : $(document).width() < $(window).width() ? $(window).width() : $(document).width()
        };
    };


    /**
     * set fullscreen margin
     */
    this.setFullscreenMargin = function(_top, _left)
    {
        var selector = ".l--embed-player__container, .keyvisual__image__container img";

        _top > 0    ? $(selector).css({ marginTop: "-" + (_top / 2) + "px" })   : $(selector).css({ marginTop: "0px" });
        _left > 0   ? $(selector).css({ marginLeft: "-" + (_left / 2) + "px" }) : $(selector).css({ marginLeft: "0px" });
    };


    /**
     * set fullscreen size
     */
    this.setFullscreenSize = function(_height, _width)
    {
        $(".l--embed-player__container, .keyvisual__image__container img, .l--embed-player__container video").css({
            height  : _height,
            width   : _width
        });
    };


    /**
     * set fullscreen container size
     */
    this.setFullscreenContainerSize = function(_height, _width)
    {
        $(".keyvisual__movie__container, .keyvisual__image__container").css({
            height  : _height,
            overflow: "hidden",
            width   : _width
        });
    };


    /**
     * reset container style
     */
    this.resetContainerStyle = function()
    {
        var coatSelector    = ".keyvisual__movie__coat";
        var selector        = ".keyvisual__movie__container, .keyvisual__image__container";
        var targetSelector  = ".l--embed-player__container, .keyvisual__image__container img";

        if (this.isMobileByUA()) {
            $(selector).css({
                height  : "auto",
                overflow: "hidden",
                width   : "100%"
            });

            $(targetSelector).css({
                marginLeft  : 0,
                marginTop   : 0
            });

            $(coatSelector).hide();
        }
        else {
            $(selector).css({
                overflow: "hidden",
                width   : "100%"
            });

            $(coatSelector).show();
        }
    };


    /**
     * get fullscreen movie size
     */
    this.getFullscreenMovieSize = function(_screen)
    {
        var rate    = _screen.height / 1080;
        var height  = _screen.height;
        var width   = 1920 * rate;

        if (width < _screen.width) {
            width   = _screen.width;
            rate    = _screen.width / 1920;
            height  = 1080 * rate;
        }

        return { height: height, width: width };
    };


    /**
     * set display size
     */
    this.setDisplaySize = function()
    {
        this.resetContainerStyle();

        if (this.isMobileByUA())
        {
            var rate = $(window).width() / 1920;

            $(".l--embed-player__container, .l--embed-player__container video").css({
                height: (1080 * rate),
                width: $(window).width()
            });
        }
        else {
            var screenSize  = this.getFullscreenSize();
            var movieSize   = this.getFullscreenMovieSize(screenSize);

            this.setFullscreenContainerSize(screenSize.height, screenSize.width);
            this.setFullscreenSize(movieSize.height, movieSize.width);
            this.setFullscreenMargin((movieSize.height - screenSize.height), (movieSize.width - screenSize.width));
            this.setArrowStyle();
        }

        this.fixedHashEvent();
    };


    /**
     * fixed hash event
     */
    this.fixedHashEvent = function()
    {
        var self = this;

        if (this.isFirstViewing == false) {
            this.isFirstViewing = true;

            setTimeout(function(){
                if (window.location.hash && window.location.hash.length > 1) {
                    $('body,html').animate({
                        scrollTop: $(window.location.hash).offset().top - 50
                    }, 500, 'swing');
                }

                var category = self.getUrlParameter("category", window.location.search.substring(1));
                var selector = ".product__category__list .product__category__item[data-type='" + category + "']";

                if (category && $(selector).size() > 0) {
                    $(selector).trigger("click");
                    $("html,body").animate({
                        scrollTop: $(".product.l--fixed-submenu-anchor").offset().top + "px"
                    }, 500, function(){
                        var scroll_event = 'onwheel' in document ? 'wheel' : 'onmousewheel' in document ? 'mousewheel' : 'DOMMouseScroll';

                        $(document).off(scroll_event);

                        self.isFirstMovingEvent = false;
                    });
                }
            }, 500);
        }
    };


    /**
     * resize exec
     */
    this.resizeExec = function()
    {
        this.setMovieCoat();
        this.setDisplaySize();
    };
};
decorte.movie.prototype             = Object.create(decorte.core.prototype);
decorte.movie.prototype.constructor = decorte.movie;
/**
 * liposome movie
 */
decorte.liposomeMovie = function()
{
    "use strict";

    decorte.core.apply(this);


    /**
     * initialize
     */
    this.init = function()
    {
        this.addEventResize();
        this.addEvents();
        /*
        var trigger = this.getUrlParameter('movie', window.location.search.substring(1));

        if (trigger == "autoplay") {
            $(".movie__link__a").trigger("click");
        }
        */
    };


    /**
     * add events
     */
    this.addEvents = function()
    {
        this.preSetMovieSection();

        if (! this.isMobile()) {
            var self = this;

            $(document)
                .off("click", ".movie__link__a")
                .off("click", ".l--liposome-movie__close")
                .on("click", ".movie__link__a", function(e){
                    e.preventDefault();
                    self.openMovie();
                })
                .on("click", ".l--liposome-movie__close", function(e){
                    $(".l--liposome-movie").velocity('fadeOut', { duration: 500 });
                });
        }
    };


    /**
     * pre set movie section
     */
    this.preSetMovieSection = function()
    {
        if (this.isTablet()) {
            $('.sp_movie').show();
        }
        else {
            $('.pc_movie').show();
        }
    };


    /**
     * open movie
     */
    this.openMovie = function()
    {
        if (this.isTablet()) {
            var winW    = $(window).width();
            var rate    = winW / 1920;
            var ht      = rate * 1080;
            var margin  = ($(window).height() - ht) / 2;

            $("#l--embed-player__video-tablet").css({
                height      : ht,
                marginTop   : margin,
                width       : winW
            });
        }

        $(".l--liposome-movie").velocity('fadeIn', { duration: 500 });
    };


    /**
     * resize exec
     */
    this.resizeExec = function()
    {
        this.addEvents();
    };
};
decorte.liposomeMovie.prototype             = Object.create(decorte.core.prototype);
decorte.liposomeMovie.prototype.constructor = decorte.liposomeMovie;

