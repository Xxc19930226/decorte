decorte = window.decorte ? decorte : {};
decorte.news = function()
{
    "use strict";

    decorte.core.apply(this);


    /**
     * initialize
     */
    this.init = function()
    {
        this.addEventChangeSection();
        this.preSetSection();
    };


    /**
     * add event change section
     */
    this.addEventChangeSection = function()
    {
        var itemSelector    = ".news__nav__item";
        var sectionSelector = ".news__container>section";
        var selectSelector  = ".news__nav__mobile__select";
        var sections        = ["all", "newitem", "campaign", "event"];

        $(document)
            .on("click", itemSelector, function() {
                if (! $(this).hasClass("m--active")) {
                    $(itemSelector).removeClass("m--active");
                    $(this).addClass("m--active");

                    var idx = $(this).index();

                    if (idx == 0) {
                        $(sectionSelector).show();
                    }
                    else {
                        $(sectionSelector).not($("." + sections[idx])).hide();
                        $("." + sections[idx]).show();
                    }

                    $(selectSelector).val(sections[idx]);
                }
            })
            .on("change", selectSelector, function(){
                $(itemSelector + ".m--" + $(this).val()).trigger("click");
            });
    };


    /**
     * pre set section
     */
    this.preSetSection = function()
    {
        var section = this.getUrlParameter("section", window.location.search.substring(1));

        if (section) {
            $(".news__nav__item.m--" + section).trigger("click");
        }
    };


    /**
     * add event new item
     */
    this.addEventNewItem = function()
    {
        var self = this;

        $(document)
            .on("click", ".itemcontainer .item", function(e){
                var tar = e.target.classList[0];

                if (self.isMobile() && tar !== "detail__close" && tar !== "close") {
                    $(".m-hover", this).css({ visibility: "visible" });
                    self.targetMobileDetailObject = $(".m-hover", this);
                }
            })
            .on("click", ".detail__image.sp .close, .detail__close.sp", function(){
                if (self.isMobile()) {
                    self.targetMobileDetailObject.css({ visibility: "hidden" });
                }
            });
    };
};
decorte.news.prototype             = Object.create(decorte.core.prototype);
decorte.news.prototype.constructor = decorte.news;

