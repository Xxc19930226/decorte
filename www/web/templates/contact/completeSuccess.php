<?php slot('page_id', 'contactPage') ?>
<?php slot('title', 'お問い合わせフォーム') ?>
<?php use_stylesheet('faq.css') ?>

<article class="l-main contact">
    <header class="header">
        <h1 class="header__title">お問い合わせフォーム</h1>
    </header>
    <div class="l-contnts complete">
        <section>
            <h1 class="blocktitle">メールによるお問い合わせ</h1>
            <p class="text">お問い合わせいただき、誠にありがとうございました。<br />
                お問い合わせ内容の送信が完了しました。 <a href="<?php echo url_for('homepage') ?>">トップページヘ</a> </p>
        </section>
    </div>
    <section class="l-side">
        <?php include_partial('faq/side') ?>
    </section>
</article>
