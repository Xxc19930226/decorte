<h1>メール宛先グループ詳細</h1>

<ul class="operations">
	<li><?php echo link_to('編集', 'mail_group_edit', $group) ?></li>
	<li><?php echo link_to('削除', 'mail_group_delete', $group, 'confirm=このグループを削除してよろしいですか?') ?></li>
</ul>

<h2>基本情報</h2>

<table id="mail_group" class="line">
	<tr>
		<th>グループ名</th>
		<td><?php echo $group['name'] ?></td>
	</tr>
	<?php foreach ($group['Logics'] as $idx => $logic): ?>
		<tr>
			<th>抽出条件<?php echo $idx + 1 ?></th>
			<td>
				<?php echo $logic['operator_expression'] ?>
				<ul class="logic_list">
					<?php foreach ($logic['Terms'] as $term): ?>
						<li>
							<?php echo $term['column_name_expression'] ?>
							が
							<?php echo $term['value'] ?>
							<?php echo $term['operator_expression'] ?>
					<?php endforeach ?>
				</ul>
			</td>
		</tr>
	<?php endforeach ?>
	<tr>
		<th>作成日時</th>
		<td><?php echo $group['created_at'] ?></td>
	</tr>
	<tr>
		<th>更新日時</th>
		<td><?php echo $group['updated_at'] ?></td>
	</tr>
</table>

<h2>グループ内会員一覧</h2>

<?php if ($pager->count() > 0): ?>
	<?php include_partial('global/pager', array('pager' => $pager, 'subject' => $group)) ?>

	<table class="line link">
		<thead>
			<tr>
				<th>名前</th>
				<th>PCメールアドレス</th>
				<th>モバイルメールアドレス</th>
				<th class="date_time">入会日時</th>
			</tr>
		</thead>
		<?php foreach ($pager->getResults() as $member): ?>
			<tbody>
				<tr>
					<td><?php echo $member['name_sei'] ?>&nbsp;<?php echo $member['name_mei'] ?></td>
					<td><?php echo $member['mail_pc'] ?></td>
					<td><?php echo $member['mail_mobile'] ?></td>
					<td><?php echo $member['created_at'] ?></td>
				</tr>
			</tbody>
		<?php endforeach ?>
	</table>

	<?php include_partial('global/pager', array('pager' => $pager, 'subject' => $group)) ?>
<?php else: ?>
	<p>グループメンバーは存在しません。</p>
<?php endif ?>
