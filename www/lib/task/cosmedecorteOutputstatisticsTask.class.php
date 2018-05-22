<?php

class cosmedecorteOutputstatisticsTask extends sfBaseTask
{
    protected function makeNewSheet($excel, $idx)
    {
        if ($idx > 0) {
            $excel->createSheet();
        }
        $excel->setActiveSheetIndex($idx);
        $sheet = $excel->getActiveSheet();
        $defaults = $sheet->getDefaultStyle();
        $defaults->getFont()->setName('ＭＳ Ｐゴシック');
        $defaults->getFont()->setSize(11);
        $defaults->getAlignment()->
            setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        return $sheet;
    }

    protected function setTitleCell($sheet, $pos)
    {
        $style = $sheet->getStyle($pos);
        $fill = $style->getFill();
        $fill->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $fill->getStartColor()->setRGB('99ccff');
        $style->getFont()->setBold(true);
        $style->getAlignment()->
            setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $this->setBorderCell($sheet, $pos);
    }

    protected function setBorderCell($sheet, $pos)
    {
        $sheet->getStyle($pos)->getBorders()->getTop()->
            setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $sheet->getStyle($pos)->getBorders()->getBottom()->
            setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $sheet->getStyle($pos)->getBorders()->getLeft()->
            setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
        $sheet->getStyle($pos)->getBorders()->getRight()->
            setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
    }

