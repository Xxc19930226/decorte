<h1>メール宛先グループ一覧</h1>

<ul class="operations">
	<li><?php echo link_to('新規作成', 'mail_group_new') ?></li>
</ul>

<?php include_partial('global/pager', array('pager' => $pager)) ?>

<table class="line link">
	<thead>
		<tr>
			<th>グループ名</th>
			<th>会員数</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($pager->getResults() as $group): ?>
			<?php echo tag('tr', array('onclick' => 'location.href = "' . url_for('mail_group_show', $group) . '"'), true) ?>
				<td><?php echo $group['name'] ?></td>
				<td class="numeric"><?php echo $group['Members']->count() ?></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<?php include_partial('global/pager', array('pager' => $pager)) ?>
