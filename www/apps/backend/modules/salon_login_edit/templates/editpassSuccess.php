<link href="/admin/css/reserve.css" rel="stylesheet">
<script src="/admin/js/reserve.js" type="text/javascript"></script>

<h1>パスワードを再入力してください。</h1>
        <?php echo $form->renderFormTag(url_for('salon_login_pass')) ?>
        <?php echo $form->renderHiddenFields() ?>
        <?php if ($form->hasGlobalErrors()) : ?>
            <?php echo $form->renderGlobalErrors() ?>
        <?php endif ?>
    <?php if($regist_flag) : ?>
         <p class="text"><strong class="complete">パスワードの変更が完了しました。</strong></p>
    <?php endif; ?>

    <div class="detail">
            <table cellpadding="0" cellspacing="1" class="stripe-table">
                 <tr>
                      <th>新しいパスワード</th>
                      <td>
                         <?php echo $form['password']->renderError() ?>
                         <?php echo $form['password']->render(array('id'=>'password', 'maxlength'=>'20')) ?>
                      </td>
                 </tr>
             </table>
             <div class="btn">
             <input type="submit" name="back" value="一覧へ戻る" class="back" />
             <input type="submit" name="register" value="登録" class="next" />
             </div>
     </div>
