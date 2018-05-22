decorte = window.decorte ? decorte : {};
decorte.core = function()
{
    "use strict";


    /**
     * properties
     */
    this.displayMode = true;


    /**
     * initialize
     */
    this.init = function()
    {
        this.addEventResize();
        this.switchMovieFile();
        this.setSdk();
        this.attachFbShareEvent();
        this.attachTweetEvent();
        this.addEventAnchorLink();
    };


    /**
     * add event anchor link
     */
    this.addEventAnchorLink = function()
    {
        var self = this;

        if (window.location.hash && window.location.hash.length > 1) {
            if ($(window.location.hash).size() > 0) {
                self._scrollToValue($(window.location.hash).offset().top);
            }
        }

        $(document).on('click', 'a[href^=#]', function(e){
            var href= $(this).attr("href");

            if (href != "#" && href != "") {
                var target = $(href == "#" || href == "" ? 'html' : href);

                if (target.size() > 0) {
                    self._scrollToValue(target.offset().top);
                }

                return false;
            }
        });
    };


    /**
     * private : scroll to value
     */
    this._scrollToValue = function(_value)
    {
        $('body,html').animate({ scrollTop: _value - $(".global-header").get(0).clientHeight }, 500, 'swing');
    };


    /**
     * set fb sdk
     */
    this.setSdk = function()
    {
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '175668806151556',
                xfbml      : true,
                version    : 'v2.5'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
    };


    /**
     * attach fb share event
     */
    this.attachFbShareEvent = function()
    {
        $(document).on("click", ".l--facebook-share-button", function(){
            FB.ui({
                method  : 'share',
                href    : document.URL
            }, function(response){});
        });
    };


    /**
     * attach tweet event
     */
    this.attachTweetEvent = function()
    {
        var title   = encodeURI($("title").text());
        var url     = encodeURI(document.URL);
        var href    = "https://twitter.com/intent/tweet?tw_p=tweetbutton&url=" + url + "&text=" + title;

        $(".l--tweet-button").each(function(){
            $(this)
                .attr("href", href)
                .attr("data-url", url)
                .attr("data-lang", "ja")
                .attr("data-count", "none");
        });
    };


    /**
     * get url parameter
     */
    this.getUrlParameter = function(sParam, sPageURL)
    {
        var sURLVariables = sPageURL.split('&');

        for (var i = 0; i < sURLVariables.length; i++) 
        {
            var sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] == sParam) 
            {
                return sParameterName[1];
            }
        }
    };


    /**
     * is mobile
     */
    this.isMobile = function()
    {
        return $(window).width() < 737 ? true : false;
    };


    /**
     * add event resize
     */
    this.addEventResize = function()
    {
        var self = this;
        var doit = 0;
        var wdt  = $(window).width();

        $(window).on("resize", function(){
            if (self.displayMode || (self.displayMode == false && wdt != $(this).width())) {
                clearTimeout(doit);

                wdt = $(this).width();

                doit = setTimeout(function(){
                    self.resizeExec();
                }, 250);
            }
        });
    };


    /**
     * resize exec
     */
    this.resizeExec = function()
    {
        this.switchMovieFile();
    };


    /**
     * switch movie file
     */
    this.switchMovieFile = function()
    {
        if ($(".l--embed-player").size() > 0) {
            if (this.isMobileByUA()) {
                $("object", ".l--embed-player").hide();
                $("video", ".l--embed-player").show();
            }
            else {
                $("object", ".l--embed-player").show();
                $("video", ".l--embed-player").hide();
            }
        }
    };


    /**
     * is mobile by ua
     */
    this.isMobileByUA = function()
    {
        var u       = window.navigator.userAgent.toLowerCase();
        var result  = {
            tablet:(u.indexOf("windows") != -1 && u.indexOf("touch") != -1 && u.indexOf("tablet pc") == -1) 
                || u.indexOf("ipad") != -1
                || (u.indexOf("android") != -1 && u.indexOf("mobile") == -1)
                || (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1)
                || u.indexOf("kindle") != -1
                || u.indexOf("silk") != -1
                || u.indexOf("playbook") != -1,
            mobile:(u.indexOf("windows") != -1 && u.indexOf("phone") != -1)
                || u.indexOf("iphone") != -1
                || u.indexOf("ipod") != -1
                || (u.indexOf("android") != -1 && u.indexOf("mobile") != -1)
                || (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1)
                || u.indexOf("blackberry") != -1
        }

        return result.tablet || result.mobile ? true : false;
    };


    /**
     * is tablet
     */
    this.isTablet = function()
    {
        var u       = window.navigator.userAgent.toLowerCase();
        var result  = {
            tablet:(u.indexOf("windows") != -1 && u.indexOf("touch") != -1 && u.indexOf("tablet pc") == -1) 
                || u.indexOf("ipad") != -1
                || (u.indexOf("android") != -1 && u.indexOf("mobile") == -1)
                || (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1)
                || u.indexOf("kindle") != -1
                || u.indexOf("silk") != -1
                || u.indexOf("playbook") != -1,
            mobile:(u.indexOf("windows") != -1 && u.indexOf("phone") != -1)
                || u.indexOf("iphone") != -1
                || u.indexOf("ipod") != -1
                || (u.indexOf("android") != -1 && u.indexOf("mobile") != -1)
                || (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1)
                || u.indexOf("blackberry") != -1
        }

        return result.tablet ? true : false;
    };


    /**
     * is ios
     */
    this.isiOS = function()
    {
        var u = window.navigator.userAgent.toLowerCase();

        return u.indexOf("ipad") != -1 || u.indexOf("iphone") != -1 || u.indexOf("ipod") != -1;
    };


    /**
     * set display mode
     */
    this.setDisplayMode = function()
    {
        this.displayMode = this.isMobile() ? false : true;
    };
};

