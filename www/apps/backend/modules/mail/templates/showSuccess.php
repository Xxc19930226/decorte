<h1>配信メール詳細</h1>

<ul class="operations">
	<li><?php echo link_to('編集', 'mail_edit', $mail) ?></li>
	<li><?php echo link_to('削除', 'mail_delete', $mail, 'confirm=このメールを削除してよろしいですか?') ?></li>
</ul>

<h2>基本情報</h2>

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
		<td><?php echo $mail['Author']['name_address'] ?></td>
	</tr>
	<tr>
		<th>宛先グループ</th>
		<td><?php echo link_to($mail['Group']['name'], 'mail_group_show', $mail['Group']) ?></td>
	</tr>
	<tr>
		<th>配信対象</th>
		<td><?php echo $mail['address_type'] ?></td>
	</tr>
	<tr>
		<th>配信件数</th>
		<td>
			<?php if ($mail['status'] != '未送信'): ?>
				<?php echo $mail['Logs']->count() ?>件
			<?php endif ?>
		</td>
	</tr>
	<tr>
		<th>配信日時</th>
		<td><?php echo $mail['delivered_at'] ?></td>
	</tr>
	<tr>
		<th>状態</th>
		<td><?php echo $mail['status'] ?></td>
	</tr>
	<tr>
		<th>作成日時</th>
		<td><?php echo $mail['created_at'] ?></td>
	</tr>
	<tr>
		<th>配信日時</th>
		<td><?php echo $mail['updated_at'] ?></td>
	</tr>
</table>

<h2>配信済みメールアドレス一覧</h2>

<?php if ($pager->count() > 0): ?>
	<?php include_partial('global/pager', array('pager' => $pager)) ?>

	<table class="line">
		<thead>
			<tr>
				<th>メールアドレス</th>
				<th>配信日時</th>
			</tr>
		</thead>
		<?php foreach ($pager->getResults() as $log): ?>
			<tbody>
				<tr>
					<td><?php echo $log['address'] ?></td>
					<td><?php echo $log['created_at'] ?></td>
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>

	<?php include_partial('global/pager', array('pager' => $pager)) ?>
<?php else: ?>
	<p>配信済みのメールアドレスはありません。</p>
<?php endif ?>
