<?php slot('title', 'WEB�\��E���₢���킹') ?>
<img src="/images/mb/common/spacer.gif" height="8" alt="" />
<div style="text-align:left; background-color:#000000; padding:3px;">
<span style="font-size:large; color:#FFFFFF;">WEB�\��E���₢���킹</span>
</div>
<img src="/images/mb/common/spacer.gif" height="8" alt="" />
<div style="text-align:left;">
<span style="font-size:x-small;">
�ȉ��̓��e�ł�낵���ł���?<br />
��낵����Τ�߰�މ��̢���M�������݂�د����Ă��������<br />
����M�������݂�د����Ē����܂����炨�₢���킹���������܂��</span></div>
<img src="/images/mb/common/spacer.gif" height="8" alt="" />
<?php echo tag('form', array('action' => url_for('reserve_confirm'), 'method' => 'post'), true) ?>
<div style="text-align:left; font-size:x-small;">
�����q���܏��<br />
<br />
������]�X��<br />
<?php echo $reserve['Shop'] ?>
<br />
<br />
�����X��<br />
<?php echo $reserve['visit']; ?>
<br />
<br />
�����ID<br />
<?php echo $reserve['members_card_id']; ?>
<br />
<br />
�������O<br />
<?php echo $reserve['name_sei']; ?>  <?php echo $reserve['name_mei']; ?>
<br />
<br />
���ӂ肪��<br />
<?php echo $reserve['name_sei_kana']; ?>  <?php echo $reserve['name_mei_kana']; ?>
<br />
<br />
�����N��<br />
<?php if ($reserve['age']) : ?>
<?php echo $reserve['age']; ?>��
<?php endif ?>
<br />
<br />
�����Z��<br />
<?php echo $reserve['address']; ?>
<br />
<br />
�����d�b�ԍ�<br />
<?php echo $reserve['tel']; ?>
<br />
<br />
��Ұٱ��ڽ<br />
<?php echo $reserve['email']; ?>
<br />
<br />
������]����<br />
��1��]��<br />
<?php echo $hope_date1; ?> <?php echo $reserve['hope_time1']; ?>
<?php if($hope_date2) : ?>
<br /><br />
��2��]��<br />
<?php echo $hope_date2; ?> <?php echo $reserve['hope_time2']; ?><?php endif ?>
<?php if($hope_date3) : ?>
<br /><br />
��3��]��<br />
<?php echo $hope_date3; ?> <?php echo $reserve['hope_time3']; ?><?php endif ?>
<br />
<br />
������]�̃��j���[<br />
<?php echo $menu; ?>
<br />
<br />
�����T�C�g���ǂ����<br />���m��ɂȂ��܂������H<br />
<?php if ($know !='���I�т�������') : ?><?php echo $know; ?><?php endif; ?>
<br />
<br />
�����ӌ��E���v�]�Ȃ�<br />
<?php echo $reserve['request']; ?>
<br />
<br />
<input style="font-size:x-small;" type="submit" name="register" value="���M����" />
<br />
<input style="font-size:x-small;" type="submit" name="modify" value="�C������" />
<br />
<br />
</div>
