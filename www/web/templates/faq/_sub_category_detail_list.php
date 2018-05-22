<ul class="q_list">
  <?php foreach ($pager->getResults() as $faq_detail): ?>
    <li class="q_list__item"><?php echo link_to($faq_detail['question'], 'faq_qadetail', $faq_detail) ?></li>
  <?php endforeach ?>
</ul>
