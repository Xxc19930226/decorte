         $(function(){
            /* 例1 */
            $('#coda-slider-1').codaSlider({
               crossLinking:false,            /* クロスリンク無効 */
               firstPanelToLoad:1            /* 初期選択パネル指定 */
            });
            /* 例2 */
            $('#coda-slider-2').codaSlider({
               autoSlide:true,               /* 自動再生 */
               autoHeight:false,            /* 自動高さ調整無効 */
               autoSlideStopWhenClicked:false,   /* パネルクリック時にスライドの自動再生を停止しない */
               autoSlideInterval:3000         /* スライド間隔3秒 */
            });
            /* 例3 */
            $('#coda-slider-3').codaSlider({
               autoHeight:false            /* 自動高さ調整無効 */
            });
            $('#coda-slider-4').codaSlider({
               autoHeight:false            /* 自動高さ調整無効 */
            });
            /* 例4 */
            $('#coda-slider-5').codaSlider({
               dynamicArrows: false,         /* 前後移動ボタン自動表示無効 */
               dynamicTabs: false            /* タブ自動表示無効 */
            });
            /* 例5 */
            $('#coda-slider-6').codaSlider({
               autoHeightEaseDuration: 1000,
               autoHeightEaseFunction: "easeInBounce",
               slideEaseDuration: 1000,
               slideEaseFunction: "easeInBounce"
            });
         });
