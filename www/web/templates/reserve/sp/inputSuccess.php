<?php decorate_with('layout_sp') ?>
<?php slot('title', 'WEB予約・お問い合わせ') ?>
<?php slot('page_id', 'reserve_input') ?>
<?php slot('back_link', '/') ?>
<?php use_stylesheet('sp/base.css') ?>

<script type="text/javascript">
  $(document).ready(function() {
    $('input[name="salon_reserve[shop_id]"]:radio').change(function() {
      $.get('/reserve/salon_date/' + $(this).val(), function(data) {
        $('#hope_dates').html(data);
      });

      $.get('/reserve/salon_menu/' + $(this).val(), function(data) {
        $('#menu_widget').html(data);
      });
    });
  });
</script>

<section class="contact">
	<h2 class="title">WEB予約・お問い合わせ</h2>
	<div class="reserve_flow">
		<h3>WEB予約の流れ</h3>
			<p><img src="/images/sp/reserve/step1.gif" alt="">予約フォームより、必要事項を入力、送信</p>
			<p><img src="/images/sp/reserve/step2.gif" alt="">予約受付の自動確認メールが届きます。<br />
				（予約未確定）</p>
			<p><img src="/images/sp/reserve/step3.gif" alt="">サロンスタッフより、ご予約確定のメールを差し上げます。</p>
			<p><img src="/images/sp/reserve/step4.gif" alt="">予約確定</p>
			<p><img src="/images/sp/reserve/step5.gif" alt="">サロンスタッフより、前日に確認のお電話を差し上げます。 </p>
	</div>
	<div class="reserve_notice">
		<h3>予約フォームよりご予約の方は、<br />
			下記の注意事項を必ずご確認ください。</h3>
<!--      <p class="reserve_caution"> 
        【　年末年始の営業時間のご案内　】<br>
        ■表参道店 12月31日（木）～ 1月4日（月）店休日<br><br>
■プランタン銀座店 1月1日（金） 店休日<br>
※12月31日（木）～ 1月4日（月）までは、通常の営業時間を一部変更し、営業いたします。<br>
詳しくはサロンスタッフへお尋ね下さい。
      </p>-->
		<ul>
			<li>フォームのご予約はご希望日の2日前まででお願い致します。<br />
				ご予約が当日または、前日までをご希望の方は、当サロンへ直接お電話でお問い合わせ下さい。</li>
			<li>トリートメントの最終受付時間は18時までとなっております。<br />
				18時以降ご希望の方は、当サロンへ直接お電話でお問い合わせ下さい。</li>
			<li>翌営業日15時までに当サロンスタッフから、予約確定メールを差し上げます。<br />
				万が一、メールが届かない場合は、お電話にてご連絡下さい。<br />
				（予約受付の自動受信メールは予約未確定です。）
      <p class="filter">
      翌営業日15時までに当サロンからのメールが無い場合、想定されることとして、お客様の端末の設定上、返信メールが迷惑メールと分類される等が考えられます。<br />
予約確定メールが届かない場合は、誠にお手数ですが、当サロンへお電話にてご確認頂けると幸いです。</p>
             </li>
			<li>ご予約状況により、ご希望に添えない場合もございます。その際はお電話でご連絡を頂くこととなりますので、予めご了承下さい。</li>
			<li>ご予約のキャンセルは、当サロンへ直接お電話にてお願い致します。</li>
		</ul>
		<p class="reserve_caution"> お客さまのご利用環境、また迷惑メール対策等の設定により、お返事が届かない場合があります。<br>
			「salondebeaute@cosmedecorte.com」からのメール受信が可能な設定にしていただきますようお願いいたします。<br>
		</p>


	</div>
	<div class="reserve_tel">
		<h3>お電話でのご予約・お問い合わせ</h3>

		<p><span style="font-size:12px;">＜表参道店＞</span><br />
<a href="tel:0334031560">03-3403-1560</a><br />
</p>
        <p style="font-size:12px;">午前11時～午後21時（日曜は午後20時まで）</p>
		<p><span style="font-size:12px;">＜プランタン銀座店＞</span><br />
