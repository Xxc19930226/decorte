<h1>メール宛先グループ<?php if ($group->isNew()): ?>新規作成<?php else: ?>編集<?php endif ?></h1>

<?php echo tag('form', array('action' => url_for('mail_group_confirm'), 'method' => 'post'), true) ?>
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
	</table>

	<ul class="submit">
		<li><input name="modify" type="submit" value="修正する" /></li>
		<li><input name="register" type="submit" value="登録する" /></li>
	</ul>
</form>
