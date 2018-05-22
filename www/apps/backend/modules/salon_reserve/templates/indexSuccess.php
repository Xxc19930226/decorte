<script src="/admin/js/jquery.biggerlink.js" type="text/javascript"></script>
<link href="/admin/css/reserve.css" rel="stylesheet">
<script src="/admin/js/reserve.js" type="text/javascript"></script>


<script type="text/javascript">
$(document).ready(function() {
	$('.bl').biggerlink();
});
</script>

<h1>予約希望一覧</h1>
<div class="page">
    <?php include_partial('global/pager', array('pager' => $pager)) ?>
</div>
<table cellpadding="0" cellspacing="1" class="stripe-table">
     <tr>
           <th class="result_date bl">受信日時
                <?php if ($sf_request->getParameter('sort') == 'create_asc'): ?>
                <?php echo link_to(image_tag('reserve/button_sortLower.gif', array('alt' => '▲')), 'salon_reserve_list', $filters->buildHttpQueryValues(array('sort' => 'create_desc', 'page' => 1))) ?>
                <?php else : ?>
                <?php echo link_to(image_tag('reserve/button_sortHigher.gif', array('alt' => '▼')), 'salon_reserve_list', $filters->buildHttpQueryValues(array('sort' => 'create_asc', 'page' => 1))) ?>
                <?php endif ?>
           </th>
           <th class="bl">希望店舗
                 <?php if ($sf_request->getParameter('sort') == 'shop_asc'): ?>
                 <?php echo link_to(image_tag('reserve/button_sortLower.gif', array('alt' => '▲')), 'salon_reserve_list', $filters->buildHttpQueryValues(array('sort' => 'shop_desc', 'page' => 1))) ?>
                 <?php else : ?>
                 <?php echo link_to(image_tag('reserve/button_sortHigher.gif', array('alt' => '▼')), 'salon_reserve_list', $filters->buildHttpQueryValues(array('sort' => 'shop_asc', 'page' => 1))) ?>
                 <?php endif ?>
           </th>
           <th class="result_no bl">会員ID
                 <?php if ($sf_request->getParameter('sort') == 'mid_asc'): ?>
                 <?php echo link_to(image_tag('reserve/button_sortLower.gif', array('alt' => '▲')), 'salon_reserve_list', $filters->buildHttpQueryValues(array('sort' => 'mid_desc', 'page' => 1))) ?>
                 <?php else : ?>
                 <?php echo link_to(image_tag('reserve/button_sortHigher.gif', array('alt' => '▼')), 'salon_reserve_list', $filters->buildHttpQueryValues(array('sort' => 'mid_asc', 'page' => 1))) ?>
                 <?php endif ?>
           </th>
           <th class="result_mail bl">メールアドレス
                 <?php if ($sf_request->getParameter('sort') == 'email_asc'): ?>
                 <?php echo link_to(image_tag('reserve/button_sortLower.gif', array('alt' => '▲')), 'salon_reserve_list', $filters->buildHttpQueryValues(array('sort' => 'email_desc', 'page' => 1))) ?>
                 <?php else : ?>
                 <?php echo link_to(image_tag('reserve/button_sortHigher.gif', array('alt' => '▼')), 'salon_reserve_list', $filters->buildHttpQueryValues(array('sort' => 'email_asc', 'page' => 1))) ?>
                 <?php endif ?>
           </th>
           <th class="result_name">氏名</th>
           <th class="result_name bl">メール返信
                 <?php if ($sf_request->getParameter('sort') == 'reply_asc'): ?>
                 <?php echo link_to(image_tag('reserve/button_sortLower.gif', array('alt' => '▲')), 'salon_reserve_list', $filters->buildHttpQueryValues(array('sort' => 'reply_desc', 'page' => 1))) ?>
                 <?php else : ?>
                 <?php echo link_to(image_tag('reserve/button_sortHigher.gif', array('alt' => '▼')), 'salon_reserve_list', $filters->buildHttpQueryValues(array('sort' => 'reply_asc', 'page' => 1))) ?>
                 <?php endif ?>
           </th>
           <th class="result_detail">予約希望内容</th>
     </tr> 
     <?php foreach ($pager->getResults() as $reserve) : ?>
     <tr>  
           <td class="center"><?php echo $reserve->getDateTimeObject('created_at')->format('Y/m/d H:i:s') ?></td>
           <td class="center"><?php echo $reserve['Shop'] ?></td>
           <td class="center"><?php echo $reserve['members_card_id'] ?></td>
           <td class="center"><?php echo $reserve['email'] ?></td>
           <td class="center"><?php echo $reserve['name_sei'] ?> <?php echo $reserve['name_mei'] ?></td>
           <td class="center"><span class="<?php if($reserve['reply']=='返信済') : ?>done<?php else :?>undone<?php endif; ?>"><?php echo $reserve['reply'] ?></span></td>
           <td class="center"><?php echo tag('input', array( 'class'=>'show', 'type'=>'button', 'value'=>'詳細','onclick' => 'location.href = "' . url_for('salon_reserve_show', $reserve) . '"'), true) ?></td>
     </tr>
     <?php endforeach ?>
</table>
<div class="page">
    <?php include_partial('global/pager', array('pager' => $pager)) ?>
</div>
