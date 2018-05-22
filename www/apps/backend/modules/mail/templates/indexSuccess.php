<h1>配信メール一覧</h1>

<ul class="operations">
	<li><?php echo link_to('新規作成', 'mail_new') ?></li>
</ul>

<?php include_partial('global/pager', array('pager' => $pager)) ?>

<table class="line link">
	<thead>
		<tr>
			<th>件名</th>
			<th>差出人</th>
			<th>宛先グループ</th>
			<th>配信対象</th>
			<th>配信件数</th>
			<th class="date_time">配信日時</th>
			<th>状態</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pager->getResults() as $mail): ?>
			<?php echo tag('tr', array('onclick' => 'location.href = "' . url_for('mail_show', $mail) . '"'), true) ?>
				<td><?php echo $mail['subject'] ?></td>
				<td><?php echo $mail['Author']['name'] ?></td>
				<td><?php echo $mail['Group']['name'] ?></td>
				<td><?php echo $mail['address_type'] ?></td>
				<td class="numeric">
					<?php if ($mail['status'] != '未送信'): ?>
						<?php echo $mail['Logs']->count() ?>件
					<?php endif ?>
				</td>
				<td><?php echo $mail['delivered_at'] ?></td>
				<td><?php echo $mail['status'] ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<?php include_partial('global/pager', array('pager' => $pager)) ?>
