<?php

/**
 * salon_login_edit actions.
 *
 * @package    cosmedecorte
 * @subpackage salon_login_edit
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class salon_login_editActions extends sfActions
{
   /**
    * Executes index action
    *
    * @param sfRequest $request A request object
    */
    public function executeIndex(sfWebRequest $request)
    {
        $this->filters = new SalonLoginFormFilter();
        $this->filters->bind();
        $this->pager = new sfDoctrinePager('AdminUser', 20);
        $query = $this->filters->getSearchQuery();
        $this->pager->setQuery($query);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

   /**
    * Delete 
    *
    * @param sfRequest $request A request object
    */
    public function executeDelete(sfWebRequest $request)
    {
        $this->staff = $this->getRoute()->getObject();
        if ($this->staff) {
            $this->staff->delete();
        }
        $this->redirect('salon_login_list');
    }


   /**
    * Credent Edit
    *
    * @param sfRequest $request A request object
    */
    public function executeShow(sfWebRequest $request)
    {
        $this->staff= $this->getRoute()->getObject();
         
        $credentials = $this->staff['credentials'];
        $credentials = str_replace("salonadmin", 1, $credentials); 
        $credentials = str_replace("salonstaff", 2, $credentials); 
//        $this->staff['credentials'] = explode( ",",$credentials );
        $this->staff['credentials'] = $credentials;
        $this->getUser()->getAttributeHolder()->remove('admin_staff');
        $this->getUser()->setAttribute('admin_staff', $this->staff);
        $this->redirect('salon_login_cre');
    }

    public function executeEditcre(sfWebRequest $request)
    {
        $this->regist_flag = false;
        $this->staff = $this->getUser()->getAttribute('admin_staff');
        if (!$this->staff) {
            $this->redirect('salon_login_list');
        }

        $this->form = new SalonLoginCredentForm($this->getUser()->getAttribute('admin_staff'));  

        if ($request->isMethod(sfRequest::POST) ||
            $request->isMethod(sfRequest::PUT)) {
            if ($request->getParameter('back')) {
                $this->redirect('salon_login_list');
            } else {
                $this->form->bind($request->getParameter($this->form->getName()));
                if ($this->form->isValid()) {
                    $this->form->updateObject();
                    $this->staff = $this->form->getObject();
                    $credentials = $this->form->getCredString($this->staff['credentials']);
                    $this->staff->setCredentials(implode(',',$credentials));
                    $this->staff->save();
                    $this->regist_flag = true;                  
                }
            }
        }
    }

   /**
    * Password Edit 
    *
    * @param sfRequest $request A request object
    */
    public function executeShowpass(sfWebRequest $request)
    {
        $this->editstaff= $this->getRoute()->getObject();
        $this->editstaff['password'] = "";
        $this->getUser()->getAttributeHolder()->remove('admin_staff');
        $this->getUser()->setAttribute('admin_staff', $this->editstaff);
        $this->redirect('salon_login_pass');
    }

    public function executeEditpass(sfWebRequest $request)
    {
        $this->regist_flag = false;
        $this->editstaff = $this->getUser()->getAttribute('admin_staff');
        if (!$this->editstaff) {
            $this->redirect('salon_login_list');
        }

        $this->form = new SalonLoginPasswordForm($this->getUser()->getAttribute('admin_staff'));

        if ($request->isMethod(sfRequest::POST) ||
            $request->isMethod(sfRequest::PUT)) {

            if ($request->getParameter('back')) {
                $this->redirect('salon_login_list');
            } else {
                $this->form->bind($request->getParameter($this->form->getName()));
                if ($this->form->isValid()) {
                    $this->form->updateObject();
                    $this->editstaff = $this->form->getObject();
                    $this->editstaff->setPassword(sha1($this->editstaff['password'])); 
                    $this->editstaff->save();
                    $this->regist_flag = true;
                }
            }
        }
    }

   /**
    * New 
    *
    * @param sfRequest $request A request object
    */
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new SalonLoginNewForm();
        $this->hasError = false;

        if ($request->isMethod(sfRequest::POST) ||
            $request->isMethod(sfRequest::PUT)) {
            if ($request->getParameter('back')) {
                $this->redirect('salon_login_list');
            } else {
                $this->form->bind($request->getParameter($this->form->getName()));
                if ($this->form->isValid()) {
                    $this->form->updateObject();
                    $this->newstaff = $this->form->getObject();
                    $credentials = $this->form->getCredString($this->newstaff['credentials']);
                    $this->newstaff->setCredentials(implode(',',$credentials));
                    $this->newstaff->setPassword(sha1($this->newstaff['password']));
                    $user = AdminUserTable::getInstance()->findOneByUserName($this->newstaff['user_name']);
                    if ($user) { 
                        $this->hasError = true;
 					} else {
                        $this->newstaff->save();
                        $this->redirect('salon_login_list');
                    }
                }
            }
        }
    }

    public function executeNewConf(sfWebRequest $request)
    {
        $this->regist_flag = false;
        $this->staff = $this->getUser()->getAttribute('admin_staff');
        if (!$this->staff) {
            $this->redirect('salon_login_list');
        }

        if ($request->isMethod(sfRequest::POST)) {
            if ($request->getParameter('back')) {
                $this->redirect('salon_login_cre');
            }
            $this->staff->save();
            $this->regist_flag = true;
        }
    }
}
