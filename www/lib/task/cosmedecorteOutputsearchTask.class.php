<?php

class cosmedecorteOutputsearchTask extends sfBaseTask
{
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
                      'The connection name', 'doctrine'),
                  new sfCommandOption(
                      'no-hit', null, sfCommandOption::PARAMETER_NONE,
                      'Whether no-hit keywords only or not', null)));
        $this->addArguments(
            array(new sfCommandArgument(
                      'yyyymm1', sfCommandArgument::REQUIRED),
                  new sfCommandArgument(
                      'yyyymm2', sfCommandArgument::OPTIONAL)));

        $this->namespace = 'cosmedecorte';
        $this->name = 'output-search';
        $this->briefDescription = '';
        $this->detailedDescription = '';
    }

    protected function execute($arguments = array(), $options = array())
    {
        $db_manager = new sfDatabaseManager($this->configuration);
        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
        $conn =
            $db_manager->getDatabase($options['connection'])->getConnection();

        $yyyymm1 = $arguments['yyyymm1'];
        $matches = array();
        if (!preg_match('/^(\d{4})(\d{2})$/', $yyyymm1, $matches)) {
            fputs(STDERR, "invalid command line parameter.\n");
            exit(1);
        }
        $yyyy1 = $matches[1];
        $mm1 = $matches[2];

        $yyyymm2 = $arguments['yyyymm2'];
        $yyyy2 = '';
        $mm2 = '';
        if ($yyyymm2) {
            $matches = array();
            if (!preg_match('/^(\d{4})(\d{2})$/', $yyyymm2, $matches)) {
                fputs(STDERR, "invalid command line parameter.\n");
                exit(1);
            }
            $yyyy2 = $matches[1];
            $mm2 = $matches[2];
        }

        $query_params = array();
        $query = 'SELECT * FROM product_search_log WHERE ';

        if ($yyyy2 && $mm2) {
            $query .=
                'created_at >= :created_at1' .
                ' AND created_at <= :created_at2';
            $query_params['created_at1'] =
                $yyyy1 . '-' . $mm1 . '-01 00:00:00';
            $query_params['created_at2'] =
                date('Y-m-t', strtotime($yyyy2 . '-' . $mm2 . '-01')) .
                ' 23:59:59';
        } else {
            $query .= 'created_at like :created_at';
            $query_params['created_at'] = $yyyy1 . '-' . $mm1 . '-%';
        }

        $query .=
            ' AND line IS NULL AND category IS NULL' .
            ' AND sub_category IS NULL AND effect IS NULL';

        if ($options['no-hit']) {
            $query .= ' AND hit = :hit';
            $query_params['hit'] = 0;
        }

        $stmt = $conn->prepare($query);
        $stmt->execute($query_params);

        $inputs = array();
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

            $input = '';
            foreach ($keywords as $idx => $keyword) {
                if ($idx != 0) {
                    $input .= ' ';
                }
                $input .= trim($keyword['keyword']);
            }
            unset($keywords);

            if (isset($inputs[$input])) {
                $inputs[$input]++;
            } else {
                $inputs[$input] = 1;
            }
        }

        arsort($inputs);
        foreach ($inputs as $input => $count) {
            echo "$input,$count\n";
        }
    }
}