    protected function getSearchStatistics($conn, $yyyy, $mm, $is_no_hit)
    {
        $query = 'SELECT * FROM product_search_log WHERE ';
        $query .= 'created_at like :created_at';
        $query .=
            ' AND line IS NULL AND category IS NULL' .
            ' AND sub_category IS NULL AND effect IS NULL';

        $query_params = array();
        $query_params['created_at'] = $yyyy . '-' . $mm . '-%';
        if ($is_no_hit) {
            $query .= ' AND hit = :hit';
            $query_params['hit'] = 0;
        }

        $stmt = $conn->prepare($query);
        $stmt->execute($query_params);

        $stats = array();
        $keyword_query =
            'SELECT keyword FROM product_search_keyword_log ' .
            'WHERE parent_id = :parent_id AND keyword != :keyword';
        $keyword_stmt = $conn->prepare($keyword_query);
        while (($search = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
            $keyword_query_params = array();
            $keyword_query_params['parent_id'] = $search['id'];
            $keyword_query_params['keyword'] = '';
            $keyword_stmt->execute($keyword_query_params);
            $keywords = $keyword_stmt->fetchAll();
            if (count($keywords) == 0) {
                continue;
            }

            $keywords_str = '';
            foreach ($keywords as $idx => $keyword) {
                if ($idx != 0) {
                    $keywords_str .= ' ';
                }
                $keywords_str .= trim($keyword['keyword']);
            }
            unset($keywords);

            if (isset($stats[$keywords_str])) {
                $stats[$keywords_str]++;
            } else {
                $stats[$keywords_str] = 1;
            }
        }
        arsort($stats);

        return $stats;
    }

    protected function setSearchStatistics(
        $conn, $excel, $yyyy, $mm, $m_lastday)
    {
        $stats = $this->getSearchStatistics($conn, $yyyy, $mm, false);

        $sheet = $this->makeNewSheet($excel, 0);

        $sheet->setCellValue('A1', '検索フリーワード');
        $this->setTitleCell($sheet, 'A1');
        $sheet->setCellValue('B1' . $line, '検索回数');
        $this->setTitleCell($sheet, 'B1');

        $line = 2;
        foreach ($stats as $keywords_str => $count) {
            $sheet->setCellValue('A' . $line, $keywords_str);
            $this->setBorderCell($sheet, 'A' . $line);
            $sheet->setCellValue('B' . $line, $count);
            $this->setBorderCell($sheet, 'B' . $line);
            $line++;
        }

        //$sheet->getColumnDimension('A1')->setAutoSize(true);
        //$sheet->getColumnDimension('B1')->setAutoSize(true);
        $sheet->getColumnDimension('A')->setWidth(70);
        $sheet->getColumnDimension('B')->setWidth(10);

        $sheet->setTitle(
            "$yyyy$mm" . '01-' . "$mm$m_lastday" . '【検索ワードランク】');

        $sheet->setSelectedCell('A1');
    }

    protected function setSearchNohitStatistics(
        $conn, $excel, $yyyy, $mm, $m_lastday)
    {
        $stats = $this->getSearchStatistics($conn, $yyyy, $mm, true);

        $sheet = $this->makeNewSheet($excel, 1);

        $sheet->setCellValue('A1', '検索フリーワード');
        $this->setTitleCell($sheet, 'A1');
        $sheet->setCellValue('B1' . $line, '検索回数');
        $this->setTitleCell($sheet, 'B1');

        $line = 2;
        foreach ($stats as $keywords_str => $count) {
            $sheet->setCellValue('A' . $line, $keywords_str);
            $this->setBorderCell($sheet, 'A' . $line);
            $sheet->setCellValue('B' . $line, $count);
            $this->setBorderCell($sheet, 'B' . $line);
            $line++;
        }

        //$sheet->getColumnDimension('A1')->setAutoSize(true);
        //$sheet->getColumnDimension('B1')->setAutoSize(true);
        $sheet->getColumnDimension('A')->setWidth(70);
        $sheet->getColumnDimension('B')->setWidth(10);

        $sheet->setTitle(
            "$yyyy$mm" . '01-' . "$mm$m_lastday" . '【検索ヒット0件】');

        $sheet->setSelectedCell('A1');
    }

    protected function setMylistStatistics(
        $conn, $excel, $yyyy, $mm, $m_lastday)
    {
        $query = 'SELECT l.name AS l_name, p.name AS p_name, ';
        $query .= 'COUNT(product_id) AS cnt FROM product_favorite pf ';
        $query .= 'LEFT JOIN product p ON pf.product_id = p.id ';
        $query .= 'LEFT JOIN line l ON p.line_id = l.id ';
        $query .= 'WHERE pf.created_at LIKE :created_at ';
        $query .= 'GROUP BY pf.product_id ORDER BY cnt DESC';

        $query_params = array();
        $query_params['created_at'] = $yyyy . '-' . $mm . '-%';

        $stmt = $conn->prepare($query);
        $stmt->execute($query_params);

        $sheet = $this->makeNewSheet($excel, 2);

        $sheet->setCellValue('A1', 'ライン名');
        $this->setTitleCell($sheet, 'A1');
        $sheet->setCellValue('B1' . $line, '商品名');
        $this->setTitleCell($sheet, 'B1');
        $sheet->setCellValue('C1' . $line, 'マイリスト登録数');
        $this->setTitleCell($sheet, 'C1');

        $stats = array();
        $line = 2;
        while (($search = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
            $sheet->setCellValue('A' . $line, $search['l_name']);
            $this->setBorderCell($sheet, 'A' . $line);
            $sheet->setCellValue('B' . $line, $search['p_name']);
            $this->setBorderCell($sheet, 'B' . $line);
            $sheet->setCellValue('C' . $line, $search['cnt']);
            $this->setBorderCell($sheet, 'C' . $line);
            $line++;
        }

        //$sheet->getColumnDimension('A')->setAutoSize(true);
        //$sheet->getColumnDimension('B')->setAutoSize(true);
        //$sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('A')->setWidth(30);
        $sheet->getColumnDimension('B')->setWidth(50);
        $sheet->getColumnDimension('C')->setWidth(16);

        $sheet->setTitle(
            "$yyyy$mm" . '01-' . "$mm$m_lastday" .
            '【商品マイリスト登録ランク】');

        $sheet->setSelectedCell('A1');
    }

    protected function setAccessStatistics(
        $conn, $excel, $yyyy, $mm, $m_lastday)
    {

        $query = 'SELECT l.name AS l_name, p.name AS p_name, ';
        $query .= 'COUNT(product_id) AS cnt FROM product_access_log pa ';
        $query .= 'LEFT JOIN product p ON pa.product_id = p.id ';
        $query .= 'LEFT JOIN line l on p.line_id = l.id ';
        $query .= 'WHERE pa.created_at LIKE :created_at ';
        $query .= 'GROUP BY pa.product_id ORDER BY cnt DESC';

        $query_params = array();
        $query_params['created_at'] = $yyyy . '-' . $mm . '-%';

        $stmt = $conn->prepare($query);
        $stmt->execute($query_params);

        $sheet = $this->makeNewSheet($excel, 3);

        $sheet->setCellValue('A1', 'ライン名');
        $this->setTitleCell($sheet, 'A1');
        $sheet->setCellValue('B1' . $line, '商品名');
        $this->setTitleCell($sheet, 'B1');
        $sheet->setCellValue('C1' . $line, 'アクセス数');
        $this->setTitleCell($sheet, 'C1');

        $stats = array();
        $line = 2;
        while (($search = $stmt->fetch(PDO::FETCH_ASSOC)) !== false) {
            $sheet->setCellValue('A' . $line, $search['l_name']);
            $this->setBorderCell($sheet, 'A' . $line);
            $sheet->setCellValue('B' . $line, $search['p_name']);
            $this->setBorderCell($sheet, 'B' . $line);
            $sheet->setCellValue('C' . $line, $search['cnt']);
            $this->setBorderCell($sheet, 'C' . $line);
            $line++;
        }

        //$sheet->getColumnDimension('A')->setAutoSize(true);
        //$sheet->getColumnDimension('B')->setAutoSize(true);
        //$sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('A')->setWidth(30);
        $sheet->getColumnDimension('B')->setWidth(50);
        $sheet->getColumnDimension('C')->setWidth(11);

        $sheet->setTitle(
            "$yyyy$mm" . '01-' . "$mm$m_lastday" .
            '【商品アクセスランク】');

        $sheet->setSelectedCell('A1');
    }

    protected function configure()
    {
        $this->addOptions(
            array(new sfCommandOption(
                      'application', null,
                      sfCommandOption::PARAMETER_REQUIRED,
                      'The application name', 'frontend'),
                  new sfCommandOption(
                      'env', null, sfCommandOption::PARAMETER_REQUIRED,
                      'The environment', 'prod'),
                  new sfCommandOption(
                      'connection', null, sfCommandOption::PARAMETER_REQUIRED,
                      'The connection name', 'doctrine')));
        $this->addArguments(
            array(new sfCommandArgument(
                      'yyyymm', sfCommandArgument::OPTIONAL)));

        $this->namespace        = 'cosmedecorte';
        $this->name             = 'output-statistics';
        $this->briefDescription = '';
        $this->detailedDescription = '';
    }

    protected function execute($arguments = array(), $options = array())
    {
        $db_manager = new sfDatabaseManager($this->configuration);
        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
        $conn =
            $db_manager->getDatabase($options['connection'])->getConnection();

        $yyyymm = '';
        if (isset($arguments['yyyymm'])) {
            $yyyymm = $arguments['yyyymm'];
        } else {
            $yyyymm = date('Ym', strtotime(date('Y-m-1') . ' -1 month'));
        }

        $matches = array();
        if (!preg_match('/^(\d{4})(\d{2})$/', $yyyymm, $matches)) {
            fputs(STDERR, "invalid command line parameter.\n");
            exit(1);
        }
        $yyyy = $matches[1];
        $mm = $matches[2];
        $m_lastday = date('t', mktime(0, 0, 0, $mm, 1, $yyyy));

        $excel = new sfPhpExcel();

        $this->setSearchStatistics($conn, $excel, $yyyy, $mm, $m_lastday);
        $this->setSearchNohitStatistics($conn, $excel, $yyyy, $mm, $m_lastday);
        $this->setMylistStatistics($conn, $excel, $yyyy, $mm, $m_lastday);
        $this->setAccessStatistics($conn, $excel, $yyyy, $mm, $m_lastday);

        $excel->setActiveSheetIndex(0);
        $writer = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
        $writer->save(
            sfConfig::get('sf_root_dir') . '/statistics/' .
            'cosmedecorte_statistics_' . "$yyyy$mm" . '.xls');
  }
}
