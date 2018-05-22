<?php slot('title', 'WEB予約・お問い合わせ') ?>
<img src="/images/mb/common/spacer.gif" height="8" alt="" />
<div style="text-align:left; background-color:#000000; padding:3px;">
<span style="font-size:large; color:#FFFFFF;">WEB予約・お問い合わせ</span>
</div>
<br />
<?php echo $form->renderFormTag(url_for('reserve_input')) ?>
<?php echo $form->renderHiddenFields() ?>
<div style="text-align:left; font-size:x-small;">
◆お客さま情報<br />
<br />
▼ご希望店舗<span style="color:#FF0000;">※</span><br />
<?php echo $shop ?><br />
<br />
▼来店回数<span style="color:#FF0000;">※</span><br />
<?php echo $form['visit']->render() ?>
<?php if ($form['visit']->hasError() && $has_error) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['visit']->getError() ?></span><br />
<?php endif ?>
<br />
<br />
▼会員ID<br />
半角数字でご入力ください｡<br />
<?php echo $form['members_card_id']->render(array('id'=>'members_card_id', 'maxlength'=>'30', 'istyle'=>'1', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;')) ?>
<?php if ($form['members_card_id']->hasError() && $has_error) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['members_card_id']->getError() ?></span>
<?php endif ?>
<br />
<br />
ご来店時に発行されたﾒﾝﾊﾞｰｽﾞｶｰﾄﾞの裏面に記載してあります｡<br />
入力されると予約がｽﾑｰｽﾞです｡<br />
<br />
<br />
▼お名前<span style="color:#FF0000;">※</span><br />
記入例： 小林 花子<br />
姓 <?php echo $form['name_sei']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'name_sei', 'maxlength'=>'20', 'size'=>'7', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;') : array('id'=>'name_sei', 'maxlength'=>'20', 'size'=>'7', 'istyle'=>'1')) ?><br />
名 <?php echo $form['name_mei']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'name_mei', 'maxlength'=>'20', 'size'=>'7', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;') : array('id'=>'name_mei', 'maxlength'=>'20', 'size'=>'7', 'istyle'=>'1')) ?><br />
<span style="color:#FF0000;">
<?php if ($form['name_sei']->hasError() && $has_error) : ?>
<?php echo $form['name_sei']->getError() ?><br />
<?php elseif ($form['name_mei']->hasError() && $has_error) : ?>
<?php echo $form['name_mei']->getError() ?><br />
<?php endif ?>
</span>
<br />
▼ふりがな<span style="color:#FF0000;">※</span><br />
記入例： こばやし はなこ<br />
せい <?php echo $form['name_sei_kana']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'name_sei_kana', 'maxlength'=>'20', 'size'=>'13', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;') : array('id'=>'name_sei_kana', 'maxlength'=>'20', 'size'=>'13', 'istyle'=>'1')) ?><br />
めい <?php echo $form['name_mei_kana']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'name_mei_kana', 'maxlength'=>'20', 'size'=>'13', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;') : array('id'=>'name_mei_kana', 'maxlength'=>'20', 'size'=>'13', 'istyle'=>'1')) ?><br />
 <span style="color:#FF0000;">
<?php if ($form['name_sei_kana']->hasError() && $has_error) : ?>
<?php echo $form['name_sei_kana']->getError() ?><br />
<?php elseif ($form['name_sei_kana']->hasError() && $has_error) : ?>
<?php echo $form['name_mei_kana']->getError() ?><br />
<?php endif ?>
</span>
<br />
▼ご年齢<br />
<?php echo $form['age']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'age', 'maxlength'=>'2', 'size'=>'3', 'style'=>'-wap-input-format:&quot;*&lt;ja:n&gt;&quot;') : array('id'=>'age', 'maxlength'=>'2', 'size'=>'3', 'istyle'=>'4')) ?>歳
<?php if ($form['age']->hasError() && $has_error) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['age']->getError() ?></span><br />
<?php endif ?>
<br />
<br />
▼ご住所 <br />
記入例： 東京都中央区西日本橋3-6-2 日本橋ﾏﾝｼｮﾝ 103号室<br />
<?php echo $form['address']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'address', 'maxlength'=>'255', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;') : array('id'=>'address', 'maxlength'=>'255', 'istyle'=>'1')) ?>
<?php if ($form['address']->hasError() && $has_error) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['address']->getError() ?></span>
<?php endif ?>
<br />
<br />
▼お電話番号 <span style="color:#FF0000;">※</span><br />
半角数字でご入力ください｡ <br />記入例: 0000000000<br />
<?php echo $form['tel']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('size'=>'13', 'maxlength'=>'13', 'style'=>'-wap-input-format:&quot;*&lt;ja:n&gt;&quot;') : array('size'=>'13', 'maxlength'=>'13', 'istyle'=>'4')) ?>
<span style="color:#FF0000;"><?php echo $form['tel']->getError() ?></span>
<br />
<br />
前日にご予約の確認はお電話で差し上げます｡<br />
お電話がつながらない場合は､留守番電話または､ﾒｰﾙにてご連絡いたします｡<br />
<br />
<br />
▼ﾒｰﾙｱﾄﾞﾚｽ<span style="color:#FF0000;">※</span><br />
<?php echo $form['email']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'email', 'maxlength'=>'255', 'style'=>'-wap-input-format:&quot;*&lt;ja:en&gt;&quot;') : array('id'=>'email', 'maxlength'=>'255', 'istyle'=>'3')) ?>
<?php if ($form['email']->hasError() && $has_error) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['email']->getError() ?></span>
<?php endif ?>
<br />
<br />
▼ﾒｰﾙｱﾄﾞﾚｽ(確認用)<span style="color:#FF0000;">※</span><br />
確認のためもう一度ご入力ください｡<br />
<?php echo $form['email2']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'email2', 'maxlength'=>'255', 'style'=>'-wap-input-format:&quot;*&lt;ja:en&gt;&quot;') : array('id'=>'email2', 'maxlength'=>'255', 'istyle'=>'3')) ?>
 <span style="color:#FF0000;">
