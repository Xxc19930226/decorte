<link href="/admin/css/reserve.css" rel="stylesheet">
<script src="/admin/js/reserve.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function() {
    switch_shop_id();

    $('input[name="admin_user[credentials]"]:radio').change(function() {
      switch_shop_id();
    });
  });

  function switch_shop_id ()
  {
    if ($('#admin_user_credentials_2').prop('checked')) {
      $('#admin_user_shop_id').removeAttr("disabled");
      $('.shop_id_msg').show();
    } else {
      $('#admin_user_shop_id').attr('disabled', 'disabled');
      $('.shop_id_msg').hide();
    }
  }
</script>

<h1>新規登録</h1>
        <?php echo $form->renderFormTag(url_for('salon_login_new')) ?>
        <?php echo $form->renderHiddenFields() ?>
        <?php if ($form->hasGlobalErrors()) : ?>
            <?php echo $form->renderGlobalErrors() ?>
        <?php endif ?>
    <div class="detail">
            <table cellpadding="0" cellspacing="1" class="stripe-table">
                 <tr>
                      <th>ユーザ名<strong>（必須入力）</strong></th>
                      <td>
                         <?php if ($hasError) : ?>
                            <ul class="error_list">
                                <li>ユーザ名は既に登録されています。</li>
                            </ul> 
                         <?php endif; ?> 
                         <?php echo $form['user_name']->renderError() ?>
                         <?php echo $form['user_name']->render(array('id'=>'user_name', 'maxlength'=>'16')) ?>
                      </td>
                 </tr>
                 <tr>
                      <th>パスワード<strong>（必須入力）</strong></th>
                      <td><?php echo $form['password']->renderError() ?><?php echo $form['password']->render(array('id'=>'user_name', 'maxlength'=>'20')) ?></td>
                 </tr>
                 <tr>
                      <th>権限<strong>（必須入力）</strong></th>
                      <td><?php echo $form['credentials']->renderError() ?><?php echo $form['credentials']->render() ?></td>
                 </tr>
                 <tr>
                      <th>所属店舗<strong class="shop_id_msg">（必須入力）</strong></th>
                      <td><div class="shop_id_msg"><?php echo $form['shop_id']->renderError() ?></div><?php echo $form['shop_id']->render() ?></td>
                 </tr>
             </table>
             <div class="btn">
             <input type="submit" name="back" value="一覧へ戻る" class="back" />
             <input type="submit" name="register" value="登録" class="next" />
             </div>
     </div>
