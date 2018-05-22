<?php slot('title', '查找商品') ?>
<?php slot('page_id', 'searchPage') ?>
<?php use_helper('Number') ?>
<?php use_helper('Decorte') ?>
<?php use_stylesheet('search.css') ?>
<?php slot('og_url', hide_log_query($sf_context->getRequest()->getUri(ESC_RAW))) ?>

<div class="search">
    <header>
        <h1 class="search__title">Product Search</h1>
    </header>
    <div class="search__result">
        <p class="search__result__keyword">
            <?php if ($form->getSubCategory()): ?>
           「<?php echo $form->getSubCategory()->getName() ?>」
            <?php endif ?>
            <?php if ($form->getLine()): ?>
           「<?php echo $form->getLine()->getName() ?>」
            <?php endif ?>
            <?php if ($form->getEffect()): ?>
           「<?php echo $form->getEffect()->getName() ?>」
            <?php endif ?>
            <?php if ($form['keyword']->getValue()): ?>
           「<?php echo htmlspecialchars($form['keyword']->getValue()) ?>」
            <?php endif ?>
        </p>
        <p class="search__result__message">
            <?php if ($pager->count() > 0): ?>
            <span class="number"><?php echo $pager->count() ?></span> matches
            <?php else: ?>
            没有符合条件的商品。
            <?php endif ?>
        </p>
    </div>
    <div class="search__narrowdown">
        <p class="search__narrowdown__openclose">缩小搜索条件</p>
        <div class="search__narrowdown__form">
            <?php include_partial('searchForm', array('form' => $form)) ?>
        </div>
    </div>

    <div class="pagenation">
    	<?php if ($pager->count() > 0): ?>
        <p class="pagenation__status"><?php echo $pager->getFirstIndice() ?> － <?php echo $pager->getLastIndice() ?>　/　<?php echo $pager->count() ?></p>
        <?php endif ?>
        <?php if ($pager->haveToPaginate()): ?>
        <div class="pagenation__nav">
            <p class="pagenation__nav__next">
                <?php if ($pager->isFirstPage()): ?>
                &lt;
                <?php else: ?>
                <?php echo link_to('&lt;', 'product_search', $form->buildHttpQueryValues(array('page' => $pager->getPreviousPage()))) ?>
                <?php endif ?>
            </p>
            <ul class="pagenation__nav__list">
                <?php foreach ($pager->getLinks() as $page): ?>
                    <?php echo tag('li', array('class' => $page == $pager->getPage() ? 'pagenation__nav__list__num current' : 'pagenation__nav__list__num'), true) ?><?php echo link_to($page, 'product_search', $form->buildHttpQueryValues(array('page' => $page))) ?></li>
                <?php endforeach ?>
            </ul>
            <p class="pagenation__nav__back">
                <?php if ($pager->isLastPage()): ?>
                &gt;
                <?php else: ?>
                <?php echo link_to('&gt;', 'product_search', $form->buildHttpQueryValues(array('page' => $pager->getNextPage()))) ?>
                <?php endif ?>
            </p>
        </div>
        <?php endif ?>
    </div>

    <ul class="result_list">
        <?php foreach ($pager->getResults() as $idx => $product): ?>
        <li class="result_list__item">
            <p class="result_list__item__image">
                <?php if ($product['search_pc_link']): ?>
                <?php echo link_to(image_tag(url_for('product_square_image', $product), array('alt' => '')), $product['search_pc_link']) ?>
                <?php else: ?>
                <?php echo link_to(image_tag(url_for('product_square_image', $product), array('alt' => '')), 'product_show_by_slug', $product, array('query_string' => 'log=' . $form->getLogId(), 'class' => 'thickbox')) ?>
                <?php endif ?>
            </p>
            <p class="result_list__item__spec">
                <?php if ($product['Line']['major_flag']): ?>
                    <span class="line_name"><?php echo $product['Line']['name'] ?></span>
                <?php endif ?>

                <span class="product_name"><?php echo split_by_span($product['name']) ?></span><br />
                <small>
                    <?php if ($product['search_sub_category']): ?>
                    <?php echo $product['search_sub_category'] ?>
                    <?php else: ?>
                    <?php echo $product['SubCategory']['name'] ?>
                    <?php endif ?>
                </small>

            </p>
        </li>
        <?php endforeach ?>
    </ul>

    <div class="pagenation">
        <?php if ($pager->haveToPaginate()): ?>
        <div class="pagenation__nav">
            <p class="pagenation__nav__next">
                <?php if ($pager->isFirstPage()): ?>
                &lt;
                <?php else: ?>
                <?php echo link_to('&lt;', 'product_search', $form->buildHttpQueryValues(array('page' => $pager->getPreviousPage()))) ?>
                <?php endif ?>
            </p>
            <ul class="pagenation__nav__list">
                <?php foreach ($pager->getLinks() as $page): ?>
                    <?php echo tag('li', array('class' => $page == $pager->getPage() ? 'pagenation__nav__list__num current' : 'pagenation__nav__list__num'), true) ?><?php echo link_to($page, 'product_search', $form->buildHttpQueryValues(array('page' => $page))) ?></li>
                <?php endforeach ?>
            </ul>
            <p class="pagenation__nav__back">
                <?php if ($pager->isLastPage()): ?>
                &gt;
                <?php else: ?>
                <?php echo link_to('&gt;', 'product_search', $form->buildHttpQueryValues(array('page' => $pager->getNextPage()))) ?>
                <?php endif ?>
            </p>
        </div>
        <?php endif ?>
    	<?php if ($pager->count() > 0): ?>
        <p class="pagenation__status"><?php echo $pager->getFirstIndice() ?> － <?php echo $pager->getLastIndice() ?>　/　<?php echo $pager->count() ?></p>
        <?php endif ?>
    </div>


</div>

</div>
