<div id="list_output_actions">
	<?php echo tag('form', array('action' => url_for('member_maillist_output'), 'method' => 'post'), true) ?>
		<input type="submit" name="list_pc" value="メール配信リスト(PC)を抽出" />
		<input type="submit" name="list_mobile" value="メール配信リスト(モバイル)を抽出" />
	</form>
</div>
