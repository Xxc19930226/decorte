<?php slot('page_id', 'reservePage') ?>
<?php use_stylesheet('reserve.css') ?>
<?php slot('description', 'サロン ド ボーテ　コスメデコルテのご紹介。最上の心地よさがはじまる') ?>
<?php slot('keywords', 'サロン ド ボーテ,エステティック,コスメデコルテ,コーセー,サロン,フェイシャル,プランタン,銀座') ?>
<?php slot('title', 'サロン ド ボーテ　コスメデコルテ') ?>
<?php use_stylesheet('/salon/css/clearfix.css') ?>
<?php use_stylesheet('/salon/css/structure.css') ?>
<?php use_stylesheet('/salon/css/linecommon.css?0801') ?>
<?php use_stylesheet('/salon/css/member.css') ?>
<?php use_stylesheet('/salon/css/reserve.css') ?>
<?php use_stylesheet('/salon/css/shadowbox.css') ?>
<?php use_javascript('/salon/js/shadowbox.js') ?>
<?php use_javascript('/salon/js/lineCommons.js') ?>
<?php use_javascript('/salon/js/contentsfade.js') ?>

<script type="text/javascript">
   Shadowbox.init({
	       language: 'en',
	       players:  ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv'],
	       handleOversize:     "drag",
	       displayNav:         true,
	       handleUnsupported:  "remove",
	       autoplayMovies:     false
	   });
</script>

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

<p>&nbsp;</p>
<div id="pankuzu"><a href="/">DECORTE TOP</a>　＞　<a href="/salon/">サロン ド ボーテ　コスメデコルテ</a>　＞　<strong>WEB予約</strong></div>
<!-- /#pankuzu -->

<div id="contents">
  <div id="lineMenu">
    <p><a href="/salon/"><img src="/salon/images/logo.gif?1116" alt="" /></a></p>
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
      <h4 class="reserve_sub01"><img src="/salon/images/20130201/reserve_sub01.gif" /></h4>
      <p class="reserve_flow"><img src="/salon/images/20130201/reserve_flow.gif" /></p>
      <h4 class="reserve_sub02"><img src="/salon/images/20130201/reserve_sub02.gif" /></h4>
      <!--      <p class="reserve_caution"> ***********************************************************<br>
        【　年末年始の営業時間のご案内　】<br>
        ■表参道店 12月31日（木）～ 1月4日（月）店休日<br><br>
