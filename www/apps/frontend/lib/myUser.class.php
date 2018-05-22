<?php

class myUser extends sfBasicSecurityUser
{
    public function getPreviousUrl()
    {
        return $this->getAttribute('previous_url');
    }

    public function setPreviousUrl($url)
    {
        $this->setAttribute('previous_url', $url);
    }

    public function getViewProducts()
    {
        $views = $this->getAttribute('product_views');
        if (!$views) {
            $views = array();
        }

        $view_products = array();
        foreach ($views as $view) {
            $view_products[] = $view->getProduct();
        }

        return $view_products;
    }

    public function countViewProducts()
    {
        $views = $this->getAttribute('product_views');
        if (!$views) {
            return 0;
        }

        return count($views);
    }

    public function addViewProduct(Product $product)
    {
        $member = $this->getLoginMember();
        $views =$this->getAttribute('product_views');
        $views = ProductViewTable::getInstance()->
            addProductToMember($member, $product, $views);
        $this->setAttribute('product_views', $views);

        return $this->getViewProducts();
    }

    public function getLoginMember()
    {
        return $this->getAttribute('login_member');
    }

    public function setLoginMember(Member $member)
    {
        $previous_member = $this->getLoginMember();
        if ($previous_member) {
            $this->setAttribute('previous_login_member', $previous_member);
        }
        $this->setAttribute('login_member', $member);
    }

    public function clearLoginMember($permanent_flag = false)
    {
        $member = $this->getLoginMember();
        if ($member) {
            $this->setAttribute('previous_login_member', $member);
        }
        $this->getAttributeHolder()->remove('login_member');
        if ($permanent_flag) {
            $this->getAttributeHolder()->remove('previous_login_member');
        }
    }

    public function getPreviousLoginMember()
    {
        return $this->getAttribute('previous_login_member');
    }

    public function getSupposedCurrentMember()
    {
        if ($this->isLoggedIn()) {
            return $this->getLoginMember();
        } else {
            return $this->getPreviousLoginMember();
        }
    }

    public function isLoggedIn()
    {
        if ($this->getLoginMember()) {
            return true;
        } else {
            return false;
        }
    }

    public function getMember()
    {
        return $this->getAttribute('member');
    }

    public function setMember(Member $member)
    {
        $this->setAttribute('member', $member);
    }

    public function clearMember()
    {
        $this->getAttributeHolder()->remove('member');
    }

    public function getMemberShiftFlag()
    {
        return $this->getAttribute('member_shift_flag');
    }

    public function setMemberShiftFlag($flag)
    {
        $this->setAttribute('member_shift_flag', $flag);
    }

    public function clearMemberShiftFlag()
    {
        $this->getAttributeHolder()->remove('member_shift_flag');
    }

    public function getExistingMobile()
    {
        return $this->getAttribute('existing_mobile');
    }

    public function setExistingMobile(ExistingMobile $existing_mobile)
    {
        $this->setAttribute('existing_mobile', $existing_mobile);
    }

    public function clearExistingMobile()
    {
        $this->getAttributeHolder()->remove('existing_mobile');
    }

    // campaign 20120720
    public function getEnquete()
    {
        return $this->getAttribute('campaign_enquete');
    }

    public function setEnquete($flag)
    {
        $this->setAttribute('campaign_enquete', $flag);
    }

    public function clearEnquete()
    {
        $this->getAttributeHolder()->remove('campaign_enquete');
    }

    public function getLoginMail()
    {
        return $this->getAttribute('login_mail');
    }

    public function setLoginMail($flag)
    {
        $this->setAttribute('login_mail', $flag);
    }

    public function clearLoginMail()
    {
        $this->getAttributeHolder()->remove('login_mail');
    }

    public function getCampaign()
    {
        return $this->getAttribute('campaign_flag');
    }

    public function setCampaign($flag)
    {
        $this->setAttribute('campaign_flag', $flag);
    }

    public function clearCampaign()
    {
        $this->getAttributeHolder()->remove('campaign_flag');
    }
    // campaign 20120720
}
