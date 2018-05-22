decorte = window.decorte ? decorte : {};
decorte.line = function()
{
    "use strict";

    decorte.core.apply(this);


    /**
     * initialize
     */
    this.init = function()
    {
        this.setFixedSubmenu();
        this.addEventResize();
        this.addEventOpenerAbsolutequality();
        this.addEventChangeCategoryItem();
        this.addEventSelectDefaultCategory();
    };


    /**
     * add event select default category
     */
    this.addEventSelectDefaultCategory = function()
    {
        var self            = this;
        var category        = this.getUrlParameter("category", window.location.search.substring(1));
        var itemSelector    = ".product__category__list .product__category__item";
        var targetSelector  = itemSelector + "[data-type='" + category + "']";

        if (category && $(targetSelector).size() > 0) {
            this.executeDynamicSelectCategory($(targetSelector));
            $("html,body").animate({ scrollTop: $(".product.l--fixed-submenu-anchor").offset().top + "px" });
        }
        else {
            if (window._dispItemList) {
                $("#dispItemList").load(_dispItemList);
            }
        }
    };


    /**
     * execute dynamic select category
     */
    this.executeDynamicSelectCategory = function(_obj)
    {
        var itemSelector    = ".product__category__list .product__category__item";
        var triggerSelector = ".product__triggers";
        var selectSelector  = ".product__category__select";
        var type            = _obj.attr("data-type");
        var url             = $(triggerSelector).attr("data-url");

        $("#dispItemList").load(url + type + '/list');

        $(itemSelector).removeClass("m--active");
        _obj.addClass("m--active");

        $(selectSelector, triggerSelector).val(type);
    };


    /**
     * add event change category item
     */
    this.addEventChangeCategoryItem = function()
    {
        var self            = this;
        var itemSelector    = ".product__category__list .product__category__item";
        var selectSelector  = ".product__category__select";

        $(document)
            .on("click", itemSelector, function(){
                if (! $(this).hasClass("m--active")) {
                    self.executeDynamicSelectCategory($(this));
                }
            })
            .on("change", selectSelector, function(){
                $(itemSelector + "[data-type='" + $(this).val() + "']").trigger("click");
            });
    };


    /**
     * add event opener absolutequality
     */
    this.addEventOpenerAbsolutequality = function()
    {
        var selector = ".line.absolutequality";

        $(document).on("click", ".lineindex .opener", function(){
            var isVisible   = $(selector).is(":visible");
            var evt         = isVisible ? "slideUp" : "slideDown";

            $(selector).velocity(evt, { duration: 500 });
            isVisible ? $(this).removeClass("m--active") : $(this).addClass("m--active");
        });
    };


    /**
     * set fixed submenu
     */
    this.setFixedSubmenu = function()
    {
        if ($(".l--fixed-submenu-anchor").size() > 0) {
            this.setElementsFixedSubmenuTrigger();
            this.setElementsFixedSubmenu();
            this.addEventMoveFixedSubmenu();
            this.addEventScrollFixedSubmenu();
            this.fixedPositionFixedSubmenu();
        }
    };


    /**
     * set elements fixed submenu
     */
    this.setElementsFixedSubmenu = function()
    {
        var len     = $(".l--fixed-submenu-anchor").length;
        var html    = "<div class='l--fixed-submenu'><div class='l--fixed-submenu__container'>";
            html   += "<div class='l--fixed-submenu__head'><div class='l--fixed-submenu__head__container'>LINE MENU</div></div>";
        var name    = "";
        var dots    = "";

        for (var i = 0; i < len; i++) {
            name += "<div class='l--fixed-submenu__names__name'>" + $(".l--fixed-submenu-anchor").eq(i).attr("data-name") + "</div>";
            dots += i == 0 ? "<div class='l--fixed-submenu__dots__dot m--active'>" : "<div class='l--fixed-submenu__dots__dot'>";
            dots += "<img src='/images/parts/dot-w.png' alt='白ドット画像の代替テキスト' class='m--white' />";
            dots += "<img src='/images/parts/dot-b.png' alt='黒ドット画像の代替テキスト' class='m--black' />";
            dots += "</div>";
        }
        html += "<div class='l--fixed-submenu__names'>" + name + "</div>";
        html += "<div class='l--fixed-submenu__dots'>" + dots + "</div>";
        html += "</div>";
        html += "<div class='l--fixed-submenu__close'><img alt='閉じる画像の代替テキスト' src='/images/parts/close_linemenu.png'></div>";
        html += "</div>";

        $(html).appendTo(".global-header__container");
    };


    /**
     * set elements fixed submenu trigger
     */
    this.setElementsFixedSubmenuTrigger = function()
    {
        var html = "<div class='l--fixed-submenu-trigger'><div class='l--fixed-submenu-trigger__container'>";
            html+= "<span class='l--fixed-submenu-trigger__text'>LINE</span><br><span>MENU</span>";
            html+= "</div></div>";

        $(html).appendTo(".global-header__container");
    };


    /**
     * add event move fixed submenu
     */
    this.addEventMoveFixedSubmenu = function()
    {
        var self                = this;
        var submenuSelector     = ".l--fixed-submenu";
        var dotSelector         = submenuSelector + "__dots__dot";
        var namesSelector       = submenuSelector + "__names";
        var closeSelector       = submenuSelector + "__close";
        var containerSelector   = submenuSelector + "__container";

        $(document)
            .on("click", dotSelector + ", " + namesSelector + "__name", function(){
                var pos = $(submenuSelector + "-anchor").eq($(this).index()).offset();
                var to  = pos.top < 10 ? 0 : pos.top - 50;

                $("html").velocity("scroll", { duration: 1200, easing: "ease", offset: to });

                if (self.isMobile()) {
                    $(closeSelector).trigger("click");
                }
            })
            .on("click", ".l--fixed-submenu-trigger", function(){
                $(submenuSelector).show().find(containerSelector).velocity({ left: "0px" }, function(){
                    $(closeSelector).show();
                });
            })
            .on("click", submenuSelector, function(e){
                if (self.isMobile() && e.target.className == submenuSelector.substr(1)) {
                    $(closeSelector).trigger("click");
                }
            })
            .on("click", closeSelector, function(){
                $(this).hide();
                $(containerSelector).velocity({ left: "-100%" }, function(){
                    $(submenuSelector).hide();
                });
            })
            .on("mouseenter", dotSelector, function(){
                if (! self.isMobile() && ! $(namesSelector).is(":visible")) {
                    $(namesSelector).velocity("fadeIn", { duration: 500 });
                }
            })
            .on("mouseleave", submenuSelector, function(e){
                if (! self.isMobile()) {
                    $(namesSelector).velocity("fadeOut", { duration: 500 });
                }
            });
    };


    /**
     * fixed position fixed submenu
     */
    this.fixedPositionFixedSubmenu = function()
    {
        if (! this.isMobile() && $(".l--fixed-submenu__dots").size() > 0)
        {
            var margin = $(".l--fixed-submenu__dots").get(0).clientHeight / 2;

            $(".l--fixed-submenu").css("margin-top", "-" + margin + "px");
        }
    };


    /**
     * add event scroll fixed submenu
     */
    this.addEventScrollFixedSubmenu = function()
    {
        var timer   = false;
        var anchor  = ".l--fixed-submenu-anchor";
        var node    = ".l--fixed-submenu__dots__dot";

        $(window).scroll(function(e){
            if (timer !== false) {
                clearTimeout(timer);
            }
            timer = setTimeout(function(){
                var len     = $(anchor).length;
                var scroll  = $(window).scrollTop();

                for (var i = 0; i < len; i++) {
                    var start = $(anchor).eq(i).offset().top - 51;
                    var end   = $(anchor).eq(i + 1).size() > 0 ? $(anchor).eq(i + 1).offset().top - 51 : $(document).height();

                    if ( scroll >= start && scroll < end ) {
                        $(node).removeClass("m--active");
                        $(node).eq(i).addClass("m--active");
                        break;
                    }
                }
            }, 200);
        });
    };


    /**
     * resize exec
     */
    this.resizeExec = function()
    {
        var menuSelector = ".l--fixed-submenu";

        if (this.isMobile()) {
            $(menuSelector).hide().css({
                marginTop   : 0,
                top         : 0
            });
            $(menuSelector + "__names").css({
                display: "block",
                opacity: 1
            });
        }
        else {
            $(menuSelector).show().css({ top: "50%" });
            $(menuSelector + "__container").css({ left: "auto" });
            $(menuSelector + "__close").hide();
            this.fixedPositionFixedSubmenu();
        }
    };
};
decorte.line.prototype             = Object.create(decorte.core.prototype);
decorte.line.prototype.constructor = decorte.line;

