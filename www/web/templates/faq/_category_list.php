<ul class="categorylist">
    <?php foreach ($faq_categories as $faq_category): ?>
        <li class="categorylist__item"><?php echo link_to($faq_category['title1'], 'faq_category', $faq_category, $current_faq_category['id'] === $faq_category['id'] ? array('class' => 'current') : array()) ?></li>
    <?php endforeach ?>
</ul>
