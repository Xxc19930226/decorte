<?php slot('title', 'WEB�\��E���₢���킹') ?>
<img src="/images/mb/common/spacer.gif" height="8" alt="" />
<div style="text-align:left; background-color:#000000; padding:3px;">
<span style="font-size:large; color:#FFFFFF;">WEB�\��E���₢���킹</span>
</div>
<br />
<?php echo $form->renderFormTag(url_for('reserve_input')) ?>
<?php echo $form->renderHiddenFields() ?>
<div style="text-align:left; font-size:x-small;">
�����q���܏��<br />
<br />
������]�X��<span style="color:#FF0000;">��</span><br />
<?php echo $shop ?><br />
<br />
�����X��<span style="color:#FF0000;">��</span><br />
<?php echo $form['visit']->render() ?>
<?php if ($form['visit']->hasError() && $has_error) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['visit']->getError() ?></span><br />
<?php endif ?>
<br />
<br />
�����ID<br />
���p�����ł����͂��������<br />
<?php echo $form['members_card_id']->render(array('id'=>'members_card_id', 'maxlength'=>'30', 'istyle'=>'1', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;')) ?>
<?php if ($form['members_card_id']->hasError() && $has_error) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['members_card_id']->getError() ?></span>
<?php endif ?>
<br />
<br />
�����X���ɔ��s���ꂽ���ް�޶��ނ̗��ʂɋL�ڂ��Ă���܂��<br />
���͂����Ɨ\�񂪽Ѱ�ނł��<br />
<br />
<br />
�������O<span style="color:#FF0000;">��</span><br />
�L����F ���� �Ԏq<br />
�� <?php echo $form['name_sei']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'name_sei', 'maxlength'=>'20', 'size'=>'7', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;') : array('id'=>'name_sei', 'maxlength'=>'20', 'size'=>'7', 'istyle'=>'1')) ?><br />
�� <?php echo $form['name_mei']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'name_mei', 'maxlength'=>'20', 'size'=>'7', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;') : array('id'=>'name_mei', 'maxlength'=>'20', 'size'=>'7', 'istyle'=>'1')) ?><br />
<span style="color:#FF0000;">
<?php if ($form['name_sei']->hasError() && $has_error) : ?>
<?php echo $form['name_sei']->getError() ?><br />
<?php elseif ($form['name_mei']->hasError() && $has_error) : ?>
<?php echo $form['name_mei']->getError() ?><br />
<?php endif ?>
</span>
<br />
���ӂ肪��<span style="color:#FF0000;">��</span><br />
�L����F ���΂₵ �͂Ȃ�<br />
���� <?php echo $form['name_sei_kana']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'name_sei_kana', 'maxlength'=>'20', 'size'=>'13', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;') : array('id'=>'name_sei_kana', 'maxlength'=>'20', 'size'=>'13', 'istyle'=>'1')) ?><br />
�߂� <?php echo $form['name_mei_kana']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'name_mei_kana', 'maxlength'=>'20', 'size'=>'13', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;') : array('id'=>'name_mei_kana', 'maxlength'=>'20', 'size'=>'13', 'istyle'=>'1')) ?><br />
 <span style="color:#FF0000;">
<?php if ($form['name_sei_kana']->hasError() && $has_error) : ?>
<?php echo $form['name_sei_kana']->getError() ?><br />
<?php elseif ($form['name_sei_kana']->hasError() && $has_error) : ?>
<?php echo $form['name_mei_kana']->getError() ?><br />
<?php endif ?>
</span>
<br />
�����N��<br />
<?php echo $form['age']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'age', 'maxlength'=>'2', 'size'=>'3', 'style'=>'-wap-input-format:&quot;*&lt;ja:n&gt;&quot;') : array('id'=>'age', 'maxlength'=>'2', 'size'=>'3', 'istyle'=>'4')) ?>��
<?php if ($form['age']->hasError() && $has_error) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['age']->getError() ?></span><br />
<?php endif ?>
<br />
<br />
�����Z�� <br />
�L����F �����s�����搼���{��3-6-2 ���{���ݼ�� 103����<br />
<?php echo $form['address']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'address', 'maxlength'=>'255', 'style'=>'-wap-input-format:&quot;*&lt;ja:h&gt;&quot;') : array('id'=>'address', 'maxlength'=>'255', 'istyle'=>'1')) ?>
<?php if ($form['address']->hasError() && $has_error) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['address']->getError() ?></span>
<?php endif ?>
<br />
<br />
�����d�b�ԍ� <span style="color:#FF0000;">��</span><br />
���p�����ł����͂�������� <br />�L����: 0000000000<br />
<?php echo $form['tel']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('size'=>'13', 'maxlength'=>'13', 'style'=>'-wap-input-format:&quot;*&lt;ja:n&gt;&quot;') : array('size'=>'13', 'maxlength'=>'13', 'istyle'=>'4')) ?>
<span style="color:#FF0000;"><?php echo $form['tel']->getError() ?></span>
<br />
<br />
�O���ɂ��\��̊m�F�͂��d�b�ō����グ�܂��<br />
���d�b���Ȃ���Ȃ��ꍇ�ͤ����ԓd�b�܂��ͤҰقɂĂ��A���������܂��<br />
<br />
<br />
��Ұٱ��ڽ<span style="color:#FF0000;">��</span><br />
<?php echo $form['email']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'email', 'maxlength'=>'255', 'style'=>'-wap-input-format:&quot;*&lt;ja:en&gt;&quot;') : array('id'=>'email', 'maxlength'=>'255', 'istyle'=>'3')) ?>
<?php if ($form['email']->hasError() && $has_error) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['email']->getError() ?></span>
<?php endif ?>
<br />
<br />
��Ұٱ��ڽ(�m�F�p)<span style="color:#FF0000;">��</span><br />
�m�F�̂��߂�����x�����͂��������<br />
<?php echo $form['email2']->render($_SERVER["HTTP_X_C3_BROWSER_CARRIER"] == 1 ? array('id'=>'email2', 'maxlength'=>'255', 'style'=>'-wap-input-format:&quot;*&lt;ja:en&gt;&quot;') : array('id'=>'email2', 'maxlength'=>'255', 'istyle'=>'3')) ?>
 <span style="color:#FF0000;">
