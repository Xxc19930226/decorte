<?php decorate_with(false) ?>

<ul class="filetree" style="display: none;">
	<?php if ($dirs): ?>
		<?php foreach ($dirs as $dir): ?>
			<?php echo tag('li', array('class' => 'addable directory collapsed'), true) ?>
				<a href="#" rel="<?php echo $dir ?>/"><?php echo basename($dir) ?></a>
			</li>
		<?php endforeach ?>
	<?php endif ?>
	<?php if ($files): ?>
		<?php foreach ($files as $file): ?>
			<?php echo tag('li', array('class' => 'addable file ext_' . preg_replace('/^.*\./', '', $file)), true) ?>
				<a href="#" rel="<?php echo $file ?>"><?php echo basename($file) ?></a>
			</li>
		<?php endforeach ?>
	<?php endif ?>
</ul>

<script type="text/javascript">
	$('.addable').draggable({
		revert: 'invalid',
		helper: 'clone'
	});
</script>
