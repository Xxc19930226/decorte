decorte = window.decorte ? decorte : {};
decorte.detail = function()
{
    "use strict";

    decorte.core.apply(this);


    /**
     * properties
     */
    this.isFlick    = false;
    this.isMove     = false;
    this.onTouch    = false;


    /**
     * initialize
     */
    this.init = function()
    {
        this.setDefaultPosition();
        this.setSlideAreaHeight();
        this.setArrowElement();
        this.addEventArrow();
        this.addEventResize();
        this.setArrowViewing();
        this.addEventSocialButton();
        this.checkToggleboxScroll();
        this.addEventTouch();
    };


    /**
     * add event social button
     */
    this.addEventSocialButton = function()
    {
        var self = this;

        $(document)
            .on("mouseenter", ".icon_share", function(){
                $(this).parent().css("position", "relative");

                var html = "<div class='l--product-share-popup__container'>";
                    html+= "<span class='l--facebook-share-button'><img src='/images/itemdetail/share.facebook.png' /></span>";
                    html+= "<a href='https://twitter.com/intent/tweet?tw_p=tweetbutton' class='l--tweet-button'><img src='/images/itemdetail/share.twitter.png' /></a>";
                    html+= "</div>";

                if ($(".l--product-share-popup").size() == 0) {
                    $("<div/>")
                        .appendTo($(this).parent())
                        .attr("class", "l--product-share-popup")
                        .html(html);

                    self.attachTweetEvent();
                }
            })
            .on("click", ".icon_share", function(e){
                e.preventDefault();
            })
            .on("mouseleave", ".itemdetail__links__item", function(){
                $(".l--product-share-popup").remove();
            });
    };


    /**
     * add event touch
     */
    this.addEventTouch = function()
    {
        var self = this;

        $(document)
            .off('touchstart touchmove touchend', '.relateditem__list')
            .on({
                'touchstart': function(e) {
                    if (self.isMove == false && self.onTouch == false) {
                        self.touchX = event.changedTouches[0].pageX;
                        self.onTouch = true;
                    }
                },
                'touchmove': function(e) {
                    if (self.isMove == false
                    &&  self.onTouch
                    && ((self.touchX - 10) > event.changedTouches[0].pageX || (self.touchX + 10) < event.changedTouches[0].pageX)) {
                        e.preventDefault();
                        self.isFlick = true;
                    }
                    else {
                        self.isFlick = false;
                    }
                },
                'touchend': function(e) {
                    var oya = $(this).parent();

                    if (self.isMove == false && self.onTouch && self.isFlick && $(".l--relateditem-arrow.m--right", oya).is(":visible") && $(".l--relateditem-arrow.m--left", oya)) {
                        var move        = -(self.touchX - event.changedTouches[0].pageX);
                        var selector    = move < 0 ? ".l--relateditem-arrow.m--right" : ".l--relateditem-arrow.m--left";

                        $(selector, oya).trigger("click");
                    }
                    
                    self.onTouch = false;
                    self.isFlick = false;
                }
            }, '.relateditem__list');
    };


    /**
     * check togglebox scroll
     */
    this.checkToggleboxScroll = function()
    {
        var tar = $(".togglebox__text-container");
        var len = tar.length;

        for (var i = 0; i < len; i++) {
            if (tar.eq(i).height() > 250) {
                tar.eq(i).css({
                    height      : "250px",
                    paddingRight: "1em",
                    position    : "relative"
                }).perfectScrollbar();
            }
        }
    };


    /**
     * add event arrow
     */
    this.addEventArrow = function()
    {
        var self = this;

        $(document)
            .on("click", ".l--relateditem-arrow.m--right", function(){
                self.moveItem("right", $(this).parent());
            })
            .on("click", ".l--relateditem-arrow.m--left", function(){
                self.moveItem("left", $(this).parent());
            })
        ;
    }


    /**
     * move item
     */
    this.moveItem = function(_direction, _parent)
    {
        var self            = this;
        var itemSelector    = ".relateditem__list__item";

        if (this.isMove == false) {
            this.isMove = true;

            var item    = $(itemSelector, _parent);
            var len     = item.length;
            var lef     = this.getSlideSize();

            if (_direction == "left") {
                item.eq(len -1).prependTo($(".relateditem__list", _parent)).css({ left: "-" + lef + "px" });
                var moveTo = "+=" + lef + "px";
            }
            else if (_direction == "right") {
                var moveTo = "-=" + lef + "px";
            }

            item.velocity({ left: moveTo }, { complete: function(){
                if (_direction == "right") {
                    item.eq(0).appendTo($(this).parent()).css({
                        left: (len - 1) * lef + "px"
                    });
                }

                self.isMove = false;
            } });
        }
    };


    /**
     * set arrow element
     */
    this.setArrowElement = function()
    {
        $("<div/>")
            .appendTo(".relateditem .l-container")
            .attr("class", "l--relateditem-arrow m--left")
            .html("<i class='icon-chevron-thin-left'></i>")
        ;
        $("<div/>")
            .appendTo(".relateditem .l-container")
            .attr("class", "l--relateditem-arrow m--right")
            .html("<i class='icon-chevron-thin-right'></i>")
        ;
    };


    /**
     * set default position
     */
    this.setDefaultPosition = function()
    {
        var numbers = $(".relateditem__list").length;

        for (var o = 0; o < numbers; o++) {
            var oya     = $(".relateditem__list").eq(o);
            var len     = $(".relateditem__list__item", oya).length;
            var size    = this.getSlideSize(); 

            for (var i = 0; i < len; i++) {
                $(".relateditem__list__item", oya).eq(i).css({
                    left: i * size + "px"
                });
            }
        }
    };


    /**
     * set arrow viewing
     */
    this.setArrowViewing = function()
    {
        var numbers = $(".relateditem__list").length;

        for (var o = 0; o < numbers; o++) {
            var oya = $(".relateditem__list").eq(o);
            var len = $(".relateditem__list__item", oya).length;
            var lmt = this.isMobile() ? 4 : 5;

            if (len <= lmt) {
                $(".l--relateditem-arrow", oya.parent()).hide();
            }
        }
    };


    /**
     * set slide area height
     */
    this.setSlideAreaHeight = function()
    {
        var hhh = this.isMobile() ? (this.getSlideSize() + 20) : 330;

        $(".relateditem__list").css({ height: hhh + "px" });
    };


    /**
     * get slide size
     */
    this.getSlideSize = function()
    {
        return this.isMobile() ? $(".relateditem__list").width() / 4 : 220;
    };


    /**
     * resize exec
     */
    this.resizeExec = function()
    {
        this.setDefaultPosition();
        this.setSlideAreaHeight();
        this.setArrowViewing();
    };
};
decorte.detail.prototype             = Object.create(decorte.core.prototype);
decorte.detail.prototype.constructor = decorte.detail;

