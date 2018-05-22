<?php use_helper('Number') ?>
<?php use_helper('Decorte') ?>
<?php use_stylesheet('itemdetail.css') ?>
<?php use_stylesheet('vendor/perfect-scrollbar.min.css') ?>
<?php use_stylesheet('custom_detail.css') ?>
<?php use_javascript('vendor/jquery.mousewheel.js') ?>
<?php use_javascript('vendor/perfect-scrollbar.jquery.min.js') ?>
<?php slot('title', $product['Line']['slug'] == 'cosme_decorte' ? $product['name'] : array($product['name'], $product['Line']['name'])) ?>
<?php slot('keywords', array($product['name'], $product['Category']['name'], $product['SubCategory']['name'])) ?>
<?php slot('description', htmlspecialchars(strip_tags(str_replace(array("\r\n","\n","\r"), '', $product->get('outline', ESC_RAW))), ENT_QUOTES)) ?>
<?php slot('og_url', hide_log_query($sf_context->getRequest()->getUri(ESC_RAW))) ?>
<?php slot('og_image', 'http://' . $sf_request->getHost() . url_for('product_wide_image', $product)) ?>

<?php echo tag('div', array('class' => $product['Line']['slug'] == 'aq_meliority' ? 'l-main black' : 'l-main'), true) ?>

<ul class="breadcrumb">
  <li class="breadcrumb__item"><?php if ($product['Line']['slug'] == 'ip_shot' || $product['Line']['slug'] == 'cosme_decorte'): ?><a href="/">DECORTE</a><?php else: ?><?php echo link_to($product['Line']['name_en'], '/' . $product['Line']['slug'] . '/') ?><?php endif ?></li>
  <li class="breadcrumb__item"><?php echo $product['name'] ?></li>
</ul>
<article class="itemdetail">
  <div class="left">
    <p class="itemdetail__linelogo">
      <?php if ($product['slug'] == 'JEMB'): ?>
      <?php echo link_to(image_tag('line/vice_virtue_n.png', array('alt' => $product['Line']['name_en'])), '/' . $product['Line']['slug'] . '/') ?>
      <?php else: ?>
      <?php echo link_to(image_tag($product['Line']['relative_image_path'], array('alt' => $product['Line']['name_en'])), $product['Line']['slug'] == 'ip_shot' || $product['Line']['slug'] == 'cosme_decorte' ? '/' : '/' . $product['Line']['slug'] . '/') ?>
      <?php endif ?>
    </p>
    <p class="itemdetail__image"><?php echo image_tag($product['relative_image_path'], array('alt' => $product['name'])) ?></p>
    <?php if ($product['bestcosme_flag']): ?>
    <p class="itemdetail__bestcosme"><a href="/bestcosme"><img src="/images/bestcosme/logo_best_cosme.png" alt="ベストコスメ受賞"></a></p>
    <?php endif ?>
    <?php if ($product['color_ball_flag']): ?>
    <?php include $product['absolute_color_ball_html_path'] ?>
    <?php endif ?>
  </div>
  <section class="right">
    <?php if ($custom_detail_path): ?>
    <?php include($custom_detail_path) ?>
    <?php else: ?>
    <?php if ($product['outline']): ?>
    <p class="itemdetail__copy"><?php echo nl2br($product->get('outline', ESC_RAW)) ?></p>
    <?php endif ?>
    <p class="itemdetail__linename">コスメデコルテ　
      <?php if ($product['Line']['major_flag']): ?>
      <?php echo $product['Line']['name'] ?>
      <?php endif ?>
    </p>
    <h1 class="itemdetail__itemname"><span class="product_name"><?php echo split_by_span($product['name']) ?><?php if ($product['quasi_drug_flag']): ?> ［医薬部外品］<?php endif ?></span></h1>
    <p class="itemdetail__spec">
      <?php if ($product['newitem_rel_info']): ?>
      <?php echo nl2br($product->get('newitem_rel_info', ESC_RAW)) ?>
      <br>
      <?php endif ?>
      <?php if ($product['capacity']): ?><?php echo $product['capacity'] ?>　<?php endif ?>
      <?php if ($product['colors']): ?>
      <?php if ($product['new_colors']): ?>
      全
      <?php endif ?>
      <?php echo $product['colors'] ?>
      <?php if ($product['set_flag']): ?>
      種
      <?php else: ?>
      色
      <?php endif ?>
      各
      <?php endif ?>
      <?php if ($product['price']): ?><?php echo format_number($product['price']) ?>円（税抜）<?php endif ?>
      <?php if ($product['supplement1']): ?>
      <br>
      <?php echo nl2br($product->get('supplement1', ESC_RAW)) ?>
      <?php endif ?>
    </p>   
    <p class="itemdetail__note">价格显示的是建议零售价。</p>

    <?php foreach ($product['Children'] as $child): ?>
    <h2 class="itemdetail__childname"><span class="product_name"><?php echo split_by_span($child['name']) ?><?php if ($product['quasi_drug_flag']): ?> ［医薬部外品］<?php endif ?></span></h2>
    <p class="itemdetail__childspec"><?php if ($child['capacity']): ?><?php echo $child['capacity'] ?>　<?php endif ?><?php if ($child['price']): ?><?php echo format_number($child['price']) ?>円（税抜）<?php endif ?></p>
    <p class="itemdetail__note">价格显示的是建议零售价。</p>
    <?php endforeach ?>

    <?php if ($product['supplement2']): ?>
    <p class="itemdetail__note"><?php echo nl2br($product->get('supplement2', ESC_RAW)) ?></p>
    <?php endif ?>

    <?php if ($product['night_flag'] || $product['daytime_flag']): ?>
    <ul class="itemdetail__timing">
      <?php if ($product['night_flag']): ?>
      <li class="itemdetail__timing__item"><img src="/images/itemdetail/icon_night.gif" alt="night"></li>
      <?php endif ?>
      <?php if ($product['daytime_flag']): ?>
      <li class="itemdetail__timing__item"><img src="/images/itemdetail/icon_day.gif" alt="day"></li>
      <?php endif ?>
    </ul>
    <?php endif ?>
    <div class="l-togglebox">
      <?php if ($product['explanation']): ?>
      <section class="togglebox togglebox-close">
        <h1 class="togglebox__title">产品特征<i class="icon-chevron-thin-down"></i></h1>
        <div class="togglebox__text-container">
          <p class="togglebox__text"><?php echo nl2br($product->get('explanation', ESC_RAW)) ?></p>
        </div>
      </section>
      <?php endif ?>
      <?php if ($product['how_to']): ?>
      <section class="togglebox togglebox-close">
        <h1 class="togglebox__title">使用方法<i class="icon-chevron-thin-down"></i></h1>
        <div class="togglebox__text-container">
          <p class="togglebox__text"><?php echo nl2br($product->get('how_to', ESC_RAW)) ?></p>
        </div>
      </section>
      <?php endif ?>
      <?php endif ?>
      <?php if ($product->getIngredients()->count() > 0): ?>
      <section class="togglebox togglebox-close">
        <h1 class="togglebox__title">全成分表示<i class="icon-chevron-thin-down"></i></h1>
        <div class="togglebox__text-container">
          <?php foreach ($product->getIngredients() as $ingredient): ?>
          <p class="togglebox__text">
            <?php if ($ingredient['symbol']): ?>
            <strong><?php echo $ingredient['symbol'] ?></strong><br>
            <?php endif ?>
            <?php echo nl2br($ingredient['content']) ?></p>
          <?php endforeach ?>
        </div>
      </section>
      <?php endif ?>
    </div>
    <ul class="itemdetail__links">
      <?php if ($product['cafe_link_url']): ?>
      <li class="itemdetail__links__item"><?php echo link_to('お客様からの声を見る（Cafe de DECORTÉ）', $product['cafe_link_url'] , array('class' => 'icon_window','target' => '_blank')) ?><i class="icon-windows"></i></li>
      <?php endif ?>
      <li class="itemdetail__links__item"><a href="http://www.e-map.ne.jp/asp/decorte/" target="_blank" class="icon_shop">お取り扱い店舗を探す<i class="icon-location"></i></a></li>
      <li class="itemdetail__links__item"><a href="" class="icon_share">シェアする<i class="icon-share2"></i></a></li></ul>
  </section>