<?php if ($form['email2']->hasError() && $has_error) : ?><br />
<?php echo $form['email2']->getError() ?>
<?php endif ?>
</span>
<br />
<br />
▼ご希望日時<span style="color:#FF0000;">※</span><br />
第1希望日<br />
<?php echo $form['hope_date1']->render(array('id'=>'hope_date1')) ?> <?php echo $form['hope_time1']->render(array('id'=>'hope_time1')) ?><br />
<br />
第2希望日<br />
<?php echo $form['hope_date2']->render(array('id'=>'hope_date2')) ?> <?php echo $form['hope_time2']->render(array('id'=>'hope_time2')) ?><br />
<br />
第3希望日<br />
<?php echo $form['hope_date3']->render(array('id'=>'hope_date3')) ?> <?php echo $form['hope_time3']->render(array('id'=>'hope_time3')) ?>
<?php if ($form['hope_date1']->hasError() && $has_error) : ?><br />
<span style="color:#FF0000;"><?php echo $form['hope_date1']->getError() ?></span><br />
<?php endif ?>
<?php if ($form['hope_date2']->hasError() && $has_error) : ?><br />
<span style="color:#FF0000;"><?php echo $form['hope_date2']->getError() ?></span><br />
<?php endif ?>
<?php if ($form['hope_date3']->hasError() && $has_error) : ?><br />
<span style="color:#FF0000;"><?php echo $form['hope_date3']->getError() ?></span><br />
<?php endif ?>
<br />
<br />
ご希望日時をなるべく3つご入力ください｡<br />
本日から3日以後60日以内の日程で承ります｡<br />
時間指定､担当者指名などがありましたら､下記の｢ご意見･ご要望など｣にご記入ください｡<br />
<br />
※ｶｳﾝｾﾘﾝｸﾞやお着替え､ｾﾙﾌﾒｲｸなどを含め､表示時間ﾌﾟﾗｽ30分～60分ほどお時間をいただきます｡<br />
お時間には余裕を持ってご予約いただくことをおｽｽﾒしております｡<br />
<br />
▼ご希望のメニュー<span style="color:#FF0000;">※</span><br />
<?php echo $form['menu']->render(array('id'=>'menu')) ?>
<?php if ($form['menu']->hasError() && $has_error) : ?><br />
<span style="color:#FF0000;"><?php echo $form['menu']->getError() ?></span><br />
<?php endif ?>
<br />

ご希望のﾒﾆｭｰと当日のｶｳﾝｾﾘﾝｸﾞの上、決定いたします。<br />
ご希望のｵﾌﾟｼｮﾝがありましたら、下記の「ご意見・ご要望など」欄にご記入いただくか、当日お申しつけください。
<br />
<br />
▼当サイトをどちらで<br>お知りになられましたか？<br />
<?php echo $form['know']->render(array('id'=>'know')) ?>
<?php if ($form['know']->hasError() && $has_error) : ?><br />
<span style="color:#FF0000;"><?php echo $form['know']->getError() ?></span><br />
<?php endif ?>
<br />
<br />
▼ご意見・ご要望など<br />
<?php echo $form['request']->render(array('maxlength'=>'500')) ?><br />
<span style="color:#FF0000;">
<?php if ($form['request']->hasError() && $has_error) : ?>
<?php echo $form['request']->getError() ?><br />
<?php endif ?>
</span>
<br />
<br />
▼個人情報の取扱いについて<br />
「個人情報の取り扱いについて」にご同意いただけましたら下記の｢同意する｣にﾁｪｯｸを入れていただき､｢入力内容の確認｣ﾎﾞﾀﾝを押してください。<br />
<?php if ($form['agree']->hasError() && $has_error) : ?>
<span style="color:#FF0000;"><?php echo $form['agree']->getError() ?></span><br />
<?php endif ?>
<input name="salon_reserve[agree]" type="checkbox" value="1" id="salon_reserve_agree_1" />&nbsp;
<label for="salon_reserve_agree_1">同意する</label>&nbsp;
<br />
<br />
<input style="font-size:x-small;" type="submit" name="next" value="入力内容を確認する" />
<br />
<input style="font-size:x-small;" type="submit" name="back" value="店舗を選択し直す" />
<br />
<br />
<br />
</div>
