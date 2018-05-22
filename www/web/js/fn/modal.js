decorte = window.decorte ? decorte : {};
decorte.modal = function()
{
    "use strict";

    decorte.core.apply(this);
    decorte.fn.togglebox.apply(this);


    /**
     * local properties
     */
    var cnActive    = "m--active";
    var iconUp      = "icon-chevron-thin-up";
    var iconDown    = "icon-chevron-thin-down";
    var iconClose   = "icon-cross";


    /**
     * initialize
     */
    this.init = function()
    {
        this.addEventResize();
        this.addEventModalWindow();
    };


    /**
     * add event modal window
     */
    this.addEventModalWindow = function()
    {
        var self = this;
        var selectorActiveWindow    = '.l--modal-clone.m--modal-active-window';
        var selectorTogglebox       = selectorActiveWindow + ' .l-togglebox';
        var selectorToggleboxTitle  = selectorTogglebox + ' .togglebox__title';
        var selectorClose           = ".l--modal-window__close, .l--modal-clone .news__detail__body__close";
        var selectorContainer       = ".togglebox__text-container";

        $(document)
            .on("click", ".l--modal-trigger", function(){
                var tar = $(this).attr("data-target");

                self._setModalElements($(this).attr("data-mode"));
                self._setCloneElements(tar, $(this).attr("data-pc-fix-width"));
                self._setPositionClone();
                $(selectorTogglebox + " " + selectorContainer).perfectScrollbar();
            })
            .on("click", selectorClose, function(){
                self._close();
            })
            .on('click', selectorTogglebox, function(){
                if (self.isMobile()) {
                    self.toggleBoxEvent($('.togglebox__title',this).get(0));
                }
                else if (self.isTablet()) {
                    var box = $('.togglebox', this);

                    if ($('.togglebox__popup', box).size() > 0) {
                        $('.togglebox__popup', box).remove();
                        $("i", box).removeClass(iconClose).addClass(iconDown);
                    }
                    else {
                        self.appendElementsToggleboxPopup(box);
                        self.addStyleToggleboxPopup(box);

                        $("i", box).removeClass(iconDown).addClass(iconClose);
                    }
                }
            })
            .on('mouseenter', selectorToggleboxTitle, function(){
                if (false == self.isMobile() && false == self.isTablet()) {
                    var box = $(this).parent();

                    self.appendElementsToggleboxPopup(box);
                    self.addStyleToggleboxPopup(box);

                    $("i", box).removeClass(iconDown).addClass(iconUp);
                }
            })
            .on('mouseleave', selectorTogglebox, function(){
                if (false == self.isMobile()) {
                    $('.togglebox__popup', $(this)).remove();
                    $("i", $(this)).removeClass(iconUp).addClass(iconDown);
                }
            })
        ;

        self.checkToggleboxScroll();
    };


    /**
     * add style togglebox popup
     */
    this.addStyleToggleboxPopup = function(_togglebox)
    {
        $('.togglebox__popup .togglebox__text-container', _togglebox)
            .css({
                maxHeight   : ($('.l--modal-clone.m--modal-active-window').height() / 2),
                overflow    : 'auto'
            })
        ;
    };


    /**
     * append elements togglebox popup
     */
    this.appendElementsToggleboxPopup = function(_togglebox)
    {
        var selectorContainer = ".togglebox__text-container";

        if ($('.togglebox__popup', _togglebox).size() == 0) {
            $("<div/>")
                .appendTo(_togglebox)
                .attr('class', 'togglebox__popup')
                .html("<div class='" + selectorContainer.substr(1) + "'>" + $(selectorContainer, _togglebox).html() + "</div>")
            ;
        }
    };


    /**
     * check togglebox scroll
     */
    this.checkToggleboxScroll = function()
    {
        var tar                 = $(".news__detail");
        var len                 = tar.length;
        var selectorContainer   = ".togglebox__text-container";

        for (var i = 0; i < len; i++) {
            $("<div/>")
                .appendTo("body")
                .attr("class", "temporary-element")
                .css({
                    left    : "-200%",
                    position: "fixed",
                    top     : "-200%"
                })
                .html(tar.eq(i).clone())
                .find(".news__detail").show()
            ;

            if ($(selectorContainer, ".temporary-element").height() > 250) {
                $(selectorContainer, tar.eq(i)).css({
                    height      : "250px",
                    position    : "relative"
                });
            }
            else {
                $(selectorContainer, tar.eq(i)).css({ height: "auto" });
            }

            $(".temporary-element").remove();
        }
    };


    /**
     * private : close
     */
    this._close = function()
    {
        $(".l--modal-clone, .l--modal-wall").remove();
    };


    /**
     * private : set modal elements
     */
    this._setModalElements = function(_option)
    {
        var selector    = ".l--modal-wall";
        var self        = this;

        $("<div/>")
            .appendTo("body")
            .attr("class", selector.substr(1))
            .on("click", function(e){
                if (e.target.classList[0] == selector.substr(1)) {
                    self._close();
                }
            });

        if (_option) {
            $(selector).addClass("m--mode-" + _option);
        }
    };


    /**
     * private : set clone elements
     */
    this._setCloneElements = function(_target, _isFixed)
    {
        var selector = ".l--modal-clone";

        $("<div/>")
            .appendTo("body")
            .attr("class", selector.substr(1))
            .html($("." + _target).clone().css({ height: "auto", width: "auto" }).show());

        this._setWidthModalWindow(selector, _isFixed);
        this._setHeightModalWindow(selector);
    };


    /**
     * private : set position clone
     */
    this._setPositionClone = function()
    {
        var selector = ".l--modal-clone";

        this._setPositionModalWindow(selector);

        $(selector)
            .addClass("m--modal-active-window")
            .append("<div class='l--modal-window__close'></div>")
            .velocity('fadeIn', { duration: 800 })
        ;
    };


    /**
     * private : set position modal window
     */
    this._setPositionModalWindow = function(_target)
    {
        var wh  = $(window).height();
        var ww  = $(window).width();
        var h   = this._setHeightModalWindow(_target);
        var w   = this._setWidthModalWindow(_target);

        $(_target)
            .css({
                left        : (ww - w) / 2,
                maxHeight   : wh - ((wh - h) / 2 + 8),
                top         : (wh - h) / 2
            })
        ;
    };


    /**
     * private : set width modal window
     */
    this._setWidthModalWindow = function(_target, _isFixed)
    {
        var defWdt = $(_target).width();

        if (! this.isMobile() && _isFixed) {
            $(_target).css("width", _isFixed + "px");
            defWdt = _isFixed;
        }
        else {
            var maxWdt = this.isMobile() ? $(window).width() - 32 : $(window).width() - 128;

            if (defWdt > maxWdt) {
                defWdt = maxWdt;
            }
            else {
                defWdt = maxWdt > 1200 ? 1200 : maxWdt;
            }

            $(_target).css({ width: defWdt });
        }
        
        return defWdt;
    };


    /**
     * private : set height modal window
     */
    this._setHeightModalWindow = function(_target)
    {
        $(_target).css("height", "auto");

        var defHt   = $(_target).height();
        var maxHt   = this.isMobile() ? $(window).height() - 32 : $(window).height() - 128;

        if (defHt > maxHt) {
            defHt = maxHt;
            $(_target).css({ height: defHt });
        }
        
        return defHt;
    };


    /**
     * resize exec
     */
    this.resizeExec = function()
    {
        this._setPositionModalWindow(".m--modal-active-window");
    };
};
decorte.modal.prototype             = Object.create(decorte.core.prototype);
decorte.modal.prototype.constructor = decorte.modal;
decorte.modal.prototype             = Object.create(decorte.fn.togglebox.prototype);
decorte.modal.prototype.constructor = decorte.modal;

