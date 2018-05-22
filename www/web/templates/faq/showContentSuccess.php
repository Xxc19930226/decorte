<?php slot('description', 'コスメデコルテについてよくあるご質問におこたえします。') ?>
<?php slot('keywords', 'DECORTE、コスメデコルテ,コーセー,Webサイトの情報,商品を探す,新製品から探す') ?>
<?php slot('title', 'よくあるご質問・お問い合わせ') ?>
<?php use_stylesheet('faq.css') ?>
<?php slot('product_page_flag', true) ?>
<?php slot('page_id', 'faq') ?>

<article class="l-main">
    <header class="header">
        <h1 class="header__title">よくあるご質問・お問い合わせ</h1>
    </header>
    <div class="l-contnts">

        <section class="content_detail_list">
            <h1 class="blocktitle"><?php echo $faq_content['title3'] ?></h1>
            <?php include_component('faq', 'content_detail_list', array('faq_content' => $faq_content)) ?>

        </section>
        <section class="content_list">

            <h1 class="blocktitle">質問内容から探す</h1>
                <?php include_component('faq', 'content_list', array('current_faq_content' => $faq_content)) ?>

        </section>
        <section class="category_list">

            <h1 class="blocktitle">商品カテゴリから探す</h1>
            <?php include_component('faq', 'category_list', array('current_faq_category' => $faq_category)) ?>

        </section>
    </div>
    <section class="l-side">
    <?php include_partial('faq/side') ?>
    </section>
</article>

