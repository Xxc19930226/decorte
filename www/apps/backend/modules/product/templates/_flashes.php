<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice"><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></div>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="error"><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></div>
<?php endif; ?>

<?php for ($i = 1; ; $i++): ?>
  <?php if ($sf_user->hasFlash('error' . $i)): ?>
    <div class="error"><?php echo __($sf_user->getFlash('error' . $i), array(), 'sf_admin') ?></div>
  <?php else: ?>
    <?php break ?>
  <?php endif; ?>
<?php endfor ?>
