<?php

/**
 * contact actions.
 *
 * @package    cosmedecorte
 * @subpackage contact
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class contactActions extends sfActions
{

    /**
     *  お問い合わせ
     *
     *  @param sfRequest $request A request object
     */

    public function executeNotes(sfWebRequest $request)
    {
         $this->getUser()->getAttributeHolder()->remove('contact');
         $cont = sfContext::getInstance()->getConfiguration();
         if ($cont->getDeviceTypeString() == 'pc' ||
             $cont->getDeviceTypeString() == 'sp') {
             $this->redirect('contact_input');
         }
    }

    public function executeInput(sfWebRequest $request)
    {
         $this->has_error = false;
         $form = new ContactForm();
         if ($request->isMethod(sfRequest::POST)) {
             if ($request->getParameter('search')) {
                 $params = $request->getParameter($form->getName());
                 $address = Util::searchAddress($params['zip_code']);
                 $pre = mb_convert_encoding($address['prefecture'], 'UTF-8', 'SJIS');
                 $params['prefecture'] = $form->getPrefectureString($pre);
                 $params['address1'] = $address['address1'];
                 $form->bind($params);
             } else {
                 $form->bind($request->getParameter($form->getName()));
                 if ($form->isValid()) {
                     $this->getUser()->setAttribute('contact', $form->getValues());
                     $this->redirect('contact_confirm');
                 } else {
                     $this->has_error = true;
                 }
             }
         } else {
             if ($this->getUser()->getAttribute('contact')) {
                 $contact = $this->getUser()->getAttribute('contact');
                 $contact[$form->getCSRFFieldName()] = $form->getCSRFToken();
                 $form->bind($contact);
             } else {
                 $member = $this->getUser()->getLoginMember();
                 if ($member) {
                     $form->setDefault('name_sei',$member['name_sei']);
                     $form->setDefault('name_mei',$member['name_mei']);
                     $form->setDefault('name_sei_kana',$member['name_sei_kana']);
                     $form->setDefault('name_mei_kana',$member['name_mei_kana']);
                     $form->setDefault('email',$member['mail_pc']);
                     $form->setDefault('email2',$member['mail_pc']);
                     $form->setDefault('zip_code',$member['zip_code']);
                     $form->setDefault('prefecture',
                            $form->getPrefectureString($member['prefecture']));
                     $form->setDefault('address1',$member['address1']);
                     $form->setDefault('address2',$member['address2']);
                     $form->setDefault('sex',
                            $form->getSexString($member['sex']));
                     $form->setDefault('tel',$member['tel']);
                     $birth = explode('-', $member['birthday']);
                     $day = $birth[0].$birth[1].$birth[2];
                     $age = (int)((date("Ymd") - $day)/10000);
                     $form->setDefault('age',$age);
                 }
             }
         }
         $this->form = $form;
    }

    public function executeConfirm(sfWebRequest $request)
    {
        $this->contact = $this->getUser()->getAttribute('contact');
        $this->forward404Unless($this->contact);

        $form = new ContactForm();
        $this->contact['sex'] = $form->getSex
                                      ($this->contact['sex']);
        $this->contact['tel_type'] = $form->getTelType
                                            ($this->contact['tel_type']);
        $this->contact['prefecture'] = $form->getPrefecture
                                              ($this->contact['prefecture']);

        if ($request->isMethod(sfRequest::POST)) {
            if (!$request->getParameter('register')) {
                $this->redirect('contact_input');
            }
            $ua = sfContext::getInstance()->
                         getConfiguration()->getDomeinType($this->contact['email']);

            $mailer = $this->getMailer();
            if ($ua == 'pc') {
                 $message = new contactThanksPc($this->contact['email']);
            } else {
                 $message = new contactThanksMb($this->contact['email']);
            }
            $mailer->send($message);
            $message = new contactAdmin($this->contact);
            $mailer->send($message);

            $this->getUser()->getAttributeHolder()->remove('contact');
            $this->redirect('contact_complete');
        }
        $this->form = $form;
    }

    public function executeComplete(sfWebRequest $request)
    {
    }

}
