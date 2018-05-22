<link href="/admin/css/reserve.css" rel="stylesheet">
<script src="/admin/js/reserve.js" type="text/javascript"></script>
<h1>返信メール作成</h1>
        <div class="detail">
           <?php echo $form->renderFormTag(url_for('salon_reserve_mailform')) ?>
           <?php echo $form->renderHiddenFields() ?>
           <?php if ($form->hasGlobalErrors()) : ?>
                     <?php echo $form->renderGlobalErrors() ?>
           <?php endif ?>

            <table cellpadding="0" cellspacing="1" class="stripe-table">
                 <tr>
                      <th>送信先メールアドレス</th>
                      <td><?php echo $reserve['email'] ?></td>
                 </tr>
                 <tr>
                      <th>件名</th>
                      <td><?php echo $mail_subject ?></td>
                 </tr>
                 <tr>
                      <th>本文<strong>（必須入力です）</strong></th>
                      <td>
                          <?php if ($form['mailtext']->hasError()) : ?>
                            <ul class="error_list"><li><?php echo $form['mailtext']->getError() ?></li></ul>
                          <?php endif ?>
                          <?php echo $form['mailtext']->render(array('id'=>'mailtext', 'maxlength'=>'500')) ?>
                      </td>
                 </tr>
				 <tr>
				 <th>確定日時メニュー</th>
				 <td id="mail_bottom"><?php include_partial('salon_reserve/mail_bottom', array('form' => $form, 'mail_bottom' => $mail_bottom)) ?></td>
				 </tr>
             </table>
         </div>
		 <div class="btn">
		 <input type="submit" name='back' value="予約希望内容へ戻る">
		 <input type="submit" name='confirm' value="送信内容の確認">
		 </div>
