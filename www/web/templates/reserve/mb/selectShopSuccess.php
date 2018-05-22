<?php slot('title', 'WEB—\–ñE‚¨–â‚¢‡‚í‚¹') ?>
<img src="/images/mb/common/spacer.gif" height="8" alt="" />
<div style="text-align:left; background-color:#000000; padding:3px;">
<span style="font-size:large; color:#FFFFFF;">WEB—\–ñE‚¨–â‚¢‡‚í‚¹</span>
</div>
<br />
<?php echo $form->renderFormTag(url_for('reserve_shop')) ?>
<?php echo $form->renderHiddenFields() ?>
<div style="text-align:left; font-size:x-small;">
Ÿ‚¨‹q‚³‚Üî•ñ<br />
<br />
¥‚²Šó–]“X•Ü<span style="color:#FF0000;">¦</span><br />
<?php echo $form['shop_id']->render() ?>
<?php if ($form['shop_id']->hasError()) : ?><br />
 <span style="color:#FF0000;"><?php echo $form['shop_id']->getError() ?></span><br />
<?php endif ?>
<br />
<br />
<input style="font-size:x-small;" type="submit" value="ŽŸ‚Öi‚Þ" />
<br />
<br />
<br />
</div>
