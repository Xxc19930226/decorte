decorte = window.decorte ? decorte : {};
decorte.fn = decorte.fn ? decorte.fn : {};
decorte.fn.togglebox = function()
{
    "use strict";


    /**
     * local properties
     */
    var cnActive    = "m--active";
    var cnUp        = "icon-chevron-thin-up";
    var cnDown      = "icon-chevron-thin-down";


    /**
     * toggle box event 
     */
    this.toggleBoxEvent = function(_this, _func)
    {
        var tar = $(".togglebox__text-container", $(_this).parent());

        this.closeOtherSection();

        if (tar.is(":visible")) {
            tar.velocity("slideUp", { duration: 500, complete: function(){
                if (typeof _func == 'function') {
                    _func();
                }
            } });
            $(_this).parent().removeClass(cnActive);
            $("i", _this).removeClass(cnUp).addClass(cnDown);
        }
        else {
            tar.velocity("slideDown", { duration: 500, complete: function(){
                if (typeof _func == 'function') {
                    _func();
                }
            } });
            $(_this).parent().addClass(cnActive);
            $("i", _this).removeClass(cnDown).addClass(cnUp);
        }

    };


    /**
     * close other section
     */
    this.closeOtherSection = function()
    {
        var len = $(".l-togglebox .togglebox").length;

        for (var i = 0; i < len; i++) {
            var tar = $(".togglebox").eq(i);

            if (tar.hasClass(cnActive)) {
                $(".togglebox__text-container", tar).velocity("slideUp", { duration: 500 });
                tar.removeClass(cnActive);
                $(".togglebox__title i", tar).removeClass(cnUp).addClass(cnDown);
            }
        }
    };
};
