<?php echo tag('form', array('action' => $sf_request->getPathInfoPrefix() . $sf_request->getPathInfo(), 'method' => 'post'), true) ?>
	<?php echo $form->renderHiddenFields() ?>
	<div id="login">
		<table>
			<tr><td id="error_messages" colspan="2">
				<?php if ($form->hasErrors()): ?>
					ユーザ名またはパスワードがちがいます。
					<script type="text/javascript">
						$('#error_messages').fadeIn().fadeOut().fadeIn().fadeOut().fadeIn();
					</script>
				<?php endif ?>
			</td></tr>
			<tr><th>ユーザ名</th><td><?php echo $form['user_name']->render() ?></td></tr>
			<tr><th>パスワード</th><td><?php echo $form['password']->render() ?></td></tr>
			<tr><td id="submit" colspan="2"><input type="submit" name="submit" value="ログイン" /></td></tr>
		</table>
	</div>
</form>
<script type="text/javascript">
	$('#container').css('background-color', '#333');
</script>
