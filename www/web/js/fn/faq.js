decorte = window.decorte ? decorte : {};
decorte.faq = function()
{
    "use strict";

    /**
     * initialize
     */
    this.init = function()
    {
        var self = this;

        $(document)
            .on("click", ".seemore__title", function(){
                $(this).velocity('slideUp', { duration: 500 });
                $('.q_list', $(this).parent()).velocity('slideDown', { duration: 500 });
            })
            .on("click", ".togglebox__title", function(){
                var tar = $(this).parent().find(".togglebox__text-container");

                self.closeOtherSection();

                if (tar.is(":visible")) {
                    tar.velocity('slideUp', { duration: 500 });
                    $(this).parent().removeClass("m--active");
                    $("i", this).removeClass("icon-chevron-thin-up").addClass("icon-chevron-thin-down");
                }
                else {
                    tar.velocity('slideDown', { duration: 500 });
                    $(this).parent().addClass("m--active");
                    $("i", this).removeClass("icon-chevron-thin-down").addClass("icon-chevron-thin-up");
                }
            });
    };


    /**
     * close other section
     */
    this.closeOtherSection = function()
    {
        var len = $(".sub_category_detail_list .togglebox").length;

        for (var i = 0; i < len; i++) {
            var tar = $(".togglebox").eq(i);

            if (tar.hasClass("m--active")) {
                $(".togglebox__text-container", tar).velocity("slideUp", { duration: 500 });
                tar.removeClass("m--active");
                $(".togglebox__title i", tar).removeClass("icon-chevron-thin-up").addClass("icon-chevron-thin-down");
            }
        }
    };
};

