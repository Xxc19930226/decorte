<?php

/**
 * salon_reserve actions.
 *
 * @package    cosmedecorte
 * @subpackage salon_reserve
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class salon_reserveActions extends sfActions
{
   /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
        $sort = $request->getParameter('sort');
        if ($sort) {
            $this->getUser()->setAttribute('sortNum', $sort);
        } else {
            $sort = $this->getUser()->getAttribute('sortNum');
        }

        $this->filters = new SalonReserveFormFilter();
        $myshop = $this->getUser()->getSalonShop();
        if ($myshop) {
            $this->filters->bind(array('shop_id' => $myshop->getId()));
        } else {
            $this->filters->bind();
        }
        $this->pager = new sfDoctrinePager('SalonReserve', 20);
        $query = $this->filters->getSearchQuery($sort);
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

   /**
    * Show
    *
    * @param sfRequest $request A request object
    */
    public function executeShow(sfWebRequest $request)
    {
        $reserve = $this->getRoute()->getObject();
        $myshop = $this->getUser()->getSalonShop();
        if ($reserve->getDeleteFlag() ||
            ($myshop && $reserve->getShop()->getId() != $myshop->getId())) {
            $this->forward404();
        }

        $this->getUser()->getAttributeHolder()->remove('admin_salon_reserve');
        $this->getUser()->getAttributeHolder()->remove('admin_decision');
        $this->getUser()->getAttributeHolder()->remove('admin_reply');
        $this->getUser()->setAttribute('admin_salon_reserve', $reserve);
        $this->redirect('salon_reserve_decision');
    }

   /**
    * Decision
    *
    * @param sfRequest $request A request object
    */
    public function executeDecision(sfWebRequest $request)
    {
        $this->reserve = $this->getUser()->getAttribute('admin_salon_reserve');
        if (!$this->reserve) {
            $this->redirect('salon_reserve_list');
        }

        $this->form = new ReserveDecisionForm(
            $this->getUser()->getAttribute('admin_decision'));

        if ($request->isMethod(sfRequest::POST) ||
            $request->isMethod(sfRequest::PUT)) {
            if ($request->getParameter('back')) {
                $this->redirect('salon_reserve_list');
            } elseif ($request->getParameter('delete')) {
                $this->reserve['delete_flag'] = true;
                $this->reserve->save();
                $this->redirect('salon_reserve_list');
            } else {
                $this->form->
                    bind($request->getParameter($this->form->getName()));
                if ($this->form->isValid()) {
                    $this->form->updateObject();
                    $this->getUser()->setAttribute(
                        'admin_decision', $this->form->getObject());
                    $this->decision = $this->form->getObject();
                    $this->decision->setSalonReserveId($this->reserve['id']);
                    $this->decision->save();
                    $this->redirect('salon_reserve_mailform');
                }
            }
        } else {
            if (!$this->getUser()->getAttribute('admin_decision')) {
                $decision = ReserveDecisionTable::getInstance()->
                            findOneBySalonReserveId($this->reserve['id']);
                $this->getUser()->setAttribute('admin_decision', $decision);
                $this->form = new ReserveDecisionForm($decision);
            }
            $this->getUser()->getAttributeHolder()->remove('admin_reply');
            $this->getUser()->getAttributeHolder()->remove('admin_letter');
        }
    }

   /**
    * Mailform
    *
    * @param sfRequest $request A request object
    */
    public function executeMailform(sfWebRequest $request)
    {
        $letter = array();
        $this->reserve = $this->getUser()->getAttribute('admin_salon_reserve');
        $this->decision = $this->getUser()->getAttribute('admin_decision');
        if (!$this->reserve || !$this->decision) {
            $this->redirect('salon_reserve_list');
        }
        if ($this->reserve['reply'] === '返信済') {
            $this->redirect('salon_reserve_list');
        }

        $ua = sfContext::getInstance()->
            getConfiguration()->getDomeinType($this->reserve['email']);

        if (!$this->getUser()->getAttribute('admin_letter') ||
            $request->getParameter('type')) {
            $visit = $this->reserve['visit'];
            $shop = $this->reserve->getShop();
            $type = $request->getParameter('type');

            if ($ua == 'pc') {
                if ($this->decision['other_flag1']) {
                    $letter = reserveReplyPc::getMailOut(
                        $this->reserve, $this->decision);
                } else {
                    if (strpos($visit, $shop->getName()) !== false ||
                        $visit == '両方来店あり') {
                        $is_first = false;
                    } else {
                        $is_first = true;
                    }

                    if (($is_first && $type == '1') ||
                        (!$is_first && $type == '1') ||
                        ($is_first && !$type)) {
                        $letter = reserveReplyPc::getMailNew(
                            $this->reserve, $this->decision);
                    } else {
                        $letter = reserveReplyPc::getMailSecond(
                            $this->reserve, $this->decision);
                    }
                }
            } else {
                if ($this->decision['other_flag1']) {
                    $letter = reserveReplyMb::getMailOut(
                        $this->reserve, $this->decision);
                } else {
                    if (strpos($visit, $shop->getName()) !== false ||
                        $visit == '両方来店あり') {
                        $is_first = false;
                    } else {
                        $is_first = true;
                    }

                    if (($is_first && $type == '1') ||
                        (!$is_first && $type == '1') ||
                        ($is_first && !$type)) {
                        $letter = reserveReplyMb::getMailNew(
                            $this->reserve, $this->decision);
                    } elseif (!$is_first ||
                              $request->getParameter('type') == 2) {
                        $letter = reserveReplyMb::getMailSecond(
                            $this->reserve, $this->decision);
                    }
                }
            }
            $this->getUser()->setAttribute('admin_letter', $letter[1]);
        } else {
            $letter[1] = $this->getUser()->getAttribute('admin_letter');
        }

        $this->form = new ReplyForm();

        if ($request->isMethod(sfRequest::POST) ||
            $request->isMethod(sfRequest::PUT)) {
            if ($request->getParameter('back')) {
                $this->redirect('salon_reserve_decision');
            } else {
                $this->form->
                    bind($request->getParameter($this->form->getName()));
                if ($this->form->isValid()) {
                    $values = $this->form->getValues();
                    $this->getUser()->setAttribute('admin_reply', $values);

                    if ($values['mailtext2']) {
                        $this->getUser()->setAttribute(
                            'admin_letter', $values['mailtext2']);
                    } else {
                        $this->getUser()
                            ->setAttribute('admin_letter', $letter[1]);
                    }

                    if ($request->getParameter('confirm')) {
                        $this->redirect('salon_reserve_mailconfirm');
                    }
                }
            }
        } else {
            $this->reply = $this->getUser()->getAttribute('admin_reply');
            if ($this->reply) {
                $this->reply[$this->form->getCSRFFieldName()] =
                    $this->form->getCSRFToken();
                if ($request->getParameter('type')) {
                    $this->reply['mailtext'] = $letter[0];
                }
                $this->form->bind($this->reply);
            } else {
                $this->form->setDefault('mailtext', $letter[0]);
            }
        }

        if ($ua == 'pc') {
            $this->mail_subject =
                reserveReplyPc::getMailSubject(
                    $this->reserve, $this->decision);
        } else {
            $this->mail_subject =
                reserveReplyPc::getMailSubject(
                    $this->reserve, $this->decision);
        }

        $this->mail_bottom = $letter[1];
    }

    /**
     * unlockMailBottom
     *
     * @param sfRequest $request A request object
     */
    public function executeUnlockMailBottom(sfWebRequest $request)
    {
        $this->reserve = $this->getUser()->getAttribute('admin_salon_reserve');
        $this->decision = $this->getUser()->getAttribute('admin_decision');
        if (!$this->reserve || !$this->decision) {
            $this->forward404();
        }
        if ($this->reserve['reply'] === '返信済') {
            $this->forward404();
        }

        $form = new ReplyForm();
        $form->setDefault(
            'mailtext2', $this->getUser()->getAttribute('admin_letter'));

        return $this->renderPartial('mail_bottom', array('form' => $form));
    }

   /**
    * Mailconfirm
    *
    * @param sfRequest $request A request object
    */
    public function executeMailconfirm(sfWebRequest $request)
    {
        $this->reply = $this->getUser()->getAttribute('admin_reply');
        $this->letter = $this->getUser()->getAttribute('admin_letter');
        if (!$this->reply || !$this->letter) {
            $this->redirect('salon_reserve_mailform');
        }
        $this->reserve = $this->getUser()->getAttribute('admin_salon_reserve');
        $this->decision = $this->getUser()->getAttribute('admin_decision');
        if (!$this->reserve || !$this->decision) {
            $this->redirect('salon_reserve_list');
        }

        $ua = sfContext::getInstance()->
            getConfiguration()->getDomeinType($this->reserve['email']);
        if ($ua == 'pc') {
            $this->mail_subject =
                reserveReplyPc::getMailSubject(
                    $this->reserve, $this->decision);
        } else {
            $this->mail_subject =
                reserveReplyPc::getMailSubject(
                    $this->reserve, $this->decision);
        }

        $this->mail_body = $this->reply['mailtext'] . "\n\n" . $this->letter;

        if ($request->isMethod(sfRequest::POST) ||
            $request->isMethod(sfRequest::PUT)) {
            if ($request->getParameter('back')) {
                $this->redirect('salon_reserve_mailform');
            } else {
                $ua = sfContext::getInstance()->
                    getConfiguration()->getDomeinType($this->reserve['email']);

                $mailer = $this->getMailer();
                if ($ua == 'pc') {
                    $message = new reserveReplyPc(
                        $this->reserve['email'],
                        $this->mail_subject,
                        $this->mail_body);
                } else {
                    $message = new reserveReplyMb(
                        $this->reserve['email'],
                        $this->mail_subject,
                        $this->mail_body);
                }
                $mailer->send($message);

                $this->reserve->setReply('返信済');
                $this->reserve->save();

                $this->getUser()->
                    getAttributeHolder()->remove('admin_salon_reserve');
                $this->getUser()->
                    getAttributeHolder()->remove('admin_decision');
                $this->getUser()->getAttributeHolder()->remove('admin_reply');
                $this->getUser()->getAttributeHolder()->remove('admin_letter');

                $this->redirect('salon_reserve_mailcomplete');
            }
        }
    }

   /**
    * Mailcomplete
    *
    * @param sfRequest $request A request object
    */
    public function executeMailcomplete(sfWebRequest $request)
    {
    }
}
