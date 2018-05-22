<?php

/**
 * Movie form.
 *
 * @package    form
 * @subpackage movie
 * @version    SVN: $Id: MovieForm.class.php 12 2011-05-12 03:42:19Z oda $
 */
class MovieForm extends BaseMovieForm
{
  public function configure()
  {
    $this->embedI18n(array('en', 'fr'));
  }
}
