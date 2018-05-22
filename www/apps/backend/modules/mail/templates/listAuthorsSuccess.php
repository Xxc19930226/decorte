<h1>メール差出人一覧</h1>

<?php if ($pager->count() > 0): ?>
	<?php include_partial('global/pager', array('pager' => $pager)) ?>

	<table id="mail_author_list" class="line">
		<thead>
			<tr>
				<th class="mail_author_name">差出人名</th>
				<th class="mail_author_address">メールアドレス</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pager->getResults() as $author): ?>
				<tr>
					<td class="mail_author_name"><?php echo $author['name'] ?></td>
					<td class="mail_author_address"><?php echo $author['address'] ?></td>
					<td class="operations">
						<?php echo link_to('削除', 'mail_author_delete', $author, 'confirm=『' . $author['name_address'] . '』を削除してよろしいですか?') ?>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>

	<?php include_partial('global/pager', array('pager' => $pager)) ?>
<?php else: ?>
	<p>登録済みの差出人はありません。</p>
<?php endif ?>

<p class="description">新規登録するアドレスを入力してください。</p>

<?php echo $form->renderFormTag(url_for('mail_authors_list')) ?>
	<?php echo $form->renderHiddenFields() ?>
	<table id="mail_author" class="line">
		<thead>
			<tr>
				<th class="mail_author_name"><?php echo $form['name']->renderLabel() ?></th>
				<th class="mail_author_address"><?php echo $form['address']->renderLabel() ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="mail_author_name">
					<?php echo $form['name']->renderError() ?>
					<?php echo $form['name']->render() ?>
				</td>
				<td class="mail_author_address">
					<?php echo $form['address']->renderError() ?>
					<?php echo $form['address']->render() ?>
				</td>
			</tr>
		</tbody>
	</table>

	<ul class="submit">
		<li><input type="submit" value="登録する" /></li>
	</ul>
</form>
