<?php slot('description', 'コスメデコルテについてよくあるご質問におこたえします。') ?>
<?php slot('keywords', 'DECORTE、コスメデコルテ,コーセー,Webサイトの情報,商品を探す,新製品から探す') ?>
<?php slot('title', 'よくあるご質問・お問い合わせ') ?>
<?php use_stylesheet('faq.css') ?>
<?php slot('product_page_flag', true) ?>
<?php slot('page_id', 'faq') ?>
<!--
<div class="linehead">
    <div class="l-container">
        <p class="linehead__back"><img src="../images/linetop/back_gray.png" alt=""></p>
        <ul class="linehead__share">
            <li class="linehead__share__facebook"><img src="/images/linetop/face_gray.png" alt=""></li>
            <li class="linehead__share__twitter"><img src="/images/linetop/twitter_gray.png" alt=""></li>
        </ul>
    </div>
</div>
-->
<article class="l-main">
    <header class="header">
        <h1 class="header__title">よくあるご質問・お問い合わせ</h1>
    </header>
    <div class="l-contnts">

        <section class="sub_category_detail_list">

            <h1 class="blocktitle"><?php echo $faq_category['title3'] ?></h1>
                <?php foreach ($faq_category['NonemptySubCategories'] as $faq_sub_category): ?>
                <div class="togglebox togglebox-open">
                    <h2 class="togglebox__title"><?php echo $faq_sub_category['title2'] ?><i class="icon-chevron-thin-down"></i></h2>
                    <div class="togglebox__text-container">
                    <?php include_component('faq', 'sub_category_detail_list', array('faq_sub_category' => $faq_sub_category)) ?>
                    </div>
                </div>
                <?php endforeach ?>

        </section>
        <section class="category_list">

            <h1 class="blocktitle">商品カテゴリから探す</h1>
            <?php include_component('faq', 'category_list', array('current_faq_category' => $faq_category)) ?>

        </section>
        <section class="content_list">

            <h1 class="blocktitle">質問内容から探す</h1>
                <?php include_component('faq', 'content_list', array('current_faq_content' => $faq_content)) ?>

        </section>
        <section>
            <div class="keyword">
                <h1 class="keyword__title">キーワードで探す</h1>
                <p class="keyword__lead">よくあるご質問を検索できます。調べたいキーワードを入力してください。</p>
            
                <?php echo tag('form', array('action' => url_for('faq_search'), 'method' => 'get'), true) ?>
                    <?php if (isset($form)): ?>
                    <?php echo $form['keyword']->render(array('class' => 'key', 'id' => '', 'maxlength' => '255')) ?>
                    <?php else: ?>
                    <input class="key" type="text" id="" name="keyword" value="" maxlength="255" />
                    <?php endif ?>
                    <input class="key_btn"  type="submit" id="" value="検索する" />
                </form>
            </div>
        </section>
    </div>
    <section class="l-side">
    <?php include_partial('faq/side') ?>
    </section>
</article>

