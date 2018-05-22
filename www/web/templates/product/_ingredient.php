
<div id="ingredient">
  <div class="head">
    <h3>配合成分一覧<span><?php echo link_to('商品詳細に戻る', 'product_show_by_slug', $product, array('class' => 'thickbox')) ?></span></h3>
  </div>
  <div class="contents">
    <h4><?php echo $product['long_name'] ?></h4>
    <?php foreach ($product->getIngredients() as $ingredient): ?>
      <h5><?php echo $ingredient['symbol'] ?></h5>
      <p><?php echo nl2br($ingredient['content']) ?></p>
    <?php endforeach ?>
  </div>
</div>
