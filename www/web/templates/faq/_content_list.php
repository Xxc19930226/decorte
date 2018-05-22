<ul class="categorylist">
  <?php foreach ($faq_contents as $faq_content): ?>
    <li class="categorylist__item"><?php echo link_to($faq_content['title1'], 'faq_content', $faq_content, $current_faq_content['id'] === $faq_content['id'] ? array('class' => 'current') : array()) ?></li>
  <?php endforeach ?>
</ul>
