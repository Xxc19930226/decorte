<?php

/**
 * mail actions.
 *
 * @package    cosmedecorte
 * @subpackage mail
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 111 2011-06-08 05:00:22Z oda $
 */
class mailActions extends sfActions
{
    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->pager = new sfDoctrinePager('Mail', 15);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShow(sfWebRequest $request)
    {
        $this->mail = $this->getRoute()->getObject();
        $this->pager = new sfDoctrinePager('MailLog', 10);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->setQuery($this->mail->getLogsQuery());
        $this->pager->init();
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->getUser()->clearMail();
        $this->redirect('mail_input');
    }

    public function executeEdit(sfWebRequest $request)
    {
        $this->getUser()->clearMail();
        $this->getUser()->setMail($this->getRoute()->getObject());
        $this->redirect('mail_input');
    }

    public function executeInput(sfWebRequest $request)
    {
        $this->form = new MailForm($this->getUser()->getMail());

        if ($request->isMethod(sfRequest::POST) ||
            $request->isMethod(sfRequest::PUT)) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->updateObject();
                $this->getUser()->setMail($this->form->getObject());
                $this->redirect('mail_confirm');
            }
        }
    }

    public function executeConfirm(sfWebRequest $request)
    {
        if (!($this->mail = $this->getUser()->getMail())) {
            $this->redirect('mail_index');
        }

        if ($request->isMethod(sfRequest::POST)) {
            if (!$request->getParameter('register')) {
                $this->redirect('mail_input');
            }

            $this->mail->save();
            $this->getUser()->clearMail();
            $this->redirect('mail_index');
        }
    }

    public function executeDelete(sfWebRequest $request)
    {
        $mail = $this->getRoute()->getObject();
        $mail->delete();
        $this->redirect('mail_index');
    }

    public function executeListAuthors(sfWebRequest $request)
    {
        $this->pager = new sfDoctrinePager('MailAuthor', 15);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();

        $this->form = new MailAuthorForm();

        if ($request->isMethod(sfRequest::POST)) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->save();
                $this->redirect('mail_authors_list');
            }
        }
    }

    public function executeDeleteAuthor(sfWebRequest $request)
    {
        $author = $this->getRoute()->getObject();
        $author->delete();
        $this->redirect('mail_authors_list');
    }

    public function executeListGroups(sfWebRequest $request)
    {
        $this->pager = new sfDoctrinePager('MailGroup', 15);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
    }

    public function executeShowGroup(sfWebRequest $request)
    {
        $this->group = $this->getRoute()->getObject();
        $this->pager = new sfDoctrinePager('Member', 10);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->setQuery($this->group->getMembersQuery());
        $this->pager->init();
    }

    public function executeNewGroup(sfWebRequest $request)
    {
        $this->getUser()->clearMailGroup();
        $this->redirect('mail_group_input');
    }

    public function executeEditGroup(sfWebRequest $request)
    {
        $this->getUser()->clearMailGroup();
        $this->getUser()->setMailGroup($this->getRoute()->getObject());
        $this->redirect('mail_group_input');
    }

    public function executeInputGroup(sfWebRequest $request)
    {
        $this->form = new MailGroupForm($this->getUser()->getMailGroup());

        if ($request->isMethod(sfRequest::POST) ||
            $request->isMethod(sfRequest::PUT)) {
            $this->form->bind($request->getParameter($this->form->getName()));
            if ($this->form->isValid()) {
                $this->form->updateObject();
                $this->getUser()->setMailGroup($this->form->getObject());
                $this->redirect('mail_group_confirm');
            }
        }

        $this->logic_count = 0;
        $this->term_counts = array();
        foreach ($this->form['logics'] as $logic_idx => $logic_form) {
            $this->logic_count++;
            $this->term_counts[$logic_idx] = 0;
            foreach ($logic_form['terms'] as $term_form) {
                $this->term_counts[$logic_idx]++;
            }
        }
    }

    public function executeAddGroupLogic(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $logic_idx = $request->getParameter('logic_idx');
        $this->forward404If($logic_idx === null);

        $form = new MailGroupForm();
        $logic_form = $form->addLogicForm($logic_idx);
        $form->reembedForms();
        return $this->renderPartial(
            'mailGroupLogic',
            array('idx' => $logic_idx, 'form' => $form['logics'][$logic_idx]));
    }

    public function executeAddGroupLogicTerm(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());

        $logic_idx = $request->getParameter('logic_idx');
        $term_idx = $request->getParameter('term_idx');
        $this->forward404If($logic_idx === null);
        $this->forward404If($term_idx === null);

        $form = new MailGroupForm();
        $logic_form = $form->addLogicForm($logic_idx);
        $term_form = $logic_form->addTermForm($term_idx);
        $form->reembedForms();
        return $this->renderPartial(
            'mailGroupLogicTerm',
            array('form' => $form['logics'][$logic_idx]['terms'][$term_idx]));
    }

    public function executeConfirmGroup(sfWebRequest $request)
    {
        $this->group = $this->getUser()->getMailGroup();
        $this->forward404Unless($this->group);

        if ($request->isMethod(sfRequest::POST)) {
            if (!$request->getParameter('register')) {
                $this->redirect('mail_group_input');
            }

            $this->group->save();
            $this->getUser()->clearMailGroup();
            $this->redirect('mail_groups_list');
        }
    }

    public function executeDeleteGroup(sfWebRequest $request)
    {
        $group = $this->getRoute()->getObject();
        $group->delete();
        $this->redirect('mail_groups_list');
    }
}
