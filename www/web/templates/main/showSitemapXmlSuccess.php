<?php use_helper('Date') ?>
<?xml version="1.0" encoding="UTF-8" ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc>http://www.cosmedecorte.com/</loc>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>http://www.cosmedecorte.com/news.html</loc>
  </url>
  <url>
    <loc>http://www.cosmedecorte.com/line.html</loc>
  </url>
  <?php foreach ($lines as $line): ?>
    <url>
      <loc>http://www.cosmedecorte.com/<?php echo $line['slug'] ?>/</loc>
    </url>
  <?php endforeach ?>
  <?php foreach ($products as $product): ?>
    <url>
      <loc>http://www.cosmedecorte.com<?php echo url_for('product_show_by_slug', $product) ?></loc>
    </url>
  <?php endforeach ?>
</urlset>