■プランタン銀座店 1月1日（金） 店休日<br>
※12月31日（木）～1月4日（月）までは、通常の営業時間を一部変更し、営業いたします。<br>
詳しくはサロンスタッフへお尋ね下さい。
        ***********************************************************<br>
      </p>-->
      <div class="reserve_notice">
        <ul>
          <li>フォームのご予約はご希望日の2日前まででお願い致します。<br />
            ご予約が当日または、前日までをご希望の方は、当サロンへ直接お電話でお問い合わせ下さい。</li>
          <li>トリートメントの最終受付時間は18時までとなっております。<br />
            18時以降ご希望の方は、当サロンへ直接お電話でお問い合わせ下さい。</li>
          <li>翌営業日15時までに当サロンスタッフから、予約確定メールを差し上げます。<br />
            万が一、メールが届かない場合は、お電話にてご連絡下さい。<br />
            （予約受付の自動受信メールは予約未確定です。）<br />
            <p class="filter">翌営業日15時までに当サロンからのメールが無い場合、想定されることとして、<br />
              お客様の端末の設定上、返信メールが迷惑メールと分類される等が考えられます。<br />
              予約確定メールが届かない場合は、誠にお手数ですが、<br />
              当サロンへお電話にてご確認頂けると幸いです。</p>
          </li>
          <li>ご予約状況により、ご希望に添えない場合もございます。<br />
            その際はお電話でご連絡を頂くこととなりますので、予めご了承下さい。</li>
          <li>ご予約のキャンセルは、当サロンへ直接お電話にてお願い致します。</li>
        </ul>
      </div>
      <p class="reserve_caution">***********************************************************<br>
        お客さまのご利用環境、また迷惑メール対策等の設定により、お返事が届かない場合があります。<br>
        「salondebeaute@cosmedecorte.com」からのメール受信が<br />
        可能な設定にしていただきますようお願いいたします。<br>
        ***********************************************************<br>
      </p>
      <p class="reserve_tel"><img src="/salon/images/20140201/reserve_tel.gif?1116" /></p>
    </div>
    <!-- /.reserve_info -->
    <div class="reserve_form clearfix">
      <p class="reserve_tel_sub">予約フォーム　<span class="small">下記に必要事項をご入力の上、送信してください。<span class="red">※</span>は必須項目になります。</span></p>
      <div id="main">
        <div id="contact"> <?php echo $form->renderFormTag(url_for('reserve_input')) ?> <?php echo $form->renderHiddenFields() ?>
          <?php if ($form->hasGlobalErrors()) : ?>
          <?php echo $form->renderGlobalErrors() ?>
          <?php endif ?>
          <div class="textarea">
            <table width="665" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="150">ご希望店舗 <span class="txtred">※</span></th>
                <td><?php echo $form['shop_id']->renderError() ?> <?php echo $form['shop_id']->render() ?></td>
              </tr>
              <tr>
                <th>来店回数 <span class="txtred">※</span></th>
                <td><?php echo $form['visit']->renderError() ?> <?php echo $form['visit']->render(array('style'=>'ime-mode:disabled')) ?></td>
              </tr>
              <tr class="demo">
                <th>会員ID </th>
                <td><?php echo $form['members_card_id']->renderError() ?> <?php echo $form['members_card_id']->render(array('id'=>'members_card_id', 'maxlength'=>'30', 'style'=>'ime-mode:disabled')) ?><br />
                  <p class="ex">半角数字でご入力ください。<br />
                    ご来店時に発行されたメンバーズカードの裏面に記載してあります。<br />
                    入力されると予約がスムーズです。</p></td>
              </tr>
              <tr class="demo">
                <th>お名前 <span class="txtred">※</span></th>
                <td><?php if ($form['name_sei']->hasError()) : ?>
                  <?php echo $form['name_sei']->renderError() ?>
                  <?php elseif ($form['name_mei']->hasError()) : ?>
                  <?php echo $form['name_mei']->renderError() ?>
                  <?php endif ?>
                  <span class="sei">姓</span><?php echo $form['name_sei']->render(array('id'=>'name_sei', 'maxlength'=>'20')) ?> <span class="mei">名</span><?php echo $form['name_mei']->render(array('id'=>'name_mei', 'maxlength'=>'20')) ?><br />
                  <p class="ex"><span class="ex_name_sei">記入例： 小林</span><span class="ex_name_mei">記入例： 花子</span></p></td>
              </tr>
              <tr class="demo">
                <th>ふりがな <span class="txtred">※</span></th>
                <td><?php if ($form['name_sei_kana']->hasError()) : ?>
                  <?php echo $form['name_sei_kana']->renderError() ?>
                  <?php elseif ($form['name_sei_kana']->hasError()) : ?>
                  <?php echo $form['name_mei_kana']->renderError() ?>
                  <?php endif ?>
                  <span class="sei">せい</span><?php echo $form['name_sei_kana']->render(array('id'=>'name_sei_kana', 'maxlength'=>'20')) ?> <span class="mei">めい</span><?php echo $form['name_mei_kana']->render(array('id'=>'name_mei_kana', 'maxlength'=>'20')) ?><br />
                  <p class="ex"><span class="ex_name_sei_kana">記入例： こばやし</span><span class="ex_name_mei_kana">記入例： はなこ</span></p></td>
              </tr>
              <tr>
                <th>ご年齢</th>
                <td><?php echo $form['age']->renderError() ?> <?php echo $form['age']->render(array('id'=>'age', 'maxlength'=>'2', 'style'=>'ime-mode:disabled')) ?>歳 </td>
              </tr>
              <tr>
                <th>ご住所</th>
                <td><?php echo $form['address']->renderError() ?> <?php echo $form['address']->render(array('id'=>'address', 'maxlength'=>'255')) ?><br />
                  <p>記入例： 東京都中央区西日本橋3-6-2 日本橋マンション 103号室</p></td>
              </tr>
              <tr class="demo">
                <th>お電話番号 <span class="txtred">※</span></th>
                <td><?php echo $form['tel']->renderError() ?> <?php echo $form['tel']->render(array('maxlength'=>'13', 'style'=>'ime-mode:disabled')) ?><br />
                  <p>半角数字でご入力ください。 記入例： 00-0000-0000<br />
                    前日にご予約の確認はお電話で差し上げます。<br />
                    お電話がつながらない場合は、留守番電話または、メールにてご連絡いたします。</p></td>
              </tr>
              <tr>
                <th>メールアドレス <span class="txtred">※</span></th>
                <td><?php echo $form['email']->renderError() ?> <?php echo $form['email']->render(array('id'=>'email', 'maxlength'=>'255', 'style'=>'ime-mode:disabled')) ?></td>
              </tr>
              <tr>
                <th>メールアドレス(確認) <span class="txtred">※</span></th>
                <td><?php echo $form['email2']->renderError() ?> <?php echo $form['email2']->render(array('id'=>'email2', 'maxlength'=>'255', 'style'=>'ime-mode:disabled')) ?><br />
                  <p>確認のためもう一度ご入力ください。</p></td>
              </tr>
              <tr>
                <th>ご希望日時<span class="txtred">※</span></th>
                <td><?php echo $form['hope_date1']->renderError() ?> <?php echo $form['hope_date2']->renderError() ?> <?php echo $form['hope_date3']->renderError() ?>
                  <div id="hope_dates">
                    <p>第1希望日<span class="select_date"><?php echo $form['hope_date1']->render() ?></span><span class="select_date"><?php echo $form['hope_time1']->render() ?></span></p>
                    <p>第2希望日<span class="select_date"><?php echo $form['hope_date2']->render() ?></span><span class="select_date"><?php echo $form['hope_time2']->render() ?></span></p>
                    <p>第3希望日<span class="select_date"><?php echo $form['hope_date3']->render() ?></span><span class="select_date"><?php echo $form['hope_time3']->render() ?></span></p>
                  </div>
                  <div>
                    <p>ご希望日時をなるべく３つご入力ください。<br />
                      本日から2日以後60日以内の日程で承ります。<br />
                      時間指定、担当者指名などがありましたら、下記の「ご意見・ご要望など」にご記入ください。</p>
                    <p>※カウンセリングやお着替え、セルフメイクなどを含め、<br />
                      <span class="left1em">表示時間プラス30分～60分ほどお時間をいただきます。</span><br />
                      <span class="left1em">お時間には余裕を持ってご予約いただくことをおススメしております。</span></p>
                  </div></td>
              </tr>
              <tr>
                <th>ご希望のメニュー<span class="txtred">※</span></th>
                <td><?php echo $form['menu']->renderError() ?> <span id="menu_widget"><?php echo $form['menu']->render(array('id'=>'menu')) ?></span><br />
                  <p>ご希望のメニューと当日のカウンセリングの上、決定いたします。<br />
                    ご希望のオプションがありましたら、下記の「ご意見・ご要望など」欄に<br />
                    ご記入いただくか、当日お申しつけください。<br />
                    「フェイシャル」と「表参道店オリジナルメニュー」の2コースご希望の場合は、<br />
                    下記の「ご意見・ご要望欄など」にご記入ください。</p></td>
              </tr>
              <tr>
                <th>当サイトをどちらでお知りになられましたか？</th>
                <td><?php echo $form['know']->renderError() ?> <?php echo $form['know']->render(array('id'=>'know')) ?></td>
              </tr>
              <tr>
                <th class="last">ご意見・ご要望など</th>
                <td class="last"><?php echo $form['request']->renderError() ?> <?php echo $form['request']->render(array('id'=>'request', 'maxlength'=>'1000', 'style'=>'width:410px; height:150px;')) ?></td>
              </tr>
            </table>
          </div>
          <p class="privacy_txt">「<a href="http://www.kose.co.jp/jp/ja/privacy_policy/index.html" target="_blank">個人情報の取り扱いについて</a>｣をご確認ください。<br />
            ご同意いただけましたら下記の「同意する」にチェックを入れていただき、「入力内容の確認」ボタンを押してください。</p>
          <div class="textarea">
            <table width="665" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th class="last" width="150">個人情報の取扱いについて</th>
                <td class="last"><?php echo $form['agree']->renderError() ?>
                  <input name="salon_reserve[agree]" type="checkbox" value="1" id="salon_reserve_agree" />
                  &nbsp;
                  <label for="salon_reserve_agree">同意する</label>
                  &nbsp;<span class="small">※当フォームをご利用の際は、ご同意いただくことが必要となります。</span></td>
              </tr>
            </table>
          </div>
          <div id="registry">
            <div class="centerContact">
              <table>
                <tr>
                  <td><input type="submit" value="入力内容の確認" class="btnConfirm" /></td>
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

<script type="text/javascript" language="JavaScript">
<!-- 
window.onload = ShowLength(document.getElementById('reserve').value); 
//--> 
</script> 
