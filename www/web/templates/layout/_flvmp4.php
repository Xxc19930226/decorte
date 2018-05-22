<div class="l--embed-player">
    <div class="l--embed-player__container">
        <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="100%" height="100%" align="top">
            <param name="movie" value="<?php echo $flashFile ?>" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#000000" />
            <param name="play" value="true" />
            <param name="loop" value="true" />
            <param name="wmode" value="transparent" />
            <param name="scale" value="showall" />
            <param name="menu" value="false" />
            <param name="devicefont" value="false" />
            <param name="salign" value="t" />
            <param name="allowScriptAccess" value="sameDomain" />
            <!--[if !IE]>-->
            <object type="application/x-shockwave-flash" data="<?php echo $flashFile ?>" width="100%" height="100%">
                <param name="movie" value="<?php echo $flashFile ?>" />
                <param name="quality" value="high" />
                <param name="bgcolor" value="#000000" />
                <param name="play" value="true" />
                <param name="loop" value="true" />
                <param name="wmode" value="transparent" />
                <param name="scale" value="showall" />
                <param name="menu" value="false" />
                <param name="devicefont" value="false" />
                <param name="salign" value="t" />
                <param name="allowScriptAccess" value="sameDomain" />
            <!--<![endif]-->
                <a href="http://www.adobe.com/go/getflash">
                    <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Adobe Flash Player を取得" />
                </a>
            <!--[if !IE]>-->
            </object>
            <!--<![endif]-->
        </object>
        <video id="l--embed-player__video" loop muted poster="<?php echo $poster ?>" onclick="this.play()">
            <source src="<?php echo $mp4File ?>" type="video/mp4" />
        </video>
    </div>
</div>
