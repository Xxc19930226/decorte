decorte = window.decorte ? decorte : {};
decorte.product = function()
{
    "use strict";

    decorte.fn.togglebox.apply(this);


    /**
     * initialize
     */
    this.init = function()
    {
        var self = this;

        $(document)
            .on("click", ".togglebox__title", function(){
                self.toggleBoxEvent(this);
            })
        ;
    };
};
decorte.product.prototype             = Object.create(decorte.fn.togglebox.prototype);
decorte.product.prototype.constructor = decorte.product;

