<?php

/**
 * reserve actions.
 *
 * @package    cosmedecorte
 * @subpackage reserve
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class reserveActions extends sfActions
{
    /**
     *  予約応募フォーム
     *
     *  @param sfRequest $request A request object
     */
    public function executeNotes(sfWebRequest $request)
    {
        $this->getUser()->getAttributeHolder()->remove('salon_reserve');
        $cont = sfContext::getInstance()->getConfiguration();
        if ($cont->getDeviceTypeString() == 'pc' ||
            $cont->getDeviceTypeString() == 'sp') {
            $this->redirect('reserve_input');
        }
    }

    public function executeSelectShop(sfWebRequest $request)
    {
        $cont = sfContext::getInstance()->getConfiguration();
        if ($cont->getDeviceTypeString() == 'pc' ||
            $cont->getDeviceTypeString() == 'sp') {
            $this->redirect('reserve_input');
        }

        $this->form = new SalonReserveForm(
            $this->getUser()->getAttribute('salon_reserve'));

        if ($request->isMethod(sfRequest::POST) ||
            $request->isMethod(sfRequest::PUT)) {
            $param = $request->getParameter($this->form->getName());
            $this->form->bind($param);
            if (!$this->form['shop_id']->hasError()) {
                $this->form->updateObject();
                $salon_reserve = $this->form->getObject();
                $salon_reserve->setShop(
                    SalonShopTable::getInstance()->find($param['shop_id']));
                $this->getUser()->
                    setAttribute('salon_reserve', $salon_reserve);
                $this->redirect('reserve_input');
            }
        }
    }

    public function executeInput(sfWebRequest $request)
    {
        $salon_reserve = $this->getUser()->getAttribute('salon_reserve');
        $cont = sfContext::getInstance()->getConfiguration();
        $this->shop = '';
        if ($cont->getDeviceTypeString() == 'mb') {
            if (!$salon_reserve || !$salon_reserve->getShopId()) {
                $this->redirect('reserve_shop');
            }

            $this->shop = $salon_reserve->getShop();
        }

        $this->has_error = false;
        $this->form = new SalonReserveForm($salon_reserve);

        if ($request->isMethod(sfRequest::POST) ||
            $request->isMethod(sfRequest::PUT)) {
            if ($request->getParameter('back')) {
                $this->redirect('reserve_shop');
            }

            $params = $request->getParameter($this->form->getName());
            if ($params && $this->shop) {
                $params['shop_id'] = $this->shop->getId();
            }
            $this->form->bind($params);
            if ($this->form->isValid()) {
                $this->form->updateObject();
                $this->getUser()->
                    setAttribute('salon_reserve', $this->form->getObject());
                $this->redirect('reserve_confirm');
            } else {
                $this->has_error = true;
            }
        } else {
            if (!$this->getUser()->getAttribute('salon_reserve')) {
                $member = $this->getUser()->getLoginMember();
                if ($member) {
                    $this->form->setDefault('name_sei', $member['name_sei']);
                    $this->form->setDefault('name_mei', $member['name_mei']);
                    $this->form->
                        setDefault('name_sei_kana', $member['name_sei_kana']);
                    $this->form->
                        setDefault('name_mei_kana', $member['name_mei_kana']);
                    $this->form->setDefault('email', $member['mail_pc']);
                    $this->form->setDefault('email2', $member['mail_pc']);
                    $this->form->setDefault('tel', $member['tel']);
                    $birth = explode('-', $member['birthday']);
                    $day = $birth[0] . $birth[1] . $birth[2];
                    $age = (int)((date("Ymd") - $day)/10000);
                    $this->form->setDefault('age', $age);
                }
            }
        }
    }

    public function executeShowSalonShopHopeDate(sfWebRequest $request)
    {
        $shop_id = $request->getParameter('id');
        $shop = SalonShopTable::getInstance()->find($shop_id);
        $this->form = new SalonReserveForm($shop);
    }

    public function executeShowSalonShopMenu(sfWebRequest $request)
    {
        $shop_id = $request->getParameter('id');
        $shop = SalonShopTable::getInstance()->find($shop_id);
        $this->form = new SalonReserveForm($shop);
    }

    public function executeConfirm(sfWebRequest $request)
    {
        $this->reserve = $this->getUser()->getAttribute('salon_reserve');
        $this->forward404Unless($this->reserve);
        $cont = sfContext::getInstance()->getConfiguration();
        $shop = SalonShopTable::getInstance()->find($this->reserve['shop_id']);
        $this->form = new SalonReserveForm($shop);

        if ($cont->getRawDeviceString() == 'mb') {
            $this->menu = $this->form->getMenuMbString($this->reserve['menu']);
            $this->hope_date1 =
                $this->form->getDateMbString($this->reserve['hope_date1']);
            $this->hope_date2 =
                $this->form->getDateMbString($this->reserve['hope_date2']);
            $this->hope_date3 =
                $this->form->getDateMbString($this->reserve['hope_date3']);
            $this->reserve['reply'] =
                mb_convert_encoding(
                    '未返信', sfConfig::get('sf_charset'), 'UTF-8');
        } else {
            $this->menu = $this->form->getMenuMbString($this->reserve['menu']);
            $this->hope_date1 =
                $this->form->getDateString($this->reserve['hope_date1']);
            $this->hope_date2 =
                $this->form->getDateString($this->reserve['hope_date2']);
            $this->hope_date3 =
                $this->form->getDateString($this->reserve['hope_date3']);
            $this->reserve['reply'] = '未返信';
        }

        if ($this->hope_date2 == '---')
            $this->hope_date2 = "";

        if ($this->hope_date3 == '---')
            $this->hope_date3 = "";

        if ($this->reserve['know'] != "---")
            $this->know = $this->reserve['know'];
        else
            $this->know = '';

        if ($request->isMethod(sfRequest::POST)) {
            if (!$request->getParameter('register')) {
                $this->redirect('reserve_input');
            }

            $this->reserve['tel'] =
                str_replace("-", "", $this->reserve['tel']);
            $this->reserve['menu'] = $this->menu;
            $this->reserve['hope_date1'] = $this->hope_date1;
            $this->reserve['hope_date2'] = $this->hope_date2;
            $this->reserve['hope_date3'] = $this->hope_date3;
            if ($this->reserve['hope_time2'] == '---') {
                $this->reserve['hope_time2'] = "";
            }
            if ($this->reserve['hope_time3'] == '---') {
                $this->reserve['hope_time3'] = "";
            }
            $this->reserve['know'] = $this->know;

            $this->reserve->save();

            $ua = sfContext::getInstance()->
                getConfiguration()->getDomeinType($this->reserve['email']);

            $mailer = $this->getMailer();
            if ($ua == 'pc') {
                 $message = new reserveThanksPc($this->reserve);
            } else {
                 $message = new reserveThanksMb($this->reserve);
            }
            $mailer->send($message);

            $message = new reserveAdmin($this->reserve);
            $mailer->send($message);

            $this->getUser()->getAttributeHolder()->remove('salon_reserve');
            $this->redirect('reserve_complete');
        }
    }

    public function executeComplete(sfWebRequest $request)
    {
    }
}
