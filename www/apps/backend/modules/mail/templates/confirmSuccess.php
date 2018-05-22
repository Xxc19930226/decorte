<?php use_helper('Date') ?>

<h1>配信メール<?php if ($mail->isNew()): ?>新規作成<?php else: ?>編集<?php endif ?></h1>

<?php echo tag('form', array('action' => url_for('mail_confirm'), 'method' => 'post'), true) ?>
	<table id="mail" class="line">
		<tr>
			<th>件名</th>
			<td><?php echo $mail['subject'] ?></td>
		</tr>
		<tr>
			<th>本文</th>
			<td class="monospace"><?php echo nl2br($mail['body']) ?></td>
		</tr>
		<tr>
			<th>差出人</th>
			<td><?php echo $mail['Author']['name'] ?></td>
		</tr>
		<tr>
			<th>宛先グループ</th>
			<td><?php echo $mail['Group']['name'] ?></td>
		</tr>
		<tr>
			<th>配信日時</th>
			<td><?php echo format_date($mail['delivered_at'], 'yyyy年MM月dd日 HH時mm分') ?></td>
		</tr>
		<tr>
			<th>配信対象</th>
			<td><?php echo $mail['address_type'] ?></td>
		</tr>
	</table>

	<ul class="submit">
		<li><input name="modify" type="submit" value="修正する" /></li>
		<li><input name="register" type="submit" value="登録する" /></li>
	</ul>
</form>
