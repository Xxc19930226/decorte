<?php slot('description', 'コスメデコルテについてよくあるご質問におこたえします。') ?>
<?php slot('keywords', 'DECORTE、コスメデコルテ,コーセー,Webサイトの情報,商品を探す,新製品から探す') ?>
<?php slot('title', 'よくあるご質問・お問い合わせ') ?>
<?php use_stylesheet('faq.css') ?>
<?php use_javascript('lineCommons.js') ?>
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
    
        <section>

            <h1 class="searchtitle">キーワード「<strong><?php echo $form->getKeyword() ?></strong>」によくあるご質問</h1>
    
            <?php if ($pager->count() > 0): ?>
                <div class="result_list">
                    <ul class="q_list">
                    <?php foreach ($pager->getResults() as $faq_detail): ?>
                        <li class="q_list__item"><?php echo link_to($faq_detail['question'], 'faq_qadetail', $faq_detail) ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
            <?php else: ?>
                <p class="searchtitle">現在「<strong><?php echo $form->getKeyword() ?></strong>」に関するよくあるご質問はありません。</p>
            <?php endif ?>


        </section>

        <section>

            <?php if (count($faq_detail->getRelatedDetails()) > 0): ?>
              <div class="relation">
                <h1 class="blocktitle">この質問に関連するよくあるご質問</h1>
                <ul class="q_list">
                  <?php foreach ($faq_detail->getRelatedDetails() as $faq_detail_related): ?>
                    <li class="q_list__item"><?php echo link_to($faq_detail_related['question'], 'faq_qadetail', $faq_detail_related) ?></li>
                  <?php endforeach ?>
                </ul>
              </div>
            <?php endif ?>

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
        <div class="l-2column">
            <section class="l-2column__left">
            <?php include_component('faq', 'category_list2') ?>
            </section>
            <section class="l-2column__right">
            <?php include_component('faq', 'content_list2') ?>
            </section>
        </div>

    </div>
    <section class="l-side">
    <?php include_partial('faq/side') ?>
    </section>
</article>


