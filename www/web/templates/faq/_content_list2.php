
<h1 class="blocktitle">質問内容から探す</h1>
<ul class="q_list">
    <?php foreach ($faq_contents as $faq_content): ?>
      <li class="q_list__item"><i class="icon-chevron-thin-right"></i><?php echo link_to($faq_content['title2'], 'faq_content', $faq_content) ?></li>
    <?php endforeach ?>
</ul>
