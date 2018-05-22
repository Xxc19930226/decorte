decorte = window.decorte ? decorte : {};
decorte.home = function()
{
    "use strict";

    decorte.core.apply(this);


    /**
     * properties
     */
    var CurrentSlideStartNumber = 0;
    var SlideMoving             = false;

    this.blockSize              = 0;
    this.blockPositions         = [];
    this.currentLineCategory    = "default";


    /**
     * initialize
     */
    this.init = function()
    {
        this.addEventFooterPreview();
        this.addEventResize();
        this.refresh();
        this.attachLineSwitchEvent();
        this.disablePosterModeTablet();
    };


    /**
     * disable poster mode tablet
     */
    this.disablePosterModeTablet = function()
    {
        if (this.isTablet()) {
            $(".l--poster .image-base").hide();
        }
    };


    /**
     * add event footer preview
     */
    this.addEventFooterPreview = function()
    {
        var footerImages = [
            "recipe_de_decorte.jpg",
            "best_cosme.jpg",
            "liposome.jpg",
            "maison_des_fleurs.jpg"
        ];
        
        $(document).on("mouseenter", ".andmore__list__item", function(){
            $(".andmore__preview__container").html("<img src='/images/home/footer/" + footerImages[$(this).index()] + "' alt='リンク先プレビュー画像の代替テキスト' />");
        });
    };


    /**
     * attach line switch event
     */
    this.attachLineSwitchEvent = function()
    {
        var self = this;

        $(document)
            .on("click", ".line__menu__trigger", function() {
                var type = $(this).attr("data-category");

                $(".line__menu__trigger").removeClass("m--active");
                $(this).addClass("m--active");

                $(".line__menu__select").val(type);

                if (self.currentLineCategory == "default")
                {
                    self.clearElementsOfSlideButton();
                    self.setBlockPositions();
                }
                
                self.currentLineCategory = type;
                self.drawingOnlyTarget();
                self.setContainerSize();
                
                if ($(".line__display").is(":visible")) {
                    $(".line__display").velocity('slideUp', { duration: 500 });
                }
            })
            .on("change", ".line__menu__select", function(){
                var name = $(this).val();

                $(".line__menu__trigger[data-category='" + name + "']").trigger("click");
            })
        ;
    };


    /**
     * refresh
     */
    this.refresh = function()
    {
        this.setBlockSize();
        this.setContainerSize();

        if (this.currentLineCategory == "default" && this.isMobile() == false)
        {
            this.setDefaultBlockPositions();
            this.setDefaultSlideButton();
        }
        else
        {
            this.clearElementsOfSlideButton();
            this.setBlockPositions();
            this.drawingOnlyTarget();
        }
    };


    /**
     * set block size
     */
    this.setBlockSize = function()
    {
        if (this.isMobile()) {
            var kahen = $(window).width() - 96;

            this.blockSize = kahen / 2;
        }
        else {
            var kahen = $(window).width() - 160;
                kahen = kahen > 1072 ? 1072 : kahen;

            this.blockSize = kahen / 4;
        }
    };


    /**
     * set container size
     */
    this.setContainerSize = function()
    {
        var sel = ".l--product-block.m--" + this.currentLineCategory;
        var row = Math.ceil($(sel).length / (this.isMobile() ? 2 : 4));

        if (this.currentLineCategory == "default" && this.isMobile() == false)
        {
            row = 1;
        }

        $(".line__contents__container")
            .css("height", ((this.blockSize + 32 + 50) * row) + "px")
        ;
    };


    /**
     * set block positions
     */
    this.setBlockPositions = function()
    {
        var breaker = this.isMobile() ? [1,3,5,7,9,11,13,15,17,19] : [3,7,11,15,19];
        var left    = 32;
        var top     = 0;

        for (var i = 0; i < 20; i++) {
            this.blockPositions[i] = {
                left: left,
                top : top
            };

            if ($.inArray(i, breaker) >= 0) {
                var row = $.inArray(i, breaker) + 1;

                left    = 32;
                top     = (this.blockSize + 32 + 50) * row;
            }
            else {
                left    = left + this.blockSize + 32;
            }
        }
    };


    /**
     * set default block positions
     */
    this.setDefaultBlockPositions = function()
    {
        var left        = 32;
        var selector    = ".l--product-block.m--" + this.currentLineCategory;
        var targets     = this.getNumbersOfTarget(CurrentSlideStartNumber, 4);
        var len         = targets.length;

        $(".l--product-block")
            .css({
                height  : this.blockSize + "px",
                top     : 0,
                width   : this.blockSize + "px"
            })
            .hide()
        ;

        for (var i = 0; i < len; i++)
        {
            $(selector)
                .eq(targets[i])
                .velocity({
                    left    : left,
                    opacity : 1
                }, {
                    duration: 500,
                    display : 'block'
                })
            ;

            left = left + this.blockSize + 32;
        }
    };


    /**
     * set default slide button
     */
    this.setDefaultSlideButton = function()
    {
        var self    = this;
        var len     = $(".l--product-block.m--" + this.currentLineCategory).length;

        if (len > 4)
        {
            this.addElementsOfSlideButton();
            this.addStyleOfSlideButton();

            $(document)
                .off("click", ".line__contents__arrow.m--left")
                .on("click", ".line__contents__arrow.m--left", function(){
                    if (SlideMoving == false)
                    {
                        SlideMoving = true;
                        self.eventSlideButton("left");
                    }
                })
                .off("click", ".line__contents__arrow.m--right")
                .on("click", ".line__contents__arrow.m--right", function(){
                    if (SlideMoving == false)
                    {
                        SlideMoving = true;
                        self.eventSlideButton("right");
                    }
                })
            ;
        }
    };


    /**
     * eventSlideButton
     */
    this.eventSlideButton = function(_direction)
    {
        var prefix      = _direction == "left" ? "+=" : "-=";
        var baseNumber  = _direction == "left" ? this.getNextSildeNumber(_direction) : CurrentSlideStartNumber;
        var targets     = this.getNumbersOfTarget(baseNumber, 5);
        var len         = targets.length;
        var last        = len - 1;
        var selector    = ".l--product-block.m--" + this.currentLineCategory;

        this.setPrePositionOfNextSlide(_direction, this.getNextSildeNumber(_direction));
        this.updateCurrentSlideStartNumber(_direction);

        for (var i = 0; i < len; i++)
        {
            var param1 = { left: prefix + (32 + this.blockSize) + "px" };
            var param2 = { duration: 500 };

            if ((_direction == "left" && i == 0) || (_direction == "right" && i == last))
            {
                param1.opacity = 1;
                param2.display = "block";
            }
            else if ((_direction == "left" && i == last) || (_direction == "right" && i == 0))
            {
                param1.opacity = 0;
                param2.display = "none";
            }

            if (i == last)
            {
                param2.complete = function()
                {
                    SlideMoving = false;
                }
            }

            $(selector)
                .eq(targets[i])
                .velocity(param1, param2)
            ;
        }
    };


    /**
     * get numbers of target
     */
    this.getNumbersOfTarget = function(_baseNumber, _amount)
    {
        var len     = $(".l--product-block.m--" + this.currentLineCategory).length;
        var targets = [];

        for (var i = _baseNumber; i < len; i++)
        {
            targets.push(i);

            if (targets.length >= _amount)
                break;
        }

        if (targets.length < _amount)
        {
            var wrap = 4 - ((len - 1) - _baseNumber) - 1;
            var wlen = _amount - targets.length;

            for (var j = 0; j < wlen; j++)
            {
                targets.push(j);
            }
        }

        return targets;
    };


    /**
     * set pre position of next slide
     */
    this.setPrePositionOfNextSlide = function(_direction, _slideNumber)
    {
        var style = {};

        if (_direction == "left")
        {
            style.left = -this.blockSize;
        }
        else if (_direction == "right")
        {
            style.left = 160 + (this.blockSize * 4);
        }

        $(".l--product-block.m--" + this.currentLineCategory)
            .eq(_slideNumber)
            .css(style)
        ;
    };


    /**
     * update current slide start number
     */
    this.updateCurrentSlideStartNumber = function(_direction)
    {
        if (_direction == "left")
        {
            if (CurrentSlideStartNumber > 0)
            {
                CurrentSlideStartNumber -= 1;
            }
            else
            {
                CurrentSlideStartNumber = $(".l--product-block.m--" + this.currentLineCategory).length - 1;
            }
        }
        else if (_direction == "right")
        {
            if (CurrentSlideStartNumber < ($(".l--product-block.m--" + this.currentLineCategory).length - 1))
            {
                CurrentSlideStartNumber += 1;
            }
            else
            {
                CurrentSlideStartNumber = 0;
            }
        }
    };


    /**
     * get next slide number
     */
    this.getNextSildeNumber = function(_direction)
    {
        var len = $(".l--product-block.m--" + this.currentLineCategory).length;

        if (_direction == "left")
        {
            if (CurrentSlideStartNumber > 0)
            {
                return CurrentSlideStartNumber - 1;
            }
            else
            {
                return len - 1;
            }
        }
        else if (_direction == "right")
        {
            var right = CurrentSlideStartNumber + 3;

            if (right < (len - 1))
            {
                return right + 1;
            }
            else
            {
                return 4 - ((len - 1) - CurrentSlideStartNumber) - 1;
            }
        }

        return false;
    };


    /**
     * add style of slide button
     */
    this.addStyleOfSlideButton = function()
    {
        var left    = $(".line__contents__container").offset().left;
        var right   = left + 160 + (this.blockSize * 4) - 32;

        if ($(".line__contents__arrow.m--left").size() > 0)
        {
            $(".line__contents__arrow.m--left")
                .css({
                    height  : this.blockSize,
                    left    : left
                })
            ;
        }

        if ($(".line__contents__arrow.m--right").size() > 0)
        {
            $(".line__contents__arrow.m--right")
                .css({
                    height  : this.blockSize,
                    left    : right
                })
            ;
        }
    };


    /**
     * clear elements of slide button
     */
    this.clearElementsOfSlideButton = function()
    {
        $(".line__contents__arrow").remove();
    };


    /**
     * add elements of slide button
     */
    this.addElementsOfSlideButton = function()
    {
        if ($(".line__contents__arrow.m--left").size() == 0)
        {
            $("<div/>")
                .appendTo(".line__contents")
                .attr("class", "line__contents__arrow m--left")
            ;
        }

        if ($(".line__contents__arrow.m--right").size() == 0)
        {
            $("<div/>")
                .appendTo(".line__contents")
                .attr("class", "line__contents__arrow m--right")
            ;
        }
    };


    /**
     * drawing only target
     */
    this.drawingOnlyTarget = function()
    {
        var sel = ".l--product-block.m--" + this.currentLineCategory;
        var len = $(sel).length;

        $(".l--product-block").not(sel).hide();

        for (var i = 0; i < len; i++) {
            var param   = this.blockPositions[i];
            var param2  = { duration: 500 };

            if (! $(sel).eq(i).is(":visible"))
            {
                param.opacity = 1;
                param2.display = "block";
            }

            $(sel)
                .eq(i)
                .css({
                    height  : this.blockSize + "px",
                    width   : this.blockSize + "px"
                })
                .velocity(param, param2)
            ;
        }
    };


    /**
     * resize exec
     */
    this.resizeExec = function()
    {
        this.refresh();
    };
};
decorte.home.prototype             = Object.create(decorte.core.prototype);
decorte.home.prototype.constructor = decorte.home;

