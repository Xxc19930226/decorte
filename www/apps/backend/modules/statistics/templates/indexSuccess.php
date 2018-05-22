<?php use_stylesheet('/sfDoctrinePlugin/css/default.css') ?>
<div id="sf_admin_container">
	<h1>統計情報</h1>
	<div id="sf_admin_content">
		<div class="sf_admin_list">
			<table id="statistics" cellspacing="0">
				<thead>
					<th>年月</th>
					<th>操作</th>
				</thead>
				<tbody>
					<?php foreach ($dates as $date): ?>
						<tr>
							<td><?php echo $date['yyyy'] ?>年<?php echo $date['mm'] ?>月</td>
							<td><ul class="sf_admin_td_actions">
								<li><?php echo link_to('ダウンロード', 'statistics_download', array('yyyy' => $date['yyyy'], 'mm' => $date['mm'])) ?></li>
							</ul></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
