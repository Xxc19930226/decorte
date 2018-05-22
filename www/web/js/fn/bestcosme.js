decorte = window.decorte ? decorte : {};
decorte.bestcosme = function()
{
    "use strict";

    decorte.core.apply(this);

    this.start  = {};
    this.end    = {};
    this.key    = 0;


    /**
     * initialize
     */
    this.init = function()
    {
        this.addEventSlideUpdown();
        this.fixedLiposome();
        this.addEventResize();
        this.setPositionValues();
    };


    /**
     * add event slide updown
     */
    this.addEventSlideUpdown = function()
    {
        var self = this;

        $(document).on("click", ".year__title", function(){
            var par         = $(this).parent();
            var tar         = $(".year__container", par);
            var duration    = 750;
            var evt         = tar.is(":visible") ? "slideUp" : "slideDown";

            tar.velocity(evt, { duration: duration, complete: function(){ self.setPositionValues(); } });
            tar.is(":visible") ? par.removeClass("m--active") : par.addClass("m--active");
        });
    };


    /**
     * fixed liposome
     */
    this.fixedLiposome = function()
    {
        var self = this;
        var tar  = $("#liposome_2015 .image-container");

        $(window).on("scroll", function(){
            var scr = $(this).scrollTop();
            var ism = self.isMobile();

            if ((ism || scr <= self.start) && self.key != 0) {
                tar.css({ position: "relative", top: "0px" });
                self.key = 0;
            }
            else if (! ism && scr > self.start && self.key != 1 && scr <= self.end) {
                tar.css({ position: "fixed", top: "50px", bottom: "auto" });
                self.key = 1;
            }
            else if (! ism && scr > self.end && self.key != 2) {
                tar.css({ bottom  : 0, position: "absolute", top: "auto" });
                self.key = 2;
            }
        });
    };


    /**
     * set position values
     */
    this.setPositionValues = function()
    {
        var self        = this;
        var selector    = "#liposome_2015";
        var start       = $(selector).get(0).offsetTop;
        var end         = this.start + $(selector).get(0).clientHeight - $(selector + " .image-container").get(0).clientHeight;

        if (start != this.start || end != this.end) {
            this.start  = start;
            this.end    = end;
            this.key    = 0;

            setTimeout(function(){ self.setPositionValues(); }, 500);
        }
    };


    /**
     * resize exec
     */
    this.resizeExec = function()
    {
        this.setPositionValues();
    };
};
decorte.bestcosme.prototype             = Object.create(decorte.core.prototype);
decorte.bestcosme.prototype.constructor = decorte.bestcosme;

