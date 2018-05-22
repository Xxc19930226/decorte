<?php

/**
 * SalonReserve filter form.
 *
 * @package    cosmedecorte
 * @subpackage filter
 * @author     BROADTECH INC.
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 12 2011-05-12 03:42:19Z oda $
 */
class SalonReserveFormFilter extends BaseSalonReserveFormFilter
{
    public function configure()
    {
        $this->disableCSRFProtection();
    }

    public function buildHttpQueryValues($extra_params = array())
    {
        foreach ($extra_params as $key => $value) {
            $values[$key] = $value;
        }
        return $values;
    }

    public function getSearchQuery($sort)
    {
        $query = parent::getQuery();
        $query->leftJoin('r.Shop s');
        $query->addWhere('r.delete_flag = ?', 0);
        if ($sort) {
            $query = self::getSortQuery($sort, $query);
        } else {
            $query->orderBy('r.created_at DESC');
        }
        return $query;
    }

    public function getSortQuery($colum, $query) {
        if ($colum == 'create_asc') {
            $query->orderBy('r.created_at');
        } elseif ($colum == 'create_desc') {
            $query->orderBy('r.created_at DESC');
        } elseif ($colum == 'mid_asc') {
            $query->orderBy('r.members_card_id');
        } elseif ($colum == 'mid_desc') {
            $query->orderBy('r.members_card_id DESC');
        } elseif ($colum == 'email_asc') {
            $query->orderBy('r.email');
        } elseif ($colum == 'email_desc') {
            $query->orderBy('r.email DESC');
        } elseif ($colum == 'reply_asc') {
            $query->orderBy('r.reply');
        } elseif ($colum == 'reply_desc') {
            $query->orderBy('r.reply DESC');
        } elseif ($colum == 'shop_asc') {
            $query->orderBy('s.name');
        } elseif ($colum == 'shop_desc') {
            $query->orderBy('s.name DESC');
        }
        return $query;
    }


}
