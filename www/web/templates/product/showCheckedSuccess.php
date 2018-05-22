<?php if ($sf_user->countViewProducts()): ?>
<script type="text/javascript">
	$('img[title]').tooltip({
		effect: 'fade',
		fadeInSpeed: 600,
		fadeOutSpeed: 600,
		position: 'top right',
		offset: [-5, -30]
	});
</script>

	<img src="images/topBody/title_checklist.jpg" alt="最近チェックした商品" />
	<div class="checkBox">
		<ul>
			<?php foreach ($products as $product): ?>
				<li><div class="check">
					<?php echo link_to(image_tag(url_for('product_small_thumbnail', $product), array('alt' => $product['long_name'], 'title' => $product['long_name'])), 'product_show_by_slug', $product, array('class' => 'thickbox')) ?>
				</div></li>
			<?php endforeach ?>
		</ul>                    
	</div><!-- /.recomkBox -->
<?php endif ?>
