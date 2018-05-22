<?php use_stylesheet('jqueryFileTree.css') ?>
<?php use_javascript('jqueryFileTree.js') ?>
<?php use_javascript('jquery-ui-1.9.2.custom.min.js') ?>

<script type="text/javascript">
	var item_count = 0;

	$(document).ready(function() {
		$('#files').fileTree({ script: '<?php echo url_for('files_tree') ?>', expandSpeed: 150, collapseSpeed: 150 }, function(file) {
		});
		$('#submit').submit(function() {
			if (confirm('本当に本番反映してもよろしいですか?')) {
				$.ajax({
					type: 'POST',
					url: '<?php echo url_for('files_liveup') ?>',
					success: function(data, type) {
						alert('本番反映が完了しました。');
						$('#updated_files').html(data);
						item_count = 0;
						$('#submit input').attr('disabled', 'disabled');
					}
				});
			}

			return false;
		});
	});
</script>

<style type="text/css">
p.explanation {
	margin: 1.0em 0;
}
div.files {
	background: none repeat scroll 0 0 #fff;
	border-color: #bbb #fff #fff #bbb;
	border-style: solid;
	border-width: 1px;
	overflow: scroll;
	width: 35.0em;
	height: 40.0em;
}
div#files {
	width: 30.0em;
	margin-right: 3.0em;
	float: left;
}
div#updated_files {
	width: 35.0em;
	margin-right: 3.0em;
	float: left;
}
div#trash {
}
form {
	margin-top: 1.0em;
}
</style>

<div id="sf_admin_container">
	<h1>ファイル管理</h1>
	<p class="explanation">本番反映するフォルダやディレクトリを右側のボックスにドラッグしてください。</p>
	<div style="overflow: hidden;">
		<div id="files" class="files"></div>
		<div id="updated_files" class="files"></div>
		<div id="trash"><img src="/admin/images/trash.png" /></div>
	</div>
	<form id="submit">
		<input type="submit" value="ドラッグしたファイルを本番反映" disabled="disabled" />
	</form>

	<script type="text/javascript">
		$('#updated_files').droppable({
			accept: '.addable',
			tolerance: 'fit',
			drop: function(e, ui) {
				$.ajax({
					type: 'POST',
					url: '<?php echo url_for('files_add') ?>',
					data: 'file=' + $('a', ui.draggable).attr('rel'),
					success: function(data, type) {
						if (data.indexOf('ユーザ名またはパスワードがちがいます') != -1) {
							location.reload();
						} else {
							$('#updated_files').html(data);
							item_count++;
							$('#submit input').removeAttr('disabled');
						}
					}
				});
			}
		});
		$('#trash').droppable({
			accept: '.removable',
			drop: function(e, ui) {
				$.ajax({
					type: 'POST',
					url: '<?php echo url_for('files_remove') ?>',
					data: 'file=' + $('a', ui.draggable).attr('rel'),
					success: function(data, type) {
						if (data.indexOf('ユーザ名またはパスワードがちがいます') != -1) {
							location.reload();
						} else {
							$('#updated_files').html(data);
							item_count--;
							if (item_count <= 0) {
								$('#submit input').attr('disabled', 'disabled');
							}
						}
					}
				});
			}
		});
	</script>
</div>
