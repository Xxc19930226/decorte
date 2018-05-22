<link href="/admin/css/reserve.css" rel="stylesheet">
<script src="/admin/js/reserve.js" type="text/javascript"></script>

<h1>権限の変更</h1>
        <?php echo $form->renderFormTag(url_for('salon_login_cre')) ?>
        <?php echo $form->renderHiddenFields() ?>
        <?php if ($form->hasGlobalErrors()) : ?>
            <?php echo $form->renderGlobalErrors() ?>
        <?php endif ?>
    <?php if($regist_flag) : ?>
         <p class="text"><strong class="complete">権限の変更が完了しました</strong></p>
    <?php endif; ?>

     <div class="detail">
            <table cellpadding="0" cellspacing="1" class="stripe-table">
                 <tr>
                      <th>権限</th>
                      <td><?php echo $form['credentials']->renderError() ?><?php echo $form['credentials']->render() ?></td>
                 </tr>
             </table>
             <div class="btn">
             <input type="submit" name="back" value="一覧へ戻る" class="back" />
             <input type="submit" name="" value="変更" class="next" />
             </div>
     </div>
