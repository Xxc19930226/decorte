<?php slot('page_id', 'reservePage') ?>
<?php use_stylesheet('reserve.css') ?>
<?php use_javascript('character_count.js') ?>
<?php slot('description', 'サロン ド ボーテ　コスメデコルテのご紹介。最上の心地よさがはじまる') ?>
<?php slot('keywords', 'サロン ド ボーテ,エステティック,コスメデコルテ,コーセー,サロン,フェイシャル,プランタン,銀座') ?>
<?php slot('title', 'サロン ド ボーテ　コスメデコルテ') ?>
<?php use_stylesheet('/salon/css/clearfix.css') ?>
<?php use_stylesheet('/salon/css/structure.css') ?>
<?php use_stylesheet('/salon/css/linecommon.css?0801') ?>
<?php use_stylesheet('/salon/css/member.css') ?>
<?php use_stylesheet('/salon/css/reserve.css') ?>
<?php use_javascript('/salon/js/lineCommons.js') ?>
<?php use_javascript('/salon/js/contentsfade.js') ?>

<div id="pankuzu"><a href="/">DECORTE TOP</a>　＞　<a href="/salon/">サロン ド ボーテ　コスメデコルテ</a>　＞　<strong>WEB予約</strong></div>
<!-- /#pankuzu -->
<div id="contents">
  <div id="lineMenu">
    <p><a href="/salon/"><img src="/salon/images/logo.gif" alt="" /></a></p>
    <div id="lineNavi" class="salonmenu">
      <dl id="lineList">
        <dt class="list_news"><a href="/salon/news.html">新着情報</a></dt>
        <dd></dd>
        <dt class="list_salon">サロン ド ボーテ　コスメデコルテとは</dt>
        <dd>
          <p class="sub_salon_concept"><a href="/salon/salonconcept.html">サロンコンセプト</a></p>
          <p class="sub_salon_flow"><a href="/salon/flow.html">ご来店からの流れ</a></p>
        </dd>
        <dt class="list_course">コースメニュー</dt>
        <dd>
          <dl class="course">
            <dt class="list_facial">フェイシャル</dt>
            <dd>
              <p class="sub_salon_course_aqme"><a href="/salon/course_aqme.html">AQ ミリオリティコース</a></p>
              <p class="sub_salon_course_basic"><a href="/salon/course_basic.html">コスメデコルテ ベーシックコース</a></p>
              <p class="sub_salon_course_healing"><a href="/salon/course_healing.html">コスメデコルテ ヒーリングコース</a></p>
              <p class="sub_salon_course_ml"><a href="/salon/course_ml.html">モイスチュアリポソームコース</a></p>
              <p class="sub_salon_course_first"><a href="/salon/course_first.html">ファースト コスメデコルテコース</a></p>
              <p class="sub_salon_course_option"><a href="/salon/course_option.html">オプション</a></p>
              <p class="sub_salon_course_bridal"><a href="/salon/course_bridal.html">ブライダルコース</a></p>
            </dd>
            <dt class="list_body"><a href="/salon/course_body.html">ボディ</a></dt>
            <dd></dd>
          </dl>
        </dd>
        <dt class="list_member">メンバーサービス</dt>
        <dd>
          <p class="sub_salon_member_new"><a href="/salon/member_new.html">入会初年度特典</a></p>
          <p class="sub_salon_member_program"><a href="/salon/member_program.html">メンバーズプログラム</a></p>
        </dd>
        <dt class="list_access"><a href="/salon/access.html">アクセス</a></dt>
        <dd></dd>
        <dt class="list_reserve"><a href="/salon/reservation/" class="selected">WEB予約</a></dt>
        <dd></dd>
      </dl>
    </div>
    <!-- /#lineNavi -->
	<div class="iBanner"> <a href="/salon/reservation"><img src="/salon/images/20130201/banner_reservation.jpg" alt="WEB予約お問い合わせ"></a></div>
	<div class="iBanner2"> <a href="/salon/news.html#news_christmas"><img src="/salon/images/side/banner_christmas.gif" alt="クリスマス限定コース"></a></div>
	<div class="iBanner2"> <a href="/salon/news.html#news_special"><img src="/salon/images/side/banner_special.gif" alt="サロン ド ボーテ コスメデコルテ 冬限定コース"></a></div>
	<div class="iBanner2"> <a href="/salon/news.html#news_option"><img src="/salon/images/side/banner_option.gif" alt="サロン ド ボーテ コスメデコルテ 冬限定オプション"></a></div>
	<div class="iBanner2"> <a href="/salon/news.html#news_aqme"><img src="/salon/images/side/banner_aqme.gif" alt="AQ ミリオリティ　特別ご優待コース"></a></div>
	<div class="iBanner2"> <a href="/salon/course_bridal.html"><img src="/salon/images/side/banner_bridal.gif" alt="ブライダルコース"></a></div>
	<div class="iBanner2"> <a href="/salon/news.html#webreserve"><img src="/salon/images/side/banner_reserve.gif" alt="WEB予約特典"></a></div>
	<div class="iBanner2"> <a href="/salon/news.html#birthday"><img src="/salon/images/side/banner_birthday.gif" alt="お誕生月 ご来店特典"></a></div>
    <div class="iBanner2"><img src="/salon/images/20140201/side_tel_omotesando.gif" alt="表参道店直通電話" /></div>
    <div class="iBanner2"><img src="/salon/images/20130201/side_tel.gif" alt="プランタン銀座店直通電話" /></div>
  </div>
  <!-- /#lineMenu -->
  <div id="SalonContents" class="reserve">
    <div class="reserve_info">
      <h3 class="reserve_title"><img src="/salon/images/20130201/reserve_title.gif" /></h3>
    </div>
    <div class="reserve_form clearfix">
      <div id="main">
        <div id="contact">
          <div class="textarea"> <?php echo tag('form', array('action' => url_for('reserve_confirm'), 'method' => 'post'), true) ?>
            <table width="665" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th>ご希望店舗</th>
                <td><?php echo $reserve['Shop'] ?></td>
              </tr>
              <tr>
                <th>来店回数</th>
                <td><?php echo $reserve['visit']; ?></td>
              </tr>
              <tr>
                <th>会員ID</th>
                <td><?php echo $reserve['members_card_id']; ?></td>
              </tr>
              <tr>
                <th width="200">お名前</th>
                <td><?php echo $reserve['name_sei']; ?> <?php echo $reserve['name_mei']; ?></td>
              </tr>
              <tr>
                <th>ふりがな</th>
                <td><?php echo $reserve['name_sei_kana']; ?> <?php echo $reserve['name_mei_kana']; ?></td>
              </tr>
              <tr>
                <th>ご年齢</th>
                <td><?php if ($reserve['age']) : ?>
                  <?php echo $reserve['age']; ?>歳
                  <?php endif ?></td>
              </tr>
              <tr>
                <th>ご住所</th>
                <td><?php echo $reserve['address']; ?></td>
              </tr>
              <tr>
                <th>お電話番号</th>
                <td><?php echo $reserve['tel']; ?></td>
              </tr>
              <tr>
                <th>メールアドレス</th>
                <td><?php echo $reserve['email']; ?></td>
              </tr>
              <tr>
                <th>ご希望日時</th>
                <td> 第1希望日　<?php echo $hope_date1; ?>　<?php echo $reserve['hope_time1']; ?><br />
                  <?php if ($hope_date2) : ?>
                  第2希望日　<?php echo $hope_date2; ?>　<?php echo $reserve['hope_time2']; ?><br />
                  <?php endif ?>
                  <?php if ($hope_date3) : ?>
                  第3希望日　<?php echo $hope_date3; ?>　<?php echo $reserve['hope_time3']; ?>
                  <?php endif ?></td>
              </tr>
              <tr>
                <th>ご希望のメニュー</th>
                <td><?php echo $menu; ?></td>
              </tr>
              <tr>
                <th>当サイトをどちらで<br />
                  お知りになられましたか？</th>
                <td><?php if ($know !='お選びください') : ?>
                  <?php echo $know; ?>
                  <?php endif; ?></td>
              </tr>
              <tr>
                <th class="last">ご意見・ご要望など</th>
                <td class="last"><?php echo nl2br($reserve['request']); ?></td>
              </tr>
            </table>
          </div>
          <div id="registry">
            <div class="centerContact2">
              <table width="245px">
                <tr>
                  <td><input name="modify" type="submit" value="修正する" class="btnModify" /></td>
                  <td><input name="register" type="submit" value="送信する" class="btnRegister" /></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <!-- /#contact --> 
      </div>
      <!-- /#main --> 
    </div>
    <!-- /.reserve_form --> 
    
  </div>
</div>
<!-- /#contents --> 
