decorte = window.decorte ? decorte : {};
decorte.search = function()
{
    "use strict";

    /**
     * initialize
     */
    this.init = function()
    {
        $(document)
            .on("click", ".search__narrowdown__openclose", function(){
                var tar = $(".search__narrowdown__form");

                if (tar.is(":visible")) {
                    tar.velocity("slideUp", { duration: 500 });
                    $(this).removeClass("m--active").text("条件を絞り込む");
                }
                else {
                    tar.velocity("slideDown", { duration: 500 });
                    $(this).addClass("m--active").text("閉じる");
                }
            })
            .on("click", ".search__narrowdown__closer", function(){
                $(".search__narrowdown__openclose").trigger("click");
            });
    };
};

