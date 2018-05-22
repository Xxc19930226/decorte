<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
	<head>
        <title>COSME DECORTE</title>
		<?php include_http_metas() ?>
		<?php include_metas() ?>
		<?php include_title() ?>
		<link rel="shortcut icon" href="/favicon.ico" />
		<?php include_stylesheets() ?>
		<?php include_javascripts() ?>
		<style type="text/css">
			html {
				<?php if ($sf_request->getHost() == 'www.cosmedecorte.com'): ?>
					<?php if ($sf_user->hasCredential('salonadmin') || $sf_user->hasCredential('salonstaff')): ?>
						background-color: #dfdfdf;
					<?php else: ?>
						background-color: #ff8f8f;
					<?php endif ?>
				<?php else: ?>
					background-color: #dfdfdf;
				<?php endif ?>
			}
		</style>
        <meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1, user-scalable=no">
	</head>
	<body>
		<div id="container">
			<div id="header" class="clearfix">
                <?php if ($sf_user->hasCredential('salonadmin') || $sf_user->hasCredential('salonstaff')): ?>
                <p id="title">salon de beaute COSME DECORTE 予約管理 </p>
                <?php elseif ($sf_user->hasCredential('superadmin') || $sf_user->hasCredential('admin')) : ?>
				<p id="title">COSME DECORTE Administration <?php if ($sf_request->getHost() == 'www.cosmedecorte.com'): ?><span class="caution">（本番環境）</span><?php endif ?></p>
                <?php else : ?>
                <p id="title">COSME DECORTE</p>
                <?php endif; ?>
				<?php if ($sf_user->isAuthenticated()): ?>
					<p id="user_info"><?php echo $sf_user->getUserName() ?> ユーザでログイン中</p>
				<?php endif ?>

				<?php if ($sf_user->isAuthenticated()): ?>
					<ul id="topnav">
						<?php if ($sf_user->hasCredential('superadmin') || $sf_user->hasCredential('admin')): ?>
							<li>
								<?php echo link_to('HOME', 'homepage') ?>
							</li>
						<?php endif ?>
						<?php if ($sf_user->hasCredential('superadmin')): ?>
							<li>
								<?php echo link_to('会員情報', 'member/index') ?>
							</li>
						<?php endif ?>
						<?php if ($sf_user->hasCredential('admin')): ?>
							<?php if ($sf_request->getHost() != 'www.cosmedecorte.com'): ?>
								<li>
									<?php echo link_to('ファイル', 'files/index') ?>
								</li>
							<?php endif ?>
							<li>
								<?php echo link_to('ライン', 'line/index') ?>
							</li>
							<li>
								<?php echo link_to('カテゴリ', 'category/index') ?>
							</li>
							<li>
								<?php echo link_to('サブカテゴリ', 'sub_category/index') ?>
							</li>
							<li>
								<?php echo link_to('効果', 'effect/index') ?>
							</li>
							<li>
								<?php echo link_to('商品', 'product/index') ?>
							</li>
							<li>
								<?php echo link_to('子商品', 'child_product/index') ?>
							</li>
							<li>
								<?php echo link_to('FAQ', 'faq_detail/index') ?>
							</li>
							<li>
								<?php echo link_to('検索辞書', 'product_search_word/index') ?>
							</li>
							<li>
								<?php echo link_to('統計情報', 'statistics/index') ?>
							</li>
							<li>
								<?php echo link_to('転送URL', 'redirect_url/index') ?>
							</li>
						<?php endif ?>
                        <?php if ($sf_user->hasCredential('salonadmin') || $sf_user->hasCredential('superadmin')): ?>
                            <li>
                                <?php echo link_to('ログイン管理', 'salon_login_list') ?>
                            </li>
                        <?php endif ?>
                        <?php if ($sf_user->hasCredential('salonstaff')): ?>
                            <li>
                                 <?php echo link_to('予約情報', 'salon_reserve_list') ?>
                            </li>
                        <?php endif ?>
						<?php if ($sf_user->hasCredential('admin')): ?>
                            <li>
                                 <?php echo link_to('サロン店舗', 'salon_shop/index') ?>
                            </li>
                        <?php endif ?>
						<?php if ($sf_user->hasCredential('admin')): ?>
                            <li>
                                 <?php echo link_to('サロン店舗メニュー', 'salon_shop_menu/index') ?>
                            </li>
                        <?php endif ?>
						<li id="logout">
							<?php echo link_to('ログアウト', 'logout') ?>
						</li>
					</ul>
				<?php endif ?>
			</div>

			<div id="wrapper">
				<div id="content">
					<?php echo $sf_content ?>
				</div>
			</div>

			<div id="footer">
				<p>Copyright &copy; COSME DECORTE. All Rights Reserved.</p>
			</div>
		</div>
	</body>
</html>
