<?php if ($pager->count() > 0): ?>
  <ul class="q_list">
    <?php foreach ($pager->getResults() as $faq_detail): ?>
      <li class="q_list__item"><i class="icon-chevron-thin-right"></i><?php echo link_to($faq_detail['question'], 'faq_qadetail', $faq_detail) ?></li>
    <?php endforeach ?>
  </ul>
<?php else: ?>
	<p>現在「<?php echo $faq_content['title3'] ?>」はございません。</p>
<?php endif ?>
