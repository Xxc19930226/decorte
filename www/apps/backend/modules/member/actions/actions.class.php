<?php

require_once dirname(__FILE__).'/../lib/memberGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/memberGeneratorHelper.class.php';

/**
 * member actions.
 *
 * @package    cosmedecorte
 * @subpackage member
 * @author     BROADTECH INC.
 * @version    SVN: $Id: actions.class.php 12 2011-05-12 03:42:19Z oda $
 */
class memberActions extends autoMemberActions
{
    public function executeOutputMailList(sfWebRequest $request)
    {
        $today = date('Ymd');
        $content = '';

        if ($request->getParameter('list_mobile')) {
            $filename = "decorte_mobile_$today.csv";
            $content = ",,,\n";

            $members = MemberTable::getInstance()->
                createQuery()->select('mail_mobile')->
                where('temp_flag = ?', false)->
                addWhere('mail_mobile_flag = ?', true)->
                addWhere('mail_mobile_approval_flag = ?', true)->
                addWhere('job != ?', '')->
                addWhere('nick_name != ?', '')->
                fetchArray();
            foreach ($members as $member) {
                $content .= sprintf(",,%s,\n", $member['mail_mobile']);
            }

            $members = ExistingMobileTable::getInstance()->
                createQuery('em')->
                leftJoin('em.ExistingWithdrawal ew')->
                select('em.mail_mobile, ew.id')->
                where('mail_block_flag = ?', false)->
                fetchArray();
            foreach ($members as $member) {
                $content .= sprintf(
                    ",,%s,%s\n",
                    $member['mail_mobile'],
                    $member['ExistingWithdrawal']['0']['id']);
            }
        } else {
            $filename = "decorte_pc_$today.csv";
            $content = ",,\n";

            $members = MemberTable::getInstance()->
                createQuery()->select('mail_pc')->
                where('temp_flag = ?', false)->
                addWhere('mail_pc_flag = ?', true)->
                addWhere('mail_pc_approval_flag = ?', true)->
                fetchArray();
            foreach ($members as $member) {
                $content .= sprintf(",,%s\n", $member['mail_pc']);
            }
        }

        $response = $this->getResponse();
        $response->setContentType(
            "application/octet-stream; name = $filename");
        $response->setHttpHeader(
            'Content-disposition', "attachment; filename= $filename" );
        $response->addCacheControlHttpHeader('public');
        $response->setHttpHeader('Pragma', 'public');

        $response->setContent($content);
        return sfView::NONE;
    }
}
