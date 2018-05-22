<div class="pager_wrapper">
	<?php if ($pager->haveToPaginate()): ?>
		<ul class="pager">
			<li>
				<?php if ($pager->isFirstPage()): ?>
					&lt;&lt;
				<?php else: ?>
					<?php if (isset($subject)): ?>
						<?php echo link_to('&lt;&lt;', array('sf_route' => $sf_context->getRouting()->getCurrentRouteName(), 'sf_subject' => $subject), array('query_string' => 'page=1')) ?>
					<?php else: ?>
						<?php echo link_to('&lt;&lt;', array('sf_route' => $sf_context->getRouting()->getCurrentRouteName()), array('query_string' => 'page=1')) ?>
					<?php endif ?>
				<?php endif ?>
			</li>
			<li>
				<?php if ($pager->isFirstPage()): ?>
					&lt;
				<?php else: ?>
					<?php if (isset($subject)): ?>
						<?php echo link_to('&lt;', array('sf_route' => $sf_context->getRouting()->getCurrentRouteName(), 'sf_subject' => $subject), array('query_string' => 'page=' . max(1, $pager->getPage() - 1))) ?>
					<?php else: ?>
						<?php echo link_to('&lt;', array('sf_route' => $sf_context->getRouting()->getCurrentRouteName()), array('query_string' => 'page=' . max(1, $pager->getPage() - 1))) ?>
					<?php endif ?>
				<?php endif ?>
			</li>
			<?php foreach ($pager->getLinks(10) as $page): ?>
				<?php if ($page == $pager->getPage()): ?>
					<li class="current_page"><?php echo $page ?></li>
				<?php else: ?>
					<li>
						<?php if (isset($subject)): ?>
							<?php echo link_to($page, array('sf_route' => $sf_context->getRouting()->getCurrentRouteName(), 'sf_subject' => $subject), array('query_string' => 'page=' . $page)) ?>
						<?php else: ?>
							<?php echo link_to($page, array('sf_route' => $sf_context->getRouting()->getCurrentRouteName()), array('query_string' => 'page=' . $page)) ?>
						<?php endif ?>
					</li>
				<?php endif ?>
			<?php endforeach ?>
			<li>
				<?php if ($pager->isLastPage()): ?>
					&gt;
				<?php else: ?>
					<?php if (isset($subject)): ?>
						<?php echo link_to('&gt;', array('sf_route' => $sf_context->getRouting()->getCurrentRouteName(), 'sf_subject' => $subject), array('query_string' => 'page=' . min($pager->getLastPage(), $pager->getPage() + 1))) ?>
					<?php else: ?>
						<?php echo link_to('&gt;', array('sf_route' => $sf_context->getRouting()->getCurrentRouteName()), array('query_string' => 'page=' . min($pager->getLastPage(), $pager->getPage() + 1))) ?>
					<?php endif ?>
				<?php endif ?>
			</li>
			<li>
				<?php if ($pager->isLastPage()): ?>
					&gt;&gt;
				<?php else: ?>
					<?php if (isset($subject)): ?>
						<?php echo link_to('&gt;&gt;', array('sf_route' => $sf_context->getRouting()->getCurrentRouteName(), 'sf_subject' => $subject), array('query_string' => 'page=' . $pager->getLastPage())) ?>
					<?php else: ?>
						<?php echo link_to('&gt;&gt;', array('sf_route' => $sf_context->getRouting()->getCurrentRouteName()), array('query_string' => 'page=' . $pager->getLastPage())) ?>
					<?php endif ?>
				<?php endif ?>
			</li>
		</ul>
	<?php endif ?>
	<p class="paging_result"><?php if ($pager->haveToPaginate()): ?>(<?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?>)<?php endif ?>(件数：<?php echo $pager->count() ?>件)</p>
</div>
