<?php slot('page_id', 'contactPage') ?>
<?php slot('title', 'お問い合わせフォーム') ?>
<?php use_stylesheet('faq.css') ?>

<article class="l-main contact">
    <header class="header">
        <h1 class="header__title">お問い合わせフォーム</h1>
    </header>
    <div class="l-contnts confirm">
        <section>
            <h1 class="blocktitle">メールによるお問い合わせ</h1>
            <p class="text">以下の内容でよろしいですか？<br />
                よろしければ、ページ下の「送信する」ボタンをクリックしてください。<br />
                「送信する」ボタンをクリックして頂けましたらお問い合わせが完了します。</p>
        </section>
        <section>
            <p class="confirm__title">お問い合わせ内容</p>
            <?php echo tag('form', array('action' => url_for('contact_confirm'), 'method' => 'post'), true) ?>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <th>商品名またはライン名</th>
                    <td><?php echo $contact['articles_name']; ?></td>
                </tr>
                <tr>
                    <th>内容</th>
                    <td><?php echo nl2br($contact['content']); ?></td>
                </tr>
            </table>
            <p class="confirm__title">お客さま情報</p>
            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <th>名前</th>
                    <td><?php echo $contact['name_sei']; ?> <?php echo $contact['name_mei']; ?></td>
                </tr>
                <tr>
                    <th>ふりがな</th>
                    <td><?php echo $contact['name_sei_kana']; ?> <?php echo $contact['name_mei_kana']; ?></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td><?php echo $contact['email']; ?></td>
                </tr>
                <tr>
                    <th>郵便番号</th>
                    <td><?php echo $contact['zip_code']; ?></td>
                </tr>
                <tr>
                    <th>都道府県</th>
                    <td><?php echo $contact['prefecture']; ?></td>
                </tr>
                <tr>
                    <th>市区町村・番地</th>
                    <td><?php echo $contact['address1']; ?></td>
                </tr>
                <tr>
                    <th>アパート・マンション・号室</th>
                    <td><?php echo $contact['address2']; ?></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td> <?php echo $contact['tel_type']; ?><br />
                        <?php echo $contact['tel']; ?> </td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td><?php echo $contact['sex']; ?></td>
                </tr>
                <tr>
                    <th>年齢</th>
                    <td>
                        <?php if ($contact['age']) : ?>
                        <?php echo $contact['age']; ?>歳
                        <?php endif ?>
                    </td>
                </tr>
            </table>
            <div class="reset_submit">
                <input name="register" type="submit" value="送信する" class="btnRegister" />
                <input name="modify" type="submit" value="修正する" class="btnModify" />
            </div>
        </section>
    </div>
    <section class="l-side">
        <?php include_partial('faq/side') ?>
    </section>
</article>
