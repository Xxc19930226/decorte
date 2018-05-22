<?php
  $fixed_rank = array();

  $fixed_rank['skincare'][1] = 'JVWA';
	$fixed_rank['skincare'][2] = 'JVYL';
	$fixed_rank['skincare'][3] = 'JLWT';
  $fixed_rank['pointmake'][1] = 'JGOL';
	$fixed_rank['pointmake'][2] = 'JGKD';
	$fixed_rank['pointmake'][3] = 'JGRO';
  $fixed_rank['basemake'][1] = 'JGAF';
    $fixed_rank['basemake'][2] = 'JGBP';
    $fixed_rank['basemake'][3] = 'JGAP';

?>
<div class="ranking__container">
    <h1 class="ranking__title">热卖排行</h1>

    <div class="ranking__menu">
        <div class="ranking__menu__container">
            <div class="ranking__menu__triggers m--select">
                <select class="ranking__menu__select">
                    <option value="skincare" <?php echo $category_slug == 'skincare' ? 'selected' : '' ?>>护肤</option>
                    <option value="basemake" <?php echo $category_slug == 'basemake' ? 'selected' : '' ?>>底妆</option>
                    <option value="pointmake" <?php echo $category_slug == 'pointmake' ? 'selected' : '' ?>>彩妆</option>
                </select>
                <span>View More</span>
            </div>
            <div class="ranking__menu__triggers m--list">
                <ul class="ranking__category">
                    <?php echo tag('li', array('class' => 'ranking__category__item' . ($category_slug == 'skincare' ? ' m--current' : ''), 'data-type' => 'skincare'), true) ?><?php echo jq_link_to_remote('护肤', array('update' => 'ranking', 'url' => url_for('product_ranking', array('category_slug' => 'skincare')))) ?></li>
                    <?php echo tag('li', array('class' => 'ranking__category__item' . ($category_slug == 'basemake' ? ' m--current' : ''), 'data-type' => 'basemake'), true) ?><?php echo jq_link_to_remote('底妆', array('update' => 'ranking', 'url' => url_for('product_ranking', array('category_slug' => 'basemake')))) ?></li>
                    <?php echo tag('li', array('class' => 'ranking__category__item' . ($category_slug == 'pointmake' ? ' m--current' : ''), 'data-type' => 'pointmake'), true) ?><?php echo jq_link_to_remote('彩妆', array('update' => 'ranking', 'url' => url_for('product_ranking', array('category_slug' => 'pointmake')))) ?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="ranking__item__container" style="position:relative">
        <ul class="ranking__list">
            <?php for ($i = 1, $product_idx = 0; $i <= 3; $i++): ?>
            <?php if (isset($fixed_rank[$category_slug][$i])): ?>
            <?php $product = ProductTable::getInstance()->findOneBySlug($fixed_rank[$category_slug][$i]) ?>
            <?php else: ?>
            <?php $product = $products[$product_idx++] ?>
            <?php endif ?>
            <?php echo tag('li', array('class' => 'ranking__list__item m--no_' . $i), true) ?>
                <p class="image"><?php echo link_to(image_tag(url_for('product_ranking_image', $product), array('alt' => $product['name'])), 'product_show_by_slug', $product) ?></p>
                <p class="name"><a href="#"><!--<span class="name__line">コスメデコルテ　<?php if ($product['Line']['major_flag']): ?><?php echo $product['Line']['name'] ?><?php endif ?></span>--><span class="name__product"><?php echo $product['name'] ?></span></a></p>
            </li>
            <?php endfor ?>
        </ul>
        <div id="left_btn" style="position: absolute;top: 50%;left: 50px;font-size: 40px;cursor: pointer;">
            <
        </div>
        <div id="right_btn" style="position: absolute;top: 50%;right: 50px;font-size: 40px;cursor: pointer;">
            >
        </div>
        <ul class="ranking__nav">
            <li class="ranking__nav__item m--current"><a data-slide-index="0">1</a></li>
            <li class="ranking__nav__item"><a data-slide-index="1">2</a></li>
            <li class="ranking__nav__item"><a data-slide-index="2">3</a></li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $("#left_btn").click(function(){
        var catItemSelector    = ".ranking__nav .ranking__nav__item";
        if($(catItemSelector).prop('disabled') == true){
            return;
        }
        var catCurrentSelector = catItemSelector + ".m--current";
        var nextPos = $(catCurrentSelector).index() - 1;
        $(catItemSelector).eq(nextPos).trigger("click");

        $(catItemSelector).prop('disabled', true);
        setTimeout(function(){
            $(catItemSelector).prop('disabled', false);
        }, 1000);
    });
    $("#right_btn").click(function(){
        var catItemSelector    = ".ranking__nav .ranking__nav__item";
        if($(catItemSelector).prop('disabled') == true){
            return;
        }
        var catCurrentSelector = catItemSelector + ".m--current";
        var nextPos = $(catCurrentSelector).index() + 1;
        if( $(catCurrentSelector).index() == 2 ){
            nextPos = 0;
        }
        $(catItemSelector).eq(nextPos).trigger("click");

        $(catItemSelector).prop('disabled', true);
        setTimeout(function(){
            $(catItemSelector).prop('disabled', false);
        }, 1000);
    });
</script>
