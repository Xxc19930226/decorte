<?php

/**
 * Article form.
 *
 * @package    form
 * @subpackage Article
 * @version    SVN: $Id: ArticleForm.class.php 12 2011-05-12 03:42:19Z oda $
 */
class ArticleForm extends BaseArticleForm
{
  public function configure()
  {
    $this->embedI18n(array('en', 'fr'));
  }
}