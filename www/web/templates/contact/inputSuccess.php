<?php slot('page_id', 'contactPage') ?>
<?php slot('title', 'お問い合わせフォーム') ?>
<?php use_stylesheet('faq.css') ?>
<?php use_javascript('character_count.js') ?>

<article class="l-main contact">
    <header class="header">
        <h1 class="header__title">お問い合わせフォーム</h1>
    </header>
    <div class="l-contnts inputform">
        <div class="alertbox">
            <p class="">お客さまのご利用環境、また迷惑メール対策等の設定により、お返事が届かない場合があります。<br>
                「@qa.cosmedecorte.com」からのメール受信が可能な設定にしていただきますようお願いいたします。</p>
        </div>
        <section>
            <h1 class="blocktitle">お問い合わせいただく前の注意事項</h1>
            <p class="text">お客様からいただく個人情報は、お問い合わせ・ご質問への回答、情報提供のために使用させていただきます。<br>
                お問い合わせの内容によっては、電子メール以外の方法で回答を差し上げる場合がございます。<br>
                ご回答までに数日要する場合や、ご質問によってはお応えできかねる場合もございます。あらかじめご了承ください。<br>
                当社からの回答は、お客様個人に当てたものです。一部・全部の転用や二次利用はご遠慮ください。<br>
                個人情報の取り扱いについては、個人情報保護についてをご参照ください。</p>
        </section>
        <section>
            <h1 class="blocktitle">メールによるお問い合わせ</h1>
            <p class="text">下記の入力フォームに必要事項をご記入ください。<br>
                <span class="txtred">※</span>は、ご記入必須項目です。必ずご記入してくださいますようお願い申し上げます。</p>
            <?php echo $form->renderFormTag(url_for('contact_input')) ?> <?php echo $form->renderHiddenFields() ?>
            <?php if ($form->hasGlobalErrors()) : ?>
            <?php echo $form->renderGlobalErrors() ?>
            <?php endif ?>
            <div class="textarea">
                <fieldset class="fieldset">
                    <legend class="fieldset__title">お問い合わせ内容</legend>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th class="table_th">商品名またはライン名 <span class="txtred">※</span></th>
                            <td class="table_td"><?php echo $form['articles_name']->renderError() ?> <?php echo $form['articles_name']->render(array('class'=>'width-full', 'maxlength'=>'50')) ?></td>
                        </tr>
                        <tr>
                            <th class="table_th">内容 <span class="txtred">※</span>
                                <p class="example">できるだけ詳しくご記入ください。</p>
                            </th>
                            <td class="table_td"><?php echo $form['content']->renderError() ?> <?php echo $form['content']->render(array('id'=>'content','class'=>'width-full', 'maxlength'=>'1000', 'onkeyup'=>'ShowLength(value);')) ?>
                                <p><span id="inputlength">0</span>/1000文字</p>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset class="fieldset">
                    <legend class="fieldset__title">お客さま情報</legend>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <th class="table_th">お名前 <span class="txtred">※</span><span class="sp example">記入例：小林　花子</span></th>
                            <td class="table_td">
                                <?php if ($form['name_sei']->hasError()) : ?>
                                <?php echo $form['name_sei']->renderError() ?>
                                <?php elseif ($form['name_mei']->hasError()) : ?>
                                <?php echo $form['name_mei']->renderError() ?>
                                <?php endif ?>
                                <span class="sei">姓</span><?php echo $form['name_sei']->render(array('id'=>'name_sei', 'class'=>'name_sei', 'maxlength'=>'20')) ?> <span class="mei">名</span><?php echo $form['name_mei']->render(array('id'=>'name_mei', 'class'=>'name_mei', 'maxlength'=>'20')) ?><br />
                                <p class="ex pc"><span class="ex_name_sei">記入例： 小林</span><span class="ex_name_mei">記入例： 花子</span></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="table_th">ふりがな <span class="txtred">※</span><span class="sp example">記入例：こばやし　はなこ</span></th>
                            <td class="table_td">
                                <?php if ($form['name_sei_kana']->hasError()) : ?>
                                <?php echo $form['name_sei_kana']->renderError() ?>
                                <?php elseif ($form['name_sei_kana']->hasError()) : ?>
                                <?php echo $form['name_mei_kana']->renderError() ?>
                                <?php endif ?>
                                <span class="sei">せい</span><?php echo $form['name_sei_kana']->render(array('id'=>'name_sei_kana', 'class'=>'name_sei_kana', 'maxlength'=>'20')) ?> <span class="mei">めい</span><?php echo $form['name_mei_kana']->render(array('id'=>'name_mei_kana', 'class'=>'name_mei_kana', 'maxlength'=>'20')) ?><br />
                                <p class="ex pc"><span class="ex_name_sei_kana">記入例： こばやし</span><span class="ex_name_mei_kana">記入例： はなこ</span></p>
                            </td>
                        </tr>
                        <tr>
                            <th class="table_th">メールアドレス <span class="txtred">※</span></th>
                            <td class="table_td"><?php echo $form['email']->renderError() ?> <?php echo $form['email']->render(array('id'=>'email','type'=>'email','class'=>'width-full', 'maxlength'=>'255', 'style'=>'ime-mode:disabled')) ?></td>
                        </tr>
                        <tr>
                            <th class="table_th">メールアドレス(確認用) <span class="txtred">※</span></th>
                            <td class="table_td"><?php echo $form['email2']->renderError() ?> <?php echo $form['email2']->render(array('id'=>'email2','type'=>'email','class'=>'width-full', 'maxlength'=>'255', 'style'=>'ime-mode:disabled')) ?><br />
                                <p class="pc ex">メールアドレスに誤りがないか確認するため、再度ご記入ください。 </p></td>
                        </tr>
                        <tr>
                            <th class="table_th">郵便番号 <span class="txtred">※</span><span class="sp example">記入例： 123-4567(ハイフンは省略可)</span></th>
                            <td class="table_td"><?php echo $form['zip_code']->renderError() ?> <?php echo $form['zip_code']->render(array('id'=>'zip_code','class'=>'zip_code', 'maxlength'=>'8', 'style'=>'ime-mode:disabled')) ?> <span id="post_search">郵便番号検索</span><br />
                                <p class="pc ex">記入例： 123-4567(ハイフンは省略可)</p></td>
                        </tr>
                        <tr>
                            <th class="table_th">都道府県<span class="txtred">※</span></th>
                            <td class="table_td"><?php echo $form['prefecture']->renderError() ?> <?php echo $form['prefecture']->render(array('id'=>'prefecture','class'=>'prefecture',)) ?></td>
                        </tr>
                        <tr>
                            <th class="table_th">市区町村・番地<span class="txtred">※</span><span class="sp example">記入例： 中央区西日本橋3-6-2</span></th>
                            <td class="table_td"><?php echo $form['address1']->renderError() ?> <?php echo $form['address1']->render(array('id'=>'address1','class'=>'width-full', 'maxlength'=>'255')) ?><br />
                                <p class="pc ex">記入例： 中央区西日本橋3-6-2</p></td>
                        </tr>
                        <tr>
                            <th class="table_th">アパート・マンション・号室<span class="sp example">記入例：日本橋マンション　103号室</span></th>
                            <td class="table_td"><?php echo $form['address2']->renderError() ?> <?php echo $form['address2']->render(array('id'=>'address2','class'=>'width-full', 'maxlength'=>'255')) ?><br />
                                <p class="pc ex">記入例：日本橋マンション　103号室</p></td>
                        </tr>
                        <tr>
                            <th class="table_th">電話番号 <span class="txtred">※</span><span class="sp example">記入例： 00-0000-0000</span></th>
                            <td class="table_td">
                                <?php if ($form['tel_type']->hasError()) : ?>
                                <?php echo $form['tel_type']->renderError() ?>
                                <?php elseif ($form['tel']->hasError()) : ?>
                                <?php echo $form['tel']->renderError() ?>
                                <?php endif ?>
                                <?php echo $form['tel_type']->render() ?><br />
                                <?php echo $form['tel']->render(array('maxlength'=>'13', 'class'=>'tel', 'type'=>'tel', 'style'=>'ime-mode:disabled')) ?><br />
                                <p class="pc ex">記入例： 00-0000-0000</p></td>
                        </tr>
                        <tr>
                            <th class="table_th">性別</th>
                            <td class="table_td"><?php echo $form['sex']->renderError() ?> <?php echo $form['sex']->render() ?></td>
                        </tr>
                        <tr>
                            <th class="table_th">年齢</th>
                            <td class="table_td"><?php echo $form['age']->renderError() ?> <?php echo $form['age']->render(array('id'=>'age', 'class'=>'age', 'maxlength'=>'2', 'style'=>'ime-mode:disabled')) ?>歳 </td>
                        </tr>
                    </table>
                </fieldset>
                <div class="text">
                    <p>【お問い合わせいただく前の注意事項】をご確認していただき、ご同意していただける方は<br>「入力内容の確認」ボタンをクリックしてください。</p>
                </div>
                <div class="reset_submit">
                    <input type="submit" value="入力内容の確認" class="btnConfirm" />
                    <input type="reset" value="リセット" class="btnReset" />
                </div>
            </div>
        </section>
    </div>
    <section class="l-side">
        <?php include_partial('faq/side') ?>
    </section>
</article>
<script type="text/javascript" src="https://www.broad.ne.jp/service/zip/search.js.php?zip=zip_code&prefecture=prefecture&address1=address1&button=post_search"></script> 
<script type="text/javascript" language="JavaScript">
<!-- 
window.onload = ShowLength(document.getElementById('content').value); 
//--> 
</script> 
