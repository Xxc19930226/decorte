<?php if (count($products) > 0): ?>
	<div id="sideCheck">
		<div class="sidetitle"><img src="/images/side_title_checklist.gif" alt="最近チェックした商品" /></div>
		<div class="clearfix">
			<?php foreach ($products as $idx => $product): ?>
				<?php echo tag('p', ($idx % 3 == 2) ? array('class' => 'sideCheckLast') : array(), true) ?><?php echo link_to(image_tag(url_for('product_small_thumbnail', $product), array('title' => $product['long_name'], 'alt' => $product['long_name'])), 'product_show_by_slug', $product, array('class' => 'thickbox')) ?></p>
				<?php if ($idx % 3 == 2): ?>
		</div>
		<div class="clearfix">
				<?php endif ?>
			<?php endforeach ?>
		</div>
	</div><!-- /#sideCheck -->
<?php endif ?>
