<?php use_helper('Number') ?>
<?php use_helper('Decorte') ?>

<p class="categoryname">
    <?php if (isset($target)): ?>
    <?php echo $target['name'] ?>
    <?php endif ?>
</p>
<ul class="itemlist">
<?php foreach ($pager->getResults() as $idx => $product): ?>
    <li class="itemlist__item">
        <p class="itemlist__item__photo"><?php echo link_to(image_tag(url_for('product_square_image', $product), array('alt' => $product['name'])), 'product_show_by_slug', $product) ?></p>
        <p class="itemlist__item__txt">
        <?php if ($product['Line']['major_flag']): ?><span class="line_name"><?php echo ($product['Line']['name']) ?></span><?php endif ?>
        <span class="product_name"><?php echo split_by_span($product['name']) ?></span><br>
            <?php if ($product['capacity']): ?>
            <?php echo $product['capacity'] ?><br>
            <?php endif ?>
            <?php if ($product['price']): ?>
            CNY&nbsp;<?php echo format_number($product['price']) ?>
            <?php endif ?>
        </p>
        <p class="itemlist__item__cat"><?php echo $product['SubCategory']['name'] ?></p>
    </li>
<?php endforeach ?>
</ul>
