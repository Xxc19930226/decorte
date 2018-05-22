
<h1 class="blocktitle">最近よくいただくご質問</h1>
<ul class="q_list">
    <?php foreach ($faq_populars_top5 as $faq_popular): ?>
    <li class="q_list__item"><i class="icon-chevron-thin-right"></i><?php echo link_to($faq_popular['question'], 'faq_qadetail', $faq_popular) ?></li>
    <?php endforeach ?>
</ul>


<div class="seemore">
    <p class="seemore__title">最近よくあるご質問をもっと見る</p>
    <ul class="q_list ">
        <?php foreach ($faq_populars_more as $faq_popular): ?>
        <li class="q_list__item"><i class="icon-chevron-thin-right"></i><?php echo link_to($faq_popular['question'], 'faq_qadetail', $faq_popular) ?></li>
        <?php endforeach ?>
    </ul>
</div>
