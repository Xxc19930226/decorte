$(function(){

    /**
     * global initialize
     */
    initialize(decorte.core);
    initialize(decorte.menu);
    initialize(decorte.modal);


    /**
     * bundle of call function
     */
    invoke(["body#news"], decorte.news);
    invoke(["body#specialPage"], decorte.bestcosme);
    invoke(["body#searchPage"], decorte.search);
    invoke([".itemdetail"], decorte.product);
    invoke([".l--fixed-submenu-anchor", "#linesPage", ".dispItemList"], decorte.line);
    invoke([".relateditem", ".itemdetail__links"], decorte.detail);
    invoke(["body#home"], decorte.home);
    invoke(["body#home"], decorte.ranking);
    invoke(["body#home"], decorte.fascia);
    invoke(["body#faq"], decorte.faq);
    invoke([".l--embed-player"], decorte.movie);
    invoke([".l--liposome-movie"], decorte.liposomeMovie);


    /**
     * initialize
     */
    function initialize(_func)
    {
        var obj = new _func();
            obj.init();
    };


    /**
     * is or
     */
    function isOr(_arr)
    {
        var is  = false;
        var len = _arr.length;

        for (var i = 0; i < len; i++) {
            if ($(_arr[i]).size() > 0) {
                is = true;
            }
        }

        return is;
    };


    /**
     * invoke
     */
    function invoke(_arr, _func)
    {
        if (isOr(_arr)) {
            initialize(_func);
        }
    };

});
