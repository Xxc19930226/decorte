<link href="/admin/css/reserve.css" rel="stylesheet">
<script src="/admin/js/reserve.js" type="text/javascript"></script>


<h1>ログイン管理一覧</h1>
<p class="text"><input type="button" value="新規登録" class="btn" onclick="location.href='<?php echo url_for('salon_login_new') ?>'"></p>
<div class="page">
    <?php include_partial('global/pager', array('pager' => $pager)) ?>
</div>
<table cellpadding="0" cellspacing="1" class="stripe-table">
     <tr>
           <th class="result_date">登録日時</th>
           <th class="result_name">ユーザ名</th>
           <th class="result_date">権限</th>
           <th class="result_date">所属店舗</th>
           <th class="result_date" colspan="3">編集</th>
     </tr>
     <?php foreach ($pager->getResults() as $result) : ?>
     <tr>
           <td class="center"><?php echo $result->getDateTimeObject('created_at')->format('Y/m/d') ?></td>
           <td class="center"><?php echo $result['user_name'] ?></td>
           <td class="center"><?php if (strstr($result['credentials'], "salonadmin")) echo "管理者"; else echo "店舗スタッフ";  ?></td>
           <td class="center"><?php echo $result['Shop'] ?></td>
           <td class="center"><?php echo tag('input', array( 'class'=>'show', 'type'=>'button', 'value'=>'権限変更','onclick' => 'location.href = "' . url_for('salon_login_show_cre', $result) . '"'), true) ?></td>
           <td class="center"><?php echo tag('input', array( 'class'=>'show', 'type'=>'button', 'value'=>'パスワード変更','onclick' => 'location.href = "' . url_for('salon_login_show_pass', $result) . '"'), true) ?></td>
           <td class="center"><?php echo tag('input', array( 'class'=>'show', 'type'=>'button', 'value'=>'削除','onclick' => 'if(!showConfirm()) return false; location.href = "' . url_for('salon_login_del', $result) . '"'),  true) ?></td>
     </tr>
     <?php endforeach ?>
</table>

<div class="page">
    <?php include_partial('global/pager', array('pager' => $pager)) ?>
</div>
<script type="text/JavaScript">
<!--
function showConfirm() {
    return confirm('削除しますがよろしいですか？')
}
//-->
</script>