</article>
</div>
<section class="relateditem">

<?php if (count($product['same_line_products']) > 0): ?>
<div class="l-container">
    <h1 class="relateditem__title">同じラインの商品</h1>
    <ul class="relateditem__list" style="height: 330px; position: relative;">
        <?php foreach ($product['same_line_products'] as $same_line_product): ?>
        <li class="relateditem__list__item bl">
            <p class="relateditem__list__item__image"><?php echo image_tag(url_for('product_square_image', $same_line_product), array('alt' => $same_line_product['name'])) ?></p>
            <p class="relateditem__list__item__text"><?php echo link_to(($same_line_product['Line']['major_flag'] ? '<span class="line_name">' . $same_line_product['Line']['name'] . '</span>' : '') . '<span class="product_name">' . split_by_span($same_line_product['name']) . '</span>', 'product_show_by_slug', $same_line_product) ?><br>
                <?php echo format_number($same_line_product['price']) ?>円（税抜）<br>
                <span class="category"><?php echo $same_line_product['SubCategory']['name'] ?></span></p>
        </li>
        <?php endforeach ?>
    </ul>
    <p class="allitem"><?php echo link_to('全ての商品を見る', '/' . $product['Line']['slug'] . '/') ?><i class="icon-chevron-thin-right"></i></p>
</div>
<?php endif ?>
<?php if (count($product['great_friend_products']) > 0): ?>
  <div class="l-container">
    <h1 class="relateditem__title">この商品を見た人はこんな商品も見ています</h1>
    <ul class="relateditem__list">
      <?php foreach ($product['great_friend_products'] as $friend_product): ?>
      <li class="relateditem__list__item bl">
        <p class="relateditem__list__item__image"><?php echo image_tag(url_for('product_square_image', $friend_product), array('alt' => $friend_product['name'])) ?></p>
        <p class="relateditem__list__item__text"><?php echo link_to(($friend_product['Line']['major_flag'] ? '<span class="line_name">' . $friend_product['Line']['name'] . '</span>' : '') . '<span class="product_name">' . split_by_span($friend_product['name']) . '</span>', 'product_show_by_slug', $friend_product) ?><br>
          <?php echo format_number($friend_product['price']) ?>円（税抜）<br>
          <span class="category"><?php echo $friend_product['SubCategory']['name'] ?></span></p>
      </li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>

</section>
