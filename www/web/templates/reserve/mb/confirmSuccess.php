<?php slot('title', 'WEB予約・お問い合わせ') ?>
<img src="/images/mb/common/spacer.gif" height="8" alt="" />
<div style="text-align:left; background-color:#000000; padding:3px;">
<span style="font-size:large; color:#FFFFFF;">WEB予約・お問い合わせ</span>
</div>
<img src="/images/mb/common/spacer.gif" height="8" alt="" />
<div style="text-align:left;">
<span style="font-size:x-small;">
以下の内容でよろしいですか?<br />
よろしければ､ﾍﾟｰｼﾞ下の｢送信する｣ﾎﾞﾀﾝをｸﾘｯｸしてください｡<br />
｢送信する｣ﾎﾞﾀﾝをｸﾘｯｸして頂けましたらお問い合わせが完了します｡</span></div>
<img src="/images/mb/common/spacer.gif" height="8" alt="" />
<?php echo tag('form', array('action' => url_for('reserve_confirm'), 'method' => 'post'), true) ?>
<div style="text-align:left; font-size:x-small;">
◆お客さま情報<br />
<br />
▼ご希望店舗<br />
<?php echo $reserve['Shop'] ?>
<br />
<br />
▼来店回数<br />
<?php echo $reserve['visit']; ?>
<br />
<br />
▼会員ID<br />
<?php echo $reserve['members_card_id']; ?>
<br />
<br />
▼お名前<br />
<?php echo $reserve['name_sei']; ?>  <?php echo $reserve['name_mei']; ?>
<br />
<br />
▼ふりがな<br />
<?php echo $reserve['name_sei_kana']; ?>  <?php echo $reserve['name_mei_kana']; ?>
<br />
<br />
▼ご年齢<br />
<?php if ($reserve['age']) : ?>
<?php echo $reserve['age']; ?>歳
<?php endif ?>
<br />
<br />
▼ご住所<br />
<?php echo $reserve['address']; ?>
<br />
<br />
▼お電話番号<br />
<?php echo $reserve['tel']; ?>
<br />
<br />
▼ﾒｰﾙｱﾄﾞﾚｽ<br />
<?php echo $reserve['email']; ?>
<br />
<br />
▼ご希望日時<br />
第1希望日<br />
<?php echo $hope_date1; ?> <?php echo $reserve['hope_time1']; ?>
<?php if($hope_date2) : ?>
<br /><br />
第2希望日<br />
<?php echo $hope_date2; ?> <?php echo $reserve['hope_time2']; ?><?php endif ?>
<?php if($hope_date3) : ?>
<br /><br />
第3希望日<br />
<?php echo $hope_date3; ?> <?php echo $reserve['hope_time3']; ?><?php endif ?>
<br />
<br />
▼ご希望のメニュー<br />
<?php echo $menu; ?>
<br />
<br />
▼当サイトをどちらで<br />お知りになられましたか？<br />
<?php if ($know !='お選びください') : ?><?php echo $know; ?><?php endif; ?>
<br />
<br />
▼ご意見・ご要望など<br />
<?php echo $reserve['request']; ?>
<br />
<br />
<input style="font-size:x-small;" type="submit" name="register" value="送信する" />
<br />
<input style="font-size:x-small;" type="submit" name="modify" value="修正する" />
<br />
<br />
</div>
