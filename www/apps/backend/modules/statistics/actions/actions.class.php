<?php

/**
 * statistics actions.
 *
 * @package    cosmedecorte
 * @subpackage statistics
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class statisticsActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $finder = sfFinder::type('file');
        $finder->name('cosmedecorte_statistics_*.xls*');
        $files = $finder->in(sfConfig::get('sf_root_dir') . '/statistics');
        arsort($files);

        $this->dates = array();
        foreach ($files as $file) {
            $matches = array();
            preg_match(
                '/^.*\/cosmedecorte_statistics_(\d{4})(\d{2})\.xls.*$/',
                $file, $matches);
            $yyyy = $matches[1];
            $mm = $matches[2];
            if ($yyyy && $mm) {
                $this->dates[] = array('yyyy' => $yyyy, 'mm' => $mm);
            }
        }
    }

    public function executeDownload(sfWebRequest $request)
    {
        $yyyy = $request->getParameter('yyyy');
        $mm = $request->getParameter('mm');

        $finder = sfFinder::type('file');
        $finder->name("cosmedecorte_statistics_$yyyy$mm.xls*");
        $files = $finder->in(sfConfig::get('sf_root_dir') . '/statistics');
        if (!$files) {
            $this->forward404();
        }
        $real_filename = $files[0];

        $response = $this->getResponse();
        $filename = '';
        if (preg_match('/\.xls$/', $real_filename)) {
            $filename = "コスメデコルテ_サイト解析結果$yyyy$mm.xls";
        } else {
            $filename = "コスメデコルテ_サイト解析結果$yyyy$mm.xlsx";
        }

        $ua = $request->getHttpHeader('User-Agent');
        $matches = array();
        if (preg_match('/MSIE (.*);/', $ua, $matches)) {
            if ($matches[1] < 9.0) {
                $filename = mb_convert_encoding($filename, 'SJIS', 'UTF-8');
            } else {
                $filename = urlencode($filename);
            }
        }

        $response->setContentType(
            "application/vnd.ms-excel; name=$filename");
        $response->setHttpHeader(
            'Content-disposition', "attachment; filename=$filename");
        $response->addCacheControlHttpHeader('public');
        $response->setHttpHeader('Pragma', 'public');
        $response->setContent(file_get_contents($real_filename));

        return sfView::NONE;
    }
}
