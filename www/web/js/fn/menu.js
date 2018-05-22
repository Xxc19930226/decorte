decorte = window.decorte ? decorte : {};
decorte.menu = function()
{
    "use strict";

    decorte.core.apply(this);


    /**
     * properties
     */
    var cnActive    = "m--active";
    var cnDown      = "icon-chevron-thin-down";
    var cnUp        = "icon-chevron-thin-up";

    var modalSelector           = ".l--global-header-modal";
    var naviSelector            = ".global-header__nav";
    var naviContainerSelector   = naviSelector + "__container";
    var othersSelector          = naviSelector + "__others";
    var itemSelector            = naviSelector + "__list__item";
    var noticeSelector          = naviSelector + "__notice";
    var itemContainerSelector   = itemSelector + "__container";
    var pMenuSelector           = ".l--products-menu";
    var sMenuSelector           = ".l--header-submenu";
    /* bug fix for ios */
    this.enableAbsoluteMobileSearchElements = false;
    this.enableBugfixForIOS                 = false;
    this.heightBeforeKeyboard               = 0;


    /**
     * initialize
     */
    this.init = function()
    {
        this.setDisplayMode();
        this.addEventProductsMenu();
        this.addEventMobileMenuTrigger();
        this.addEventMobileSearchTrigger();
        this.addEventHeaderNavList();
        this.addEventPreviewItem();
        this.addEventResize();
        this.addEventGlobalSearch();
        this.addEventMobileDropdownMenu();
        this.checkDropdownMenuIconClass();
        this.checkActiveClass(true);
        this.setMobileSearchSize();
        this.addEventOtherLines();
        /* bug fix for ios */
        this.setEnableBugfixForIOS();
        this.addEventBugfixForIOS();
    };


    /**
     * set enable bugfix for ios [ * bugfix for ios ]
     */
    this.setEnableBugfixForIOS = function()
    {
        this.enableBugfixForIOS = this.isiOS() ? true : false;
    };


    /**
     * add event bugfix for ios [ * bugfix for ios ]
     */
    this.addEventBugfixForIOS = function()
    {
        var self        = this;
        var selector    = ".global-header-mobile-search";

        $(window).on("scroll", function(){
            if (self.enableBugfixForIOS && self.enableAbsoluteMobileSearchElements) {
                $(selector).css("top", $(window).scrollTop());
            }
        });
    
        $(document)
            .on("touchstart", selector + "__input", function(){
                if (self.enableBugfixForIOS) {
                    self.setStyleMobileSearch("absolute");
                    self.enableAbsoluteMobileSearchElements = true;
                    $(this).focus();
                }
            })
            .on("blur", selector + "__input", function(){
                if (self.enableBugfixForIOS) {
                    self.setStyleMobileSearch("fixed");
                    self.enableAbsoluteMobileSearchElements = false;
                }
            });
    };


    /**
     * set style mobile search [ * bugfix for ios ]
     */
    this.setStyleMobileSearch = function(_position)
    {
        $(".global-header-mobile-search").css({
            position: _position,
            top     : _position == "absolute" ? $(window).scrollTop() : 0 
        });
    };


    /**
     * add event mobile dropdown menu
     */
    this.addEventMobileDropdownMenu = function()
    {
        var self = this;

        $(document).on("click", ".m--dropdown", function(){
            if (! self.isTablet() && self.isMobile()) {
                if (! $(this).parent().hasClass(cnActive)) {
                    self.closeOtherSection($(this).parent().get(0).classList[0], $(this).get(0).classList[0]);

                    $(this).parent().addClass(cnActive);
                    $("i", this).removeClass(cnDown).addClass(cnUp);
                    self._dropdownMenuSlideUpDown($(this).parent(), "slideDown");
                }
                else {
                    $(this).parent().removeClass(cnActive);
                    $("i", this).removeClass(cnUp).addClass(cnDown);
                    self._dropdownMenuSlideUpDown($(this).parent(), "slideUp");
                }
            }
        });
    };


    /**
     * close other section
     */
    this.closeOtherSection = function(_selector, _target)
    {
        var len = $("." + _selector).length;

        for (var i = 0; i < len; i++) {
            var tar = $("." + _selector).eq(i);

            if (tar.hasClass(cnActive)) {
                tar.removeClass(cnActive);
                $("i", "." + _target).removeClass(cnUp).addClass(cnDown);
                this._dropdownMenuSlideUpDown(tar, "slideUp");
            }
        }
    };


    /**
     * private : dropdown menu slide up down
     */
    this._dropdownMenuSlideUpDown = function(_parent, _event)
    {
        $(">.m--dropdown-menu", _parent).velocity(_event, { duration: 500 });
    };


    /**
     * check dropdown menu icon class
     */
    this.checkDropdownMenuIconClass = function()
    {
        if (! this.isTablet() && this.isMobile())
        {
            var len = $(".global-header .m--dropdown").length;

            for (var i = 0; i < len; i++) {
                var dropdown = $(".global-header .m--dropdown").eq(i);

                if (dropdown.parent().hasClass(cnActive)) {
                    $("i", dropdown).removeClass(cnDown).addClass(cnUp);
                }
                else {
                    $("i", dropdown).removeClass(cnUp).addClass(cnDown);
                }
            }
        }
    };


    /**
     * add event global search
     */
    this.addEventGlobalSearch = function()
    {
        var self = this;

        $(document)
            .on("keydown", ".global-header__search__input", function(e){
                if (e.keyCode==13) {
                    location.href = self._getLocationHref($(".global-header__search__input").val());
                }
            })
            .on("click", ".global-header-mobile-search__submit", function(){
                location.href = self._getLocationHref($(".global-header-mobile-search__input").val());
            })
        ;
    };


    /**
     * add event other lines
     */
    this.addEventOtherLines = function()
    {
        var self        = this;
        var selector    = ".l--line-list-others__links";

        $(document)
            .on("mouseenter", ".l--line-list-others__container", function(){
                $(selector).velocity("slideDown", { duration: 750 });
            })
            .on("mouseleave", ".l--line-list-others__container", function(){
                $(selector).velocity("slideUp", { duration: 500 });
            })
            /*
            .on("click", ".l--line-list-others__head", function(){
                var selector = ".l--line-list-others__links";

                if (! $(selector).is(":visible")) {
                    $(selector).velocity("slideDown");
                }
            })
            */
        ;
    };


    /**
     * private : get location href
     */
    this._getLocationHref = function(_keyword)
    {
        return encodeURI("/product/search?keyword=" + _keyword);
    };


    /**
     * add event products menu
     */
    this.addEventProductsMenu = function()
    {
        var self = this;

        $(document)
            .on("mouseenter", ".l--products-category__items__item, .l--products-menu__categories__node", function(){
                if (! self.isMobile() && ! $(this).hasClass(cnActive)) {
                    $("." + $(this).get(0).classList[0], $(this).parent()).removeClass(cnActive);
                    $(this).addClass(cnActive);
                }
            });
    };


    /**
     * add event mobile menu trigger
     */
    this.addEventMobileMenuTrigger = function()
    {
        var self            = this;
        var closeSelector   = naviSelector + "__mobile-menu-close-trigger";

        $(document)
            .on("click", ".global-header__mobile-triggers__node.m--menu", function(){
                $(naviSelector).show();

                self._setMobileMenuWidth(naviContainerSelector);

                $(naviContainerSelector).velocity({ marginLeft: "64px" }, function(){
                    $(closeSelector).show();
                });
            })
            .on("click", naviSelector, function(e){
                if (self.isMobile() && e.target.className == naviSelector.substr(1)) {
                    $(closeSelector).trigger("click");
                }
            })
            .on("click", closeSelector, function(){
                $(this).hide();
                $(naviContainerSelector).velocity({ marginLeft: "100%" }, function(){
                    $(naviSelector).hide();
                });
            });
    };


    /**
     * set mobile menu width
     */
    this._setMobileMenuWidth = function(_selector)
    {
        if (this.isMobile()) {
            $(_selector).css({ width: ($(window).width() - 64) });
        }
    };


    /**
     * set mobile search size
     */
    this.setMobileSearchSize = function()
    {
        if (this.isMobile()) {
            var selector    = ".global-header-mobile-search";
            var fix         = $(selector + "__container").width() * 0.54;

            $(selector + "__input").css("width", Math.floor(fix));
        }
    };


    /**
     * add event mobile search trigger
     */
    this.addEventMobileSearchTrigger = function()
    {
        var selector = ".global-header-mobile-search";

        $(document)
            .on("click", ".global-header__mobile-triggers__node.m--search", function(){
                $(selector).velocity({ top: "0px" });
            })
            .on("click", ".global-header-mobile-search__close", function(){
                $(selector).velocity({ top: "-50px" });
            });
    };


    /**
     * add event header nav list
     */
    this.addEventHeaderNavList = function()
    {
        var self = this;

        $(document)
            .on("mouseenter", itemSelector, function(){
                if (! self.isMobile() && ! $(this).hasClass(cnActive)) {
                    $(itemSelector).removeClass(cnActive);
                    $(this).addClass(cnActive);

                    if ($(itemContainerSelector, this).hasClass("m--dropdown")) {
                        if ($(modalSelector).size() == 0) {
                            $("<div/>").appendTo("body").attr("class", modalSelector.substr(1));
                        }
                    }
                    if ($(pMenuSelector, this).size() > 0 && $(pMenuSelector + " " + othersSelector).size() == 0) {
                        $(naviContainerSelector + ">" + othersSelector).clone().appendTo(pMenuSelector).show();
                        $(naviContainerSelector + ">" + noticeSelector).clone().appendTo(pMenuSelector).show();
                    }
                    if ($(sMenuSelector, this).size() > 0 && $(sMenuSelector + " " + othersSelector).size() == 0) {
                        $(naviContainerSelector + ">" + othersSelector).clone().appendTo(sMenuSelector).show();
                        $(naviContainerSelector + ">" + noticeSelector).clone().appendTo(sMenuSelector).show();
                    }
                }
            })
            .on("mouseleave", itemSelector, function(e){
                if (! self.isMobile() && $(this).hasClass(cnActive)) {
                    $(this).removeClass(cnActive);
                    $(pMenuSelector + " " + othersSelector + ", " + sMenuSelector + " " + othersSelector).remove();
                    $(pMenuSelector + " " + noticeSelector + ", " + sMenuSelector + " " + noticeSelector).remove();
                    $(modalSelector).remove();
                }
            })
            .on("touchstart", modalSelector, function(){
                $(itemSelector + "." + cnActive).trigger("mouseleave");
            });
    };


    /**
     * add event preview item 
     */
    this.addEventPreviewItem = function()
    {
        var self = this;

        $(document)
            .on("mouseenter", ".l--products-category__items__item__head", function(){
                if (! self.isMobile() && ! $(this).hasClass(cnActive) && $(this).attr("data-name")) {
                    $(".l--products-category__items__item__head").removeClass(cnActive);
                    $(this).addClass(cnActive);
                    $(".l--products-category__preview img").attr("src", "/images/header/category/" + $(this).attr("data-name") + ".png");
                }
            });
    };


    /**
     * resize exec
     */
    this.resizeExec = function()
    {
        this.resetHeaderNavStyle();
        this.checkActiveClass();
        this._setMobileMenuWidth(naviContainerSelector);
        this.checkDropdownMenuIconClass();
        this.setDisplayMode();
        this.setMobileSearchSize();
    };


    /**
     * check active class
     */
    this.checkActiveClass = function(_isInit)
    {
        if ((_isInit || this.displayMode == false) && this.isMobile() == false) {
            /* desktop */
            $(".m--active", ".global-header").removeClass(cnActive);
            $(".l--products-menu__categories__node:nth-child(1), .l--products-menu__categories__node:nth-child(1) .l--products-menu__categories__node__contents, .l--products-category__items__item:nth-child(1)").addClass(cnActive);
        }
        else if (this.displayMode == true && this.isMobile() == true) {
            /* mobile */
            $(".m--active", ".global-header").removeClass(cnActive);
            $("i", ".m--dropdown").removeClass(cnDown + " " + cnUp).addClass(cnDown);
        }
    };


    /**
     * reset header nav style
     */
    this.resetHeaderNavStyle = function()
    {
        var triggerSelector         = naviSelector + "__mobile-menu-close-trigger";
        var dropDownMenuSelector    = ".global-header .m--dropdown-men";

        if (this.displayMode == false && this.isMobile() == false) {
            /* desktop */
            $(naviSelector).css({ display: "block" });
            $(naviContainerSelector).css({ width: "auto", marginLeft: "0px" });
            $(triggerSelector).css({ display: "none" });
            $(dropDownMenuSelector).removeAttr('style');
        }
        else if (this.displayMode == true && this.isMobile() == true) {
            /* mobile */
            $(naviSelector).css({ display: "none" });
            $(naviContainerSelector).css({ marginLeft: "100%" });
            $(triggerSelector).css({ display: "block" });
            $(pMenuSelector + " " + othersSelector + ", " + sMenuSelector + " " + othersSelector).remove();
            $(pMenuSelector + " " + noticeSelector + ", " + sMenuSelector + " " + noticeSelector).remove();
            $(modalSelector).remove();
            $(dropDownMenuSelector).removeAttr('style');
        }
    };
};
decorte.menu.prototype             = Object.create(decorte.core.prototype);
decorte.menu.prototype.constructor = decorte.menu;

