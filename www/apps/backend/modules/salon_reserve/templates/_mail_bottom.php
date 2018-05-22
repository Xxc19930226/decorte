<?php if ($form['mailtext2']->getValue()): ?>
<?php if ($form['mailtext2']->hasError()): ?>
<ul class="error_list"><li><?php echo $form['mailtext2']->getError() ?></li></ul>
<?php endif ?>
<?php echo $form['mailtext2']->render(array('id' => 'mailtext2')) ?>
<?php else: ?>
<pre><?php echo $mail_bottom ?></pre>
<?php echo jq_link_to_remote('編集する', array(
    'update' => 'mail_bottom',
    'url'    => 'salon_reserve_mailbottom_unlock'
)) ?>
<?php endif ?>