<a href="tel:0335383451">03-3538-3451</a><br />
</p>
        <p style="font-size:12px;">午前11時～午後20時（金曜・土曜は午後21時まで）</p>
	</div>
	<h3>予約フォーム</h3>
	<p>下記の入力フォームに必要事項をご記入ください。<br>
		<strong>※</strong>は、ご記入必須項目です。必ずご記入してくださいますようお願い申し上げます。</p>
	<div class="form"> <?php echo $form->renderFormTag(url_for('reserve_input'), array('data-ajax' => 'false')) ?> <?php echo $form->renderHiddenFields() ?>
		<?php if ($form->hasGlobalErrors()) : ?>
		<?php echo $form->renderGlobalErrors() ?>
		<?php endif ?>
		<fieldset>
			<label for="">ご希望店舗<strong>※</strong></label>
			<?php echo $form['shop_id']->renderError() ?>
			<div class="horizonal"><?php echo $form['shop_id']->render(array('data-role'=>'none')) ?></div>
		</fieldset>
		<fieldset>
			<label for="">来店回数<strong>※</strong></label>
			<?php echo $form['visit']->renderError() ?>
			<div class="horizonal"><?php echo $form['visit']->render(array('data-role'=>'none')) ?></div>
		</fieldset>
		<fieldset>
			<label for=""> 会員ID<span>半角数字でご入力ください。</span></label>
			<?php echo $form['members_card_id']->renderError() ?> <?php echo $form['members_card_id']->render(array('id'=>'members_card_id', 'maxlength'=>'30', 'data-role'=>'none', 'class'=>'full', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'text')) ?>
			<p>ご来店時に発行されたメンバーズカードの裏面に記載してあります。<br>
				入力されると予約がスムーズです。</p>
		</fieldset>
		<fieldset>
			<label for="">お名前<strong>※</strong> <span>記入例： 小林 花子</span></label>
			<?php if ($form['name_sei']->hasError()) : ?>
			<?php echo $form['name_sei']->renderError() ?>
			<?php elseif ($form['name_mei']->hasError()) : ?>
			<?php echo $form['name_mei']->renderError() ?>
			<?php endif ?>
			姓 <?php echo $form['name_sei']->render(array('id'=>'name_sei', 'maxlength'=>'20', 'data-role'=>'none', 'class'=>'w30', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'text')) ?> 名 <?php echo $form['name_mei']->render(array('id'=>'name_mei', 'maxlength'=>'20', 'data-role'=>'none', 'class'=>'w30', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'text')) ?>
		</fieldset>
		<fieldset>
			<label for="">ふりがな<strong>※</strong> <span>記入例： こばやし はなこ</span></label>
			<?php if ($form['name_sei_kana']->hasError()) : ?>
			<?php echo $form['name_sei_kana']->renderError() ?>
			<?php elseif ($form['name_sei_kana']->hasError()) : ?>
			<?php echo $form['name_mei_kana']->renderError() ?>
			<?php endif ?>
			せい <?php echo $form['name_sei_kana']->render(array('id'=>'name_sei_kana', 'maxlength'=>'20', 'data-role'=>'none', 'class'=>'w30', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'text')) ?> めい <?php echo $form['name_mei_kana']->render(array('id'=>'name_mei_kana', 'maxlength'=>'20', 'data-role'=>'none', 'class'=>'w30', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'text')) ?>
		</fieldset>
		<fieldset>
			<label for="">ご年齢</label>
			<?php echo $form['age']->render(array('id'=>'age', 'maxlength'=>'2', 'data-role'=>'none', 'class'=>'mini', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'text')) ?>歳 <?php echo $form['age']->renderError() ?>
		</fieldset>
		<fieldset>
			<label for="">ご住所<span>記入例： 東京都中央区西日本橋3-6-2 日本橋マンション 103号室</span></label>
			<?php echo $form['address']->renderError() ?> <?php echo $form['address']->render(array('id'=>'address', 'maxlength'=>'255', 'data-role'=>'none', 'class'=>'full', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'text')) ?>
		</fieldset>
		<fieldset>
			<label for="">お電話番号<strong>※</strong><span>半角数字でご入力ください。 記入例： 00-0000-0000</span></label>
			<?php echo $form['tel']->renderError() ?> <?php echo $form['tel']->render(array('maxlength'=>'13', 'data-role'=>'none', 'class'=>'full', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'tel')) ?>
			<p>前日にご予約の確認はお電話で差し上げます。<br>
				お電話がつながらない場合は、留守番電話または、メールにてご連絡いたします</p>
		</fieldset>
		<fieldset>
			<label for="">メールアドレス<strong>※</strong></label>
			<?php echo $form['email']->renderError() ?> <?php echo $form['email']->render(array('id'=>'email', 'maxlength'=>'255', 'data-role'=>'none', 'class'=>'full', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'email')) ?>
		</fieldset>
		<fieldset>
			<label for="">メールアドレス(確認用)<strong>※</strong><span>確認のためもう一度ご入力ください。</span></label>
			<?php echo $form['email2']->renderError() ?> <?php echo $form['email2']->render(array('id'=>'email2', 'maxlength'=>'255', 'data-role'=>'none', 'class'=>'full', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'email')) ?>
		</fieldset>
		<fieldset>
			<label for="">ご希望日時<strong>※</strong></label>
			<?php echo $form['hope_date1']->renderError() ?><?php echo $form['hope_date2']->renderError() ?> <?php echo $form['hope_date3']->renderError() ?>
			<div id="hope_dates">
			第1希望日<br /><?php echo $form['hope_date1']->render(array('id'=>'hope_date1', 'data-role'=>'none', 'class'=>'half', 'type'=>'text')) ?> <?php echo $form['hope_time1']->render(array('id'=>'hope_time1', 'data-role'=>'none', 'class'=>'w40', 'type'=>'text')) ?><br>
			第2希望日<br /><?php echo $form['hope_date2']->render(array('id'=>'hope_date2', 'data-role'=>'none', 'class'=>'half', 'type'=>'text')) ?> <?php echo $form['hope_time2']->render(array('id'=>'hope_time2', 'data-role'=>'none', 'class'=>'w40', 'type'=>'text')) ?><br>
			第3希望日<br /><?php echo $form['hope_date3']->render(array('id'=>'hope_date3', 'data-role'=>'none', 'class'=>'half', 'type'=>'text')) ?> <?php echo $form['hope_time3']->render(array('id'=>'hope_time3', 'data-role'=>'none', 'class'=>'w40', 'type'=>'text')) ?>
			</div>
			<div>
				<p>ご希望日時をなるべく３つご入力ください。<br>
					本日から2日以後60日以内の日程で承ります。<br>
					時間指定、担当者指名などがありましたら、下記の「ご意見・ご要望など」にご記入ください。</p>
				<p class="note">※カウンセリングやお着替え、セルフメイクなどを含め、表示時間プラス30分～60分ほどお時間をいただきます。<br>
					お時間には余裕を持ってご予約いただくことをおススメしております。</p>
			</div>
		</fieldset>
		<fieldset>
			<label for="">ご希望のメニュー<strong>※</strong></label>
			<?php echo $form['menu']->renderError() ?> <span id="menu_widget"><?php echo $form['menu']->render(array('id'=>'menu', 'data-role'=>'none', 'class'=>'full', 'type'=>'text')) ?></span>
		  <p>ご希望のメニューと当日のカウンセリングの上、決定いたします。<br />
			ご希望のオプションがありましたら、下記の「ご意見・ご要望など」欄にご記入いただくか、当日お申しつけください。</p>
		</fieldset>
		<fieldset>
			<label for="">当サイトをどちらでお知りになられましたか？</label>
			<?php echo $form['know']->renderError() ?> <?php echo $form['know']->render(array('id'=>'know', 'data-role'=>'none', 'class'=>'full', 'type'=>'text')) ?>
		</fieldset>
		<fieldset>
			<label for="">ご意見・ご要望など</label>
			<?php echo $form['request']->render(array('id'=>'request', 'maxlength'=>'500', 'data-role'=>'none', 'class'=>'full', 'autocapitalize'=>'off', 'autocorrect'=>'off', 'type'=>'text', 'onkeyup'=>'ShowLength(value);' )) ?> <?php echo $form['request']->renderError() ?>
		</fieldset>
		<p class="privacy_txt">「<a target="_blank" href="http://www.kose.co.jp/jp/ja/privacy_policy/index.html">個人情報の取り扱いについて</a>｣をご確認ください。<br>
			ご同意いただけましたら下記の「同意する」にチェックを入れていただき、「入力内容の確認」ボタンを押してください。</p>
		<fieldset>
			<label for="">個人情報の取扱いについて<strong>※</strong></label>
			<?php echo $form['agree']->renderError() ?>
			<div class="horizonal">
				<input name="salon_reserve[agree]" type="checkbox" value="1" id="salon_reserve_agree_1" data-role="none" />
				<label for="salon_reserve_agree_1">同意する</label><p class="note">※当フォームをご利用の際は、ご同意いただくことが必要となります。</p></div>
		</fieldset>
		<p class="submits">
			<input type="submit" value="入力内容の確認" class="submit" data-role="none">
		</p>
		</form>
	</div>
</section>
<script type="text/javascript" language="JavaScript">
<!--
window.onload = ShowLength(document.getElementById('content').value);
//-->
</script> 
<script type="text/javascript" src="https://www.broad.ne.jp/service/zip/search.js.php?zip=zip_code&prefecture=prefecture&address1=address1&button=post_search"></script> 
<script type="text/javascript" language="JavaScript"><!-- window.onload = ShowLength(document.getElementById('content').value); //--> </script> 
