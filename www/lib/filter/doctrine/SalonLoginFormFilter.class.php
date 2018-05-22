<?php

/**
 * SalonLogin filter form.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class SalonLoginFormFilter extends AdminUserFormFilter 
{
    public function configure()
    {
        parent::configure();
        $this->disableCSRFProtection();
    }

    public function getSearchQuery()
    {
        $query = parent::getQuery();
        $query->addWhere('r.credentials = ?', 'salonadmin');
        $query->orWhere('r.credentials = ?', 'salonstaff');
        $query->orderBy('r.created_at DESC');
        
        return $query;
    }

}

