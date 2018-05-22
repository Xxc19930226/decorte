
<h1 class="blocktitle">商品カテゴリから探す</h1>
<ul class="q_list">
    <?php foreach ($faq_categories as $faq_category): ?>
      <li class="q_list__item"><i class="icon-chevron-thin-right"></i><?php echo link_to($faq_category['title2'], 'faq_category', $faq_category) ?></li>
    <?php endforeach ?>
</ul>
