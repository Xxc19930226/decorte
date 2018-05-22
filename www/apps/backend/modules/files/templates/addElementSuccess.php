<?php decorate_with(false) ?>

<ul class="filetree">
	<?php foreach ($files as $file): ?>
		<?php echo tag('li', array('class' => 'removable ' . (preg_match('/\/$/', $file) ? 'directory' : 'file ' . 'ext_' . preg_replace('/^.*\./', '', $file))), true) ?>
			<a href="#" rel="<?php echo $file ?>"><?php echo $file ?></a>
		</li>
	<?php endforeach ?>
</ul>

<script type="text/javascript">
	$('.removable').draggable({
		revert: 'invalid',
		helper: 'clone'
	});
</script>
