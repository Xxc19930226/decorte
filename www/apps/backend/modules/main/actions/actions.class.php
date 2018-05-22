<?php

/**
 * main actions.
 *
 * @package    cosmedecorte
 * @subpackage main
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
    }

    public function executeLogin(sfWebRequest $request)
    {
        $form = new AdminLoginForm();

        if ($request->isMethod('post')) {
            $form->bind($request->getParameter($form->getName()));
            if ($form->isValid()) {
                $this->getUser()->setAuthenticated(true);
                $this->getUser()->setUserName($form->getUserName());
                $this->getUser()->addCredentials($form->getUserCredentials());
                $this->getUser()->setSalonShop($form->getShop());
                if ($this->getUser()->hasCredential('salonadmin') ||
                    $this->getUser()->hasCredential('salonstaff')) {
                    $this->redirect('salon_reserve_list');
                } else {
                    $this->redirect('homepage');
                }
            }
        }

        $this->form = $form;
    }

    public function executeLogout(sfWebRequest $request)
    {
        $this->getUser()->setAuthenticated(false);
        $this->getUser()->clearUserName();
        $this->getUser()->clearCredentials();
        $this->getUser()->clearSalonShop();
        $this->redirect('login');
    }

    public function executeSecure(sfWebRequest $request)
    {
        $this->redirect('homepage');
    }
}
