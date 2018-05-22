<?php decorate_with('layout_sp') ?>
<?php slot('title', 'WEB予約・お問い合わせ') ?>
<?php slot('page_id', 'reserve_confirm') ?>
<?php slot('back_link', '/') ?>
<?php use_stylesheet('sp/base.css') ?>

<section class="contact">
	<h2 class="title">WEB予約・お問い合わせ</h2>
	<div class="form"> <?php echo tag('form', array('action' => url_for('reserve_confirm'), 'method' => 'post', 'data-ajax' => 'false'), true) ?>
		<fieldset>
			<dl>
				<dt>ご希望店舗</dt>
				<dd><?php echo $reserve['Shop']; ?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>来店回数</dt>
				<dd><?php echo $reserve['visit']; ?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>会員ID</dt>
				<dd><?php echo $reserve['members_card_id']; ?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>お名前</dt>
				<dd><?php echo $reserve['name_sei']; ?> <?php echo $reserve['name_mei']; ?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>ふりがな</dt>
				<dd><?php echo $reserve['name_sei_kana']; ?> <?php echo $reserve['name_mei_kana']; ?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>ご年齢</dt>
				<dd>
					<?php if ($reserve['age']) : ?>
					<?php echo $reserve['age']; ?>歳
					<?php endif ?>
				</dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>ご住所</dt>
				<dd><?php echo $reserve['address']; ?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>電話番号</dt>
				<dd><?php echo $reserve['tel']; ?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>メールアドレス</dt>
				<dd><?php echo $reserve['email']; ?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>ご希望日時</dt>
				<dd> 第１希望日 <?php echo $hope_date1; ?> <?php echo $reserve['hope_time1']; ?><br />
					<?php if ($hope_date2) : ?>
					第２希望日 <?php echo $hope_date2; ?> <?php echo $reserve['hope_time2']; ?><br />
					<?php endif ?>
					<?php if ($hope_date3) : ?>
					第３希望日 <?php echo $hope_date3; ?> <?php echo $reserve['hope_time3']; ?>
					<?php endif ?>
				</dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>ご希望のメニュー</dt>
				<dd><?php echo $menu; ?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>当サイトをどちらでお知りになられましたか？</dt>
				<dd><?php echo $know; ?></dd>
			</dl>
		</fieldset>
		<fieldset>
			<dl>
				<dt>ご意見・ご要望など</dt>
				<dd><?php echo nl2br($reserve['request']); ?></dd>
			</dl>
		</fieldset>
		<p class="submits">
			<input type="submit" name="modify" value="修正する" class="back" data-role="none">
			<input type="submit" name="register" value="送信する" class="submit" data-role="none">
		</p>
		</form>
	</div>
</section>
