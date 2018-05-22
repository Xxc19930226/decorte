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
        <section>
            <?php include_component('faq', 'popular_list') ?>
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