<?php if ($form['email2']->hasError() && $has_error) : ?><br />
<?php echo $form['email2']->getError() ?>
<?php endif ?>
</span>
<br />
<br />
������]����<span style="color:#FF0000;">��</span><br />
��1��]��<br />
<?php echo $form['hope_date1']->render(array('id'=>'hope_date1')) ?> <?php echo $form['hope_time1']->render(array('id'=>'hope_time1')) ?><br />
<br />
��2��]��<br />
<?php echo $form['hope_date2']->render(array('id'=>'hope_date2')) ?> <?php echo $form['hope_time2']->render(array('id'=>'hope_time2')) ?><br />
<br />
��3��]��<br />
<?php echo $form['hope_date3']->render(array('id'=>'hope_date3')) ?> <?php echo $form['hope_time3']->render(array('id'=>'hope_time3')) ?>
<?php if ($form['hope_date1']->hasError() && $has_error) : ?><br />
<span style="color:#FF0000;"><?php echo $form['hope_date1']->getError() ?></span><br />
<?php endif ?>
<?php if ($form['hope_date2']->hasError() && $has_error) : ?><br />
<span style="color:#FF0000;"><?php echo $form['hope_date2']->getError() ?></span><br />
<?php endif ?>
<?php if ($form['hope_date3']->hasError() && $has_error) : ?><br />
<span style="color:#FF0000;"><?php echo $form['hope_date3']->getError() ?></span><br />
<?php endif ?>
<br />
<br />
����]�������Ȃ�ׂ�3�����͂��������<br />
�{������3���Ȍ�60���ȓ��̓����ŏ���܂��<br />
���Ԏw�褒S���Ҏw���Ȃǂ�����܂����礉��L�̢���ӌ�����v�]�Ȃǣ�ɂ��L�����������<br />
<br />
����ݾ�ݸނ₨���ւ�����Ҳ��Ȃǂ��܂ߤ�\��������׽30���`60���قǂ����Ԃ����������܂��<br />
�����Ԃɂ͗]�T�������Ă��\�񂢂��������Ƃ�����҂��Ă���܂��<br />
<br />
������]�̃��j���[<span style="color:#FF0000;">��</span><br />
<?php echo $form['menu']->render(array('id'=>'menu')) ?>
<?php if ($form['menu']->hasError() && $has_error) : ?><br />
<span style="color:#FF0000;"><?php echo $form['menu']->getError() ?></span><br />
<?php endif ?>
<br />

����]���ƭ��Ɠ����̶�ݾ�ݸނ̏�A���肢�����܂��B<br />
����]�̵�߼�݂�����܂�����A���L�́u���ӌ��E���v�]�Ȃǁv���ɂ��L�������������A�������\�������������B
<br />
<br />
�����T�C�g���ǂ����<br>���m��ɂȂ��܂������H<br />
<?php echo $form['know']->render(array('id'=>'know')) ?>
<?php if ($form['know']->hasError() && $has_error) : ?><br />
<span style="color:#FF0000;"><?php echo $form['know']->getError() ?></span><br />
<?php endif ?>
<br />
<br />
�����ӌ��E���v�]�Ȃ�<br />
<?php echo $form['request']->render(array('maxlength'=>'500')) ?><br />
<span style="color:#FF0000;">
<?php if ($form['request']->hasError() && $has_error) : ?>
<?php echo $form['request']->getError() ?><br />
<?php endif ?>
</span>
<br />
<br />
���l���̎戵���ɂ���<br />
�u�l���̎�舵���ɂ��āv�ɂ����ӂ��������܂����牺�L�̢���ӂ��飂����������Ă������������͓��e�̊m�F����݂������Ă��������B<br />
<?php if ($form['agree']->hasError() && $has_error) : ?>
<span style="color:#FF0000;"><?php echo $form['agree']->getError() ?></span><br />
<?php endif ?>
<input name="salon_reserve[agree]" type="checkbox" value="1" id="salon_reserve_agree_1" />&nbsp;
<label for="salon_reserve_agree_1">���ӂ���</label>&nbsp;
<br />
<br />
<input style="font-size:x-small;" type="submit" name="next" value="���͓��e���m�F����" />
<br />
<input style="font-size:x-small;" type="submit" name="back" value="�X�܂�I��������" />
<br />
<br />
<br />
</div>
