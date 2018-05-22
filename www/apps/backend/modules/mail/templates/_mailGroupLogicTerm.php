<ul class="logic_list">
	<?php if ($form->hasError()): ?>
		<li class="error">
			<?php if ($form['column_name']->hasError()): ?>
				<?php echo $form['column_name']->renderError() ?>
			<?php elseif ($form['value']->hasError()): ?>
				<?php echo $form['value']->renderError() ?>
			<?php elseif ($form['operator']->hasError()): ?>
				<?php echo $form['operator']->renderError() ?>
			<?php endif ?>
		</li>
	<?php endif ?>
	<li>
		<?php echo $form['column_name']->render() ?>
		が
		<?php echo $form['value']->render(array('class' => 'mail_group_logic_term_value')) ?>
		<?php echo $form['operator']->render() ?>
		<?php echo tag('button', array('class' => 'term_remove', 'type' => 'button', 'onclick' => 'remove_term(this)'), true) ?>削除</button>
	</li>
</ul>
