<h1>配信メール<?php if ($form->getObject()->isNew()): ?>新規作成<?php else: ?>編集<?php endif ?></h1>

<?php echo $form->renderFormTag(url_for('mail_input')) ?>
	<table id="mail" class="line">
		<?php echo $form ?>
	</table>

	<ul class="submit">
		<li><input type="submit" value="確認画面へ進む" /></li>
	</ul>
</form>
