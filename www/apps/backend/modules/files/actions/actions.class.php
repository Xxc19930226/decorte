<?php

/**
 * files actions.
 *
 * @package    cosmedecorte
 * @subpackage files
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class filesActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $updated_files = $this->getUser()->setAttribute('updated_files', null);
    }

    public function executeShowTree(sfWebRequest $request)
    {
        $root = sfConfig::get('sf_web_dir');
        $dir = $request->getParameter('dir');

        $display_dirs = array();
        $display_files = array();

        if (file_exists($root . $dir)) {
            $files = scandir($root . $dir);
            natcasesort($files);
            if (count($files) > 2) {    /* The 2 accounts for . and .. */
		foreach ($files as $file) {
                    if (file_exists($root . $dir . $file) &&
                        $file != '.' && $file != '..' && $file != '.svn' &&
                        is_dir($root . $dir . $file)) {
                        $display_dirs[] = $dir . $file;
                    }
		}

		foreach ($files as $file) {
                    if (file_exists($root . $dir . $file) &&
                        $file != '.' && $file != '..' && $file != '.svn' &&
                        !is_dir($root . $dir . $file)) {
                        $display_files[] = $dir . $file;
                    }
		}
            }
        }

        $this->dirs = $display_dirs;
        $this->files = $display_files;
    }

    public function executeAddElement(sfWebRequest $request)
    {
        $updated_files = $this->getUser()->getAttribute('updated_files');
        if ($updated_files === null) {
            $updated_files = array();
        }

        $file = $request->getParameter('file');

        if (array_key_exists($file, $updated_files)) {
            unset($updated_files[$file]);
        }

        $updated_files[$file] = true;
        $this->getUser()->setAttribute('updated_files', $updated_files);

        $this->files = array_keys($updated_files);
    }

    public function executeRemoveElement(sfWebRequest $request)
    {
        $updated_files = $this->getUser()->getAttribute('updated_files');
        if ($updated_files === null) {
            $updated_files = array();
        }

        $file = $request->getParameter('file');

        if (array_key_exists($file, $updated_files)) {
            unset($updated_files[$file]);
        }

        $this->getUser()->setAttribute('updated_files', $updated_files);

        $this->setTemplate('addElement');
        $this->files = array_keys($updated_files);
    }

    public function executeLiveupElements(sfWebRequest $request)
    {
        $root = sfConfig::get('sf_web_dir');
        $dir = $request->getParameter('dir');

        /*
         * ファイルの本番反映は rsync コマンドにて行うため、Apache を実行して
         * いるユーザ(通常は apache）が反映先のホストにパスワードなしでSSHロ
         * グインできるように事前に設定しておく必要がある。
         */

        $updated_files = $this->getUser()->getAttribute('updated_files');
        foreach (array_keys($updated_files) as $updated_file) {
            $cmd = sfConfig::get('app_liveup_rsync_cmd') . ' -az ' .
                $root . $dir . $updated_file . ' ' .
                sfConfig::get('app_liveup_rsync_dist_user') . '@' .
                sfConfig::get('app_liveup_rsync_dist_host') . ':' .
                sfConfig::get('app_liveup_rsync_dist_root') . $updated_file;
            system($cmd);
        }

        $this->getUser()->setAttribute('updated_files', array());

        return sfView::NONE;
    }
}
