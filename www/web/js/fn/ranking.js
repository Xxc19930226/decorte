decorte = window.decorte ? decorte : {};
decorte.ranking = function()
{
    "use strict";

    decorte.core.apply(this);


    /**
     * properties
     */
    this.isFlick            = false;
    this.onTouch            = false;
    this.rankingTimer       = 0;
    this.rankingAutoPlay    = true;


    /**
     * initialize
     */
    this.init = function()
    {
        this.addEventRankingSlider();
        this.setRankingTimer();
        this.setAnchorLinkATagEvent();
        this.defaultAnchorPosition();
    };


    /**
     * set ranking timer
     */
    this.setRankingTimer = function()
    {
        clearInterval(this.rankingTimer);

        var navItemSelector    = ".ranking__nav__item";
        var navCurrentSelector = navItemSelector + ".m--current";
        var catItemSelector    = ".ranking__category__item";
        var catCurrentSelector = catItemSelector + ".m--current";

        this.rankingTimer = setInterval(function(){
            if ($(navCurrentSelector).next().size() > 0) {
                $(navItemSelector).eq($(navCurrentSelector).index() + 1).trigger("click");
            }
            else {
                if ($(catCurrentSelector).next().size() > 0) {
                    $(catItemSelector).eq($(catCurrentSelector).index() + 1).find("a").trigger("click");
                }
                else {
                    $(catItemSelector).eq(0).find("a").trigger("click");
                }
            }
        }, 5000);
    };

    /**
     * add event ranking slider
     */
    this.addEventRankingSlider = function()
    {
        var self = this;

        $(document)
            .on("click", ".ranking__nav .ranking__nav__item", function(e){
                if (e.originalEvent) {
                    self.rankingAutoPlay = false;
                    clearInterval(self.rankingTimer);
                }

                self.rankingSlideMoveNext($(this).index());

                if (this.rankingAutoPlay) {
                    self.setRankingTimer();
                }
            })
            .on("click", ".ranking__category__item", function(e){
                if (e.originalEvent) {
                    self.rankingAutoPlay = false;
                    clearInterval(self.rankingTimer);
                }
            })
            .on("change", ".ranking__menu__select", function(){
                $(".ranking__category__item[data-type='" + $(this).val() + "']").find("a").trigger("click");
            });

        this.addEventTouch();
    };


    /**
     * ranking slide move next
     */
    this.rankingSlideMoveNext = function(next)
    {
        var cnCurrent       = "m--current";
        var itemSelector    = ".ranking__nav .ranking__nav__item";
        var current         = $(itemSelector + ".m--current").index();
        var target          = $(".ranking__list__item");

        if (! (current == 0 && next == 2) && ( current < next || (current == 2 && next == 0) )) {
            var preLeft = "100%";
            var dirLeft = "-100%";
        }
        else {
            var preLeft = "-100%";
            var dirLeft = "100%";
        }

        target.eq(next).css({ left: preLeft });
        target.eq(current).velocity({ left: dirLeft });
        target.eq(next).velocity({ left: "0%" }, function(){
            $(itemSelector).removeClass(cnCurrent).eq(next).addClass(cnCurrent);
        });
    };


    /**
     * add event touch
     */
    this.addEventTouch = function()
    {
        var self = this;

        $(document)
            .off('touchstart touchmove touchend', '.ranking__item__container .ranking__list')
            .on({
                'touchstart': function(e) { self.touchStart(); },
                'touchmove' : function(e) { self.touchMove(e); },
                'touchend'  : function(e) { self.touchEnd(); }
            }, '.ranking__item__container .ranking__list');
    };


    /**
     * touch start
     */
    this.touchStart = function()
    {
        if (this.onTouch == false) {
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

        if (this.onTouch && ((this.touchX - 10) > moveX || (this.touchX + 10) < moveX)) {
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
        if (this.onTouch && this.isFlick) {
            this.rankingAutoPlay = false;
            clearInterval(this.rankingTimer);

            var move            = -(this.touchX - event.changedTouches[0].pageX);
            var itemSelector    = ".ranking__nav .ranking__nav__item";
            var current         = $(itemSelector + ".m--current").index();

            if (move < 0) {
                var next = current == 2 ? 0 : current + 1;
            }
            else {
                var next = current == 0 ? 2 : current - 1;
            }

            $(itemSelector).eq(next).trigger("click");
        }

        this.onTouch = false;
        this.isFlick = false;
    };


    /**
     * set anchor link a tag event
     */
    this.setAnchorLinkATagEvent = function()
    {
        var self = this;

        $(document)
            .off("click", "a")
            .on(" click", "a", function(e){
                var param = $(this).attr("href").split('?')[1];

                if (param) {
                    var area    = 'ranking';
                    var anchor  = self.getUrlParameter(area, param);

                    if (anchor && $("#" + area).size() > 0) {
                        e.preventDefault();

		                $('body,html').animate({
			                scrollTop: ($("#" + area).offset().top - 50)
		                }, 500, 'swing');

        		        self.setRankingType(anchor);
                    }
                }
            });
    };


    /**
     * default anchor position
     */
    this.defaultAnchorPosition = function()
    {
        var self    = this;
        var anchor  = this.getUrlParameter('ranking', window.location.search.substring(1));

        if (anchor) {
            setTimeout(function(){
		        $('body,html').animate({
			        scrollTop: ($("#ranking").offset().top - 50)
		        }, 500, 'swing');
		        self.setRankingType(anchor);
            }, 1000);
        }
    };


    /**
     * set ranking type
     */
    this.setRankingType = function(_type)
    {
        var types = { 'skincare': 0, 'basemake': 1, 'pointmake': 2 };

        $(".ranking__category__item").eq(types[_type]).find("a").trigger("click");
    };
};
decorte.ranking.prototype             = Object.create(decorte.core.prototype);
decorte.ranking.prototype.constructor = decorte.ranking;
