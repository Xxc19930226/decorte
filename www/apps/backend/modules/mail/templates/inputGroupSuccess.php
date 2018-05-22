<h1>メール宛先グループ<?php if ($form->getObject()->isNew()): ?>新規作成<?php else: ?>編集<?php endif ?></h1>

<?php echo $form->renderFormTag(url_for('mail_group_input')) ?>
	<?php //echo $form->renderHiddenFields() ?>
	<?php echo $form['_csrf_token']->render() ?>
	<table id="mail_group" class="line">
		<tr>
			<th><?php echo $form['name']->renderLabel() ?></th>
			<td>
				<?php echo $form['name']->renderError() ?>
				<?php echo $form['name']->render() ?>
			</td>
		</tr>
		<?php foreach($form['logics'] as $logic_idx => $logic_form): ?>
			<?php include_partial('mailGroupLogic', array('idx' => $logic_idx, 'form' => $logic_form)) ?>
		<?php endforeach ?>
	</table>
	<p><button class="logic_add" type="button" onclick="add_logic()">抽出条件追加</button></p>

	<ul class="submit">
		<li><input type="submit" value="確認画面へ進む" /></li>
	</ul>
</form>

<?php echo javascript_tag() ?>
	var logic_count = <?php echo $logic_count ?>;
	var term_counts = new Array();

    <?php foreach ($term_counts as $idx => $term_count): ?>
		term_counts[<?php echo $idx ?>] = <?php echo $term_count ?>;
	<?php endforeach ?>

	function add_logic() {
		var r = jQuery.ajax({
			type: 'GET',
			url: '<?php echo url_for('mail_group_logic_add') ?>' + '?logic_idx=' + logic_count,
			async: false
		}).responseText;
		term_counts[logic_count] = 0;
		logic_count++;
		$('#mail_group').append(r);
	}

	function add_term(button, logic_idx) {
		var r = jQuery.ajax({
			type: 'GET',
			url: '<?php echo url_for('mail_group_logic_term_add') ?>' + '?logic_idx=' + logic_idx + '&term_idx=' + term_counts[logic_idx],
			async: false
		}).responseText;
		term_counts[logic_idx]++;
		$(button).parent().parent().find('div.term_container').append(r);
	}

    function remove_term(button) {
		$(button).parent().parent().remove();
    }
<?php end_javascript_tag() ?>
