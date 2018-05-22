<link href="/admin/css/reserve.css" rel="stylesheet">
<script src="/admin/js/reserve.js" type="text/javascript"></script>

<link href="/admin/css/datepicker/css/smoothness/jquery-ui-1.10.1.custom.css" rel="stylesheet">
<script src="/admin/css/datepicker/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="/admin/css/datepicker/js/jquery.ui.datepicker-ja.js" type="text/javascript"></script>
<script src="/admin/js/jquery.ui.touch-punch.min.js" type="text/javascript"></script>


<h1>予約希望内容</h1>
        <?php echo $form->renderFormTag(url_for('salon_reserve_decision')) ?>
        <?php echo $form->renderHiddenFields() ?>
        <?php if ($form->hasGlobalErrors()) : ?>
            <?php echo $form->renderGlobalErrors() ?>
        <?php endif ?>
	<div class="detail">

            <table cellpadding="0" cellspacing="1" class="stripe-table">
                 <tr>
                      <th>来店回数</th>
                      <td><?php echo $reserve['visit'] ?></td>
                 </tr>
                 <tr>
                      <th>会員ID</th>
                      <td><?php echo $reserve['members_card_id'] ?></td>
                 </tr>
                 <tr>
                      <th>お名前</th>
                      <td><?php echo $reserve['name_sei']." ".$reserve['name_mei'] ?></td>
                 </tr>
                 <tr>
                      <th>ふりがな</th>
                      <td><?php echo $reserve['name_sei_kana']." ".$reserve['name_mei_kana'] ?></td>
                 </tr>
                 <tr>
                      <th>年齢</th>
                      <td><?php echo $reserve['age'] ?></td>
                 </tr>
                 <tr>
                      <th>住所</th>
                      <td><?php echo $reserve['address'] ?></td>
                 </tr>
                 <tr>
                      <th>電話番号</th>
                      <td><?php echo $reserve['tel'] ?></td>
                 </tr>
                 <tr>
                      <th>メールアドレス</th>
                      <td><?php echo $reserve['email'] ?></td>
                 </tr>
                 <tr>
                      <th>希望日時1</th>
                      <td>
                           <?php if ($form['hope_flag1']->hasError()) : ?>
                                <?php echo $form['hope_flag1']->renderError() ?>
                           <?php elseif ($form['hope_start_time1']->hasError()) : ?>
                                <?php echo $form['hope_start_time1']->renderError() ?> 
                           <?php endif; ?>  
                           <span class="dates hope_date"><?php echo $reserve['hope_date1'] ?></span>
                           <span class="dates hope_time"><?php echo $reserve['hope_time1'] ?></span>
                           <span class="dates start_time"><?php echo $form['hope_start_time1']->render() ?> </span>
                           <span class="dates start_flag"><label for='hope_flag1'>確定</label><?php echo $form['hope_flag1']->render(array('id'=>'hope_flag1')) ?> </span>
                      </td>
                 </tr>
                 <tr>
                      <th>希望日時2</th>
                      <td>
                           <?php if ($reserve['hope_date2']) : ?>
                           <?php echo $form['hope_start_time2']->renderError() ?>
                           <span class="dates hope_date"><?php echo $reserve['hope_date2'] ?></span>
                           <span class="dates hope_time"><?php echo $reserve['hope_time2'] ?></span>
                           <span class="dates start_time"><?php echo $form['hope_start_time2']->render() ?></span>
                           <span class="dates start_flag"><label for='hope_flag2'>確定</label><?php echo $form['hope_flag2']->render(array('id'=>'hope_flag2')) ?> </span>
                           <?php endif; ?> 
                      </td>
                 </tr>
                 <tr>
                      <th>希望日時3</th>
                      <td>
                           <?php if ($reserve['hope_date3']) : ?>
                           <?php echo $form['hope_start_time3']->renderError() ?>
                           <span class="dates hope_date"><?php echo $reserve['hope_date3'] ?></span>
                           <span class="dates hope_time"><?php echo $reserve['hope_time3'] ?></span>
                           <span class="dates start_time"><?php echo $form['hope_start_time3']->render() ?></span>
                           <span class="dates start_flag"><label for='hope_flag3'>確定</label><?php echo $form['hope_flag3']->render(array('id'=>'hope_flag3')) ?> </span>
                           <?php endif; ?>
                      </td>
                 </tr>
                 <tr>
                      <th>上記以外（同じ時間帯）</th>
                      <td>
                           <?php echo $form['other_date1']->renderError() ?>
                           <?php echo $form['other_start_time1']->renderError() ?>
                           <span class="dates hope_date"><?php echo $form['other_date1']->render(array('class'=>'datepicker')) ?><span class="week"></span></span>
						   <span class="dates hope_time"></span>
                           <span class="dates start_time"><?php echo $form['other_start_time1'] ?> </span>
                           <span class="dates start_flag"><label for='other_flag1'>確定</label><?php echo $form['other_flag1']->render(array('id'=>'other_flag1')) ?> </span>
                       </td>
                 </tr>
                 <tr>
                      <th>上記以外（同じ曜日）</th>
                      <td>
                           <?php echo $form['other_date2']->renderError() ?>
                           <?php echo $form['other_start_time2']->renderError() ?>
                           <span class="dates hope_date"><?php echo $form['other_date2']->render(array('class'=>'datepicker')) ?><span class="week"></span></span>
						   <span class="dates hope_time"></span>
                           <span class="dates start_time"><?php echo $form['other_start_time2'] ?> </span>
                      </td>
                 </tr>
                 <tr>
                      <th>希望のメニュー</th>
                      <td><?php echo $reserve['menu'] ?></td>
                 </tr>
                 <tr>
                      <th>サイト閲覧のきっかけ</th>
                      <td><?php echo $reserve['know'] ?></td>
                 </tr>
                 <tr>
                      <th>ご意見・ご要望</th>
                      <td><?php echo nl2br($reserve['request']); ?></td>
                 </tr>
                 <tr>
                      <th>登録者<strong>（必須入力です）</strong></th>
                      <td>
                          <?php echo $form['registrant']->renderError() ?>
                          <?php echo $form['registrant']->render(array('id'=>'registrant', 'maxlength'=>'30')) ?>
                      </td>
                 </tr>
             </table>
			 <div class="btn">
             <input type="submit" name="back" value="一覧へ戻る" class="back" />
             <?php if($reserve['reply']=='返信済') : ?><p class="done">返信済み</p><?php else :?><input type="submit" name="replymail" value="返信メール作成" class="next" /><?php endif; ?>
			 
             <input type="submit" id="delete" name="delete" value="削除" class="delete" onclick="if(!showConfirm()) return false;" />
			 </div>
        </div> 
<script>
$(function() {
	
	$( ".datepicker" ).datepicker({
		inline: true,
		dateFormat: 'yy年mm月dd日（D）',
		showButtonPanel: true
/*
        ,onSelect: function(d) {//inputタグの次の要素に曜日を返す
                var year = parseInt( d.substr(0,4) );
                var month = parseInt( d.substr(5,2) ) - 1;
                var day = parseInt( d.substr(8,2) );
                //alert( year + "/" + month + "/" + day );
                var serial = new Date(year, month, day);
                var w = ["日","月","火","水","木","金","土"];
                var week = "(" + w[serial.getDay()] + ")";
                $(this).next().text( week );
        }
*/
	});
});
/*
$('.datepicker').each(function(){
	var d = $(this).val();
	if(d){
		var year = parseInt( d.substr(0,4) );
		var month = parseInt( d.substr(5,2) ) - 1;
		var day = parseInt( d.substr(8,2) );
		var serial = new Date(year, month, day);
		var w = ["日","月","火","水","木","金","土"];
		var week = "(" + w[serial.getDay()] + ")";
		$(this).next().text( week );
	}
});
*/
</script>
