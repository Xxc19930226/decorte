<link href="/admin/css/reserve.css" rel="stylesheet">
<script src="/admin/js/reserve.js" type="text/javascript"></script>
<h1>返信メール確認</h1>
        <div class="detail">
           <?php echo tag('form', array('action' => url_for('salon_reserve_mailconfirm'), 'method' => 'post'), true) ?>
            <table cellpadding="0" cellspacing="1" class="stripe-table">
                 <p class="text">以下内容で返信します。</p>
                 <tr>
                      <th>送信先メールアドレス</th>
                      <td><?php echo $reserve['email'] ?></td>
                 </tr>
                 <tr>
                      <th>件名</th>
                      <td><?php echo $mail_subject ?></td>
                 </tr>
                 <tr>
                      <th>メール本文</th>
                      <td><pre><?php echo $mail_body ?><pre></td>
                 </tr>
             </table>
         </div>
		 <div class="btn">
		 <input type="submit" name='back' value="返信メール作成へ戻る">
		 <input type="submit" value="送信">
		 </div>
