decorte = window.decorte ? decorte : {};
decorte.fascia = function()
{
    "use strict";

    decorte.core.apply(this);


    /**
     * properties
     */
    this.slideMoving    = false;
    this.readyImages    = [];
    this.slideImages    = [];
    this.intervalTimer  = 0;
    this.isFlick        = false;
    this.onTouch        = false;
    this.isSetFirstView = false;


    /**
     * initialize
     */
    this.init = function()
    {
        this.setSlideImages();
        this.addEventResize();
        this.preloadImage(this.slideImages);
        this.setFasciaHeightSize();
        this.attachFasciaSwitchEvent();
        this.addEventTouch();
        this.setFirstViewing();
    };


    this.setSlideImages = function()
    {
        var selector    = ".fascia__carousel__container img";
        var len         = $(selector).length;

        for (var i = 0; i < len; i++) {
            this.slideImages.push($(selector).eq(i).attr('src'));
        }
    };


    /**
     * set interval
     */
    this.setInterval = function()
    {
        this.intervalTimer = setInterval(function(){
            var selector    = ".fascia__controller__switch";
            var current     = $(selector + ".m--current").index();

            if ($(selector).eq(current + 1).size() > 0) {
                $(selector).eq(current + 1).trigger("click");
            }
            else {
                $(selector).eq(0).trigger("click");
            }
        }, 5000);
    };


    /**
     * add event touch
     */
    this.addEventTouch = function()
    {
        var self = this;

        $(document)
            .off('touchstart touchmove touchend', '.fascia__carousel')
            .on({
                'touchstart': function(e) { self.touchStart(); },
                'touchmove' : function(e) { self.touchMove(e); },
                'touchend'  : function(e) { self.touchEnd(); }
            }, '.fascia__carousel');
    };


    /**
     * touch start
     */
    this.touchStart = function()
    {
        if (this.slideMoving == false && this.onTouch == false) {
            this.touchX = event.changedTouches[0].pageX;
            this.onTouch = true;
        }
    };


    /**
     * touch move
     */
    this.touchMove = function(e)
    {
        var moveX = event.changedTouches[0].pageX;

        if (this.slideMoving == false && this.onTouch && ((this.touchX - 10) > moveX || (this.touchX + 10) < moveX)) {
            e.preventDefault();
            this.isFlick = true;
        }
        else {
            this.isFlick = false;
        }
    };


    /**
     * touch end
     */
    this.touchEnd = function()
    {
        if (this.slideMoving == false && this.onTouch && this.isFlick) {
            var move        = -(this.touchX - event.changedTouches[0].pageX);
            var current     = $(".fascia__controller__switch.m--current");
            var selector    = ".fascia__controller__switch";

            /* right */
            if (move < 0) {
                var next = current.next().size() > 0 
                         ? current.next().index()
                         : $(selector + ":first").index();
            }
            /* left */
            else {
                var next = current.prev().size() > 0 
                         ? current.prev().index()
                         : $(selector + ":last").index();
            }

            $(selector).eq(next).trigger("click");
        }

        this.onTouch = false;
        this.isFlick = false;
    };


    /**
     * resize exec
     */
    this.resizeExec = function()
    {
        this.setFasciaHeightSize();
    };


    /**
     * set first viewing
     */
    this.setFirstViewing = function()
    {
        var self = this;

        if (this.isSetFirstView) {
            var img = this.isMobile() ? ".sp.l--center" : ".pc.l--center";

            $(img, ".fascia__carousel__container").velocity('fadeIn', { duration: 1000, complete: function(){
                self.setInterval();
            } });
        }
        else {
            setTimeout(function(){ self.setFirstViewing(); }, 250);
        }
    };


    /**
     * attach fascia switch event
     */
    this.attachFasciaSwitchEvent = function()
    {
        var self = this;

        $(".fascia__controller__switch").on("click", function(){
            if (self.slideMoving == false && !$(this).hasClass("m--current")) {
                self.slideMoving = true;
                clearInterval(self.intervalTimer);

                var current     = $(".fascia__controller__switch.m--current").index();
                var next        = $(this).index();
                var selector    = self.isMobile() ? ".fascia__carousel__node.sp" : ".fascia__carousel__node.pc";

                self.attachCenterClass(current, next);
                $(selector).eq(current).velocity('fadeOut', { duration: 1000 });
                $(selector).eq(next).velocity('fadeIn', { duration: 1000, complete: function(){
                    self.slideMoving = false;
                } });

                $(".fascia__controller__switch.m--current").removeClass("m--current");

                $(this).addClass("m--current");

                self.setInterval();
            }
        });
    };


    /**
     * attach center class
     */
    this.attachCenterClass = function(_current, _next)
    {
        $(".fascia__carousel__node").removeClass("l--center");
        $(".fascia__carousel__node.pc").eq(_next).addClass("l--center");
        $(".fascia__carousel__node.sp").eq(_next).addClass("l--center");
    };


    /**
     * set fascia height size
     */
    this.setFasciaHeightSize = function()
    {
        var self = this;
        var fas  = ".fascia__carousel__container";

        if (this.readyImages.length == this.slideImages.length) {
            self.initModeView();

            var lmt = this.getLimitHeight();

            $(fas).css("height", lmt);

            self.hiddenImageNotVisible();

            $(".fascia__carousel__node.l--center").css("opacity", 1);

            if (this.isSetFirstView == false) {
                this.isSetFirstView = true;
            }
        }
        else {
            setTimeout(function(){ self.setFasciaHeightSize(); }, 250);
        }
    };

    
    /**
     * init mode view
     */
    this.initModeView = function()
    {
        var selector = ".fascia__carousel__node";

        if (this.isMobile()) {
            $(selector + ".pc").hide();
            $(selector + ".sp").show().not(".l--center").css("opacity", 0.01);
            $(selector + ".sp.l--center").css("opacity", 1);
        }
        else {
            $(selector + ".sp").hide();
            $(selector + ".pc").show().not(".l--center").css("opacity", 0.01);
            $(selector + ".pc.l--center").css("opacity", 1);
        }
    };

    
    /**
     * hidden image not visible
     */
    this.hiddenImageNotVisible = function()
    {
        var selector = ".fascia__carousel__node";
            selector = this.isMobile() ? selector + ".sp" : selector + ".pc";

        $(selector).not(".l--center").css("opacity", 0).hide();
    };


    /**
     * get limit height
     */
    this.getLimitHeight = function()
    {

        var fas  = ".fascia__carousel__container";
        var img  = ".fascia__carousel__node__image";
        var tar  = this.isMobile() ? ".sp " + img : ".pc " + img;

        $(tar, fas).css("width", $(window).width());

        var len  = $(tar, fas).length;
        var lmt  = $(tar).eq(0).height();

        for (var i = 0; i < len; i++) {
            if (lmt > $(tar, fas).eq(i).height()) {
                lmt = $(tar, fas).eq(i).height();
            }
        }

        return lmt;
    };


    /**
     * pre load image
     */
    this.preloadImage = function (urls)
    {
        var self    = this;
        var len     = urls.length;

        for (var i = 0; i < len; i++) {
            try {
                var _img = new Image();
                    _img.onload = function(){
                        self.readyImages.push(this);
                    };
                    _img.src = urls[i];
            } catch (e) { }
        }
    };
};
decorte.fascia.prototype             = Object.create(decorte.core.prototype);
decorte.fascia.prototype.constructor = decorte.fascia;

