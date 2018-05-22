<tr>
	<th>抽出条件<?php echo $idx + 1 ?></th>
	<td>
		<?php echo $form['operator']->renderError() ?>
		<?php echo $form['operator']->render() ?>
		<div class="term_container">
			<?php foreach ($form['terms'] as $term_form): ?>
				<?php include_partial('mailGroupLogicTerm', array('form' => $term_form)) ?>
			<?php endforeach ?>
		</div>
		<p><?php echo tag('button', array('type' => 'button', 'onclick' => "add_term(this, $idx)"), true) ?>追加</button></p>
	</td>
</tr>
