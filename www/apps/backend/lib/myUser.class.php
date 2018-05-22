<?php

class myUser extends sfBasicSecurityUser
{
    public function getUserName()
    {
        return $this->getAttribute('user_name');
    }

    public function setUserName($user_name)
    {
        $this->setAttribute('user_name', $user_name);
    }

    public function clearUserName()
    {
        $this->getAttributeHolder()->remove('user_name');
    }

    public function getSalonShop()
    {
        return $this->getAttribute('salon_shop');
    }

    public function setSalonShop(SalonShop $shop)
    {
        $this->setAttribute('salon_shop', $shop);
    }

    public function clearSalonShop()
    {
        $this->getAttributeHolder()->remove('salon_shop');
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

    public function getProduct()
    {
        $children = $this->getAttribute('product_children');
        $effect_ids = $this->getAttribute('product_effect_ids');
        $indexes = $this->getAttribute('product_indexes');
        $product = $this->getAttribute('product');
        if ($product) {
            $product->getChildren()->clear();
            if ($children && $children->count() > 0) {
                foreach ($children as $child) {
                    $child->setParent($product);
                    $product->getChildren()->add($child);
                }
            }

            $product->getEffects()->clear();
            if ($effect_ids && count($effect_ids) > 0) {
                $effect_table = EffectTable::getInstance();
                foreach ($effect_ids as $effect_id) {
                    $product->getEffects()->add(
                        $effect_table->find($effect_id));
                }
            }

            $product->getSearchIndexes()->clear();
            if ($indexes && $indexes->count() > 0) {
                foreach ($indexes as $index) {
                    $index->setProduct($product);
                    $product->getSearchIndexes()->add($index);
                }
            }
        }
        return $product;
    }

    public function setProduct(Product $product)
    {
        $children = $product->getChildren();
        $this->setAttribute('product_children', $children);

        $effect_ids = array();
        $effects = $product->getEffects();
        foreach ($effects as $effect) {
            $effect_ids[] = $effect->getId();
        }
        $this->setAttribute('product_effect_ids', $effect_ids);

        $indexes = $product->getSearchIndexes();
        $this->setAttribute('product_indexes', $indexes);

        $this->setAttribute('product', $product);
    }

    public function clearProduct()
    {
        $this->getAttributeHolder()->remove('product_children');
        $this->getAttributeHolder()->remove('product_effect_ids');
        $this->getAttributeHolder()->remove('product_indexes');
        $this->getAttributeHolder()->remove('product');
    }

    public function getMail()
    {
        return $this->getAttribute('mail');
    }

    public function setMail(Mail $mail)
    {
        $this->setAttribute('mail', $mail);
    }

    public function clearMail()
    {
        $this->getAttributeHolder()->remove('mail');
    }

    public function getMailGroup()
    {
        $group = $this->getAttribute('mail_group');
        if (!$group) {
            return null;
        }
        $group->unlink('Logics');

        $group_values = $this->getAttribute('mail_group_values');
        if ($group_values && is_array($group_values)) {
            $group->setName($group_values['name']);
            foreach ($group_values['Logics'] as $logic_values) {
                $logic = new MailGroupLogic();
                $logic->setOperator($logic_values['operator']);
                $group->getLogics()->add($logic);

                foreach ($logic_values['Terms'] as $term_values) {
                    $term = new MailGroupLogicTerm();
                    $term->setOperator($term_values['operator']);
                    $term->setColumnName($term_values['column_name']);
                    $term->setValue($term_values['value']);
                    $logic->getTerms()->add($term);
                }
            }
        }

        return $group;
    }

    public function setMailGroup(MailGroup $mail_group)
    {
        $this->setAttribute('mail_group', $mail_group);
        $this->setAttribute('mail_group_values', $mail_group->toArray());
    }

    public function clearMailGroup()
    {
        $this->getAttributeHolder()->remove('mail_group');
        $this->getAttributeHolder()->remove('mail_group_values');
    }

    public function getLine()
    {
        return $this->getAttribute('line');
    }

    public function setLine(Line $line)
    {
        $this->setAttribute('line', $line);
    }

    public function clearLine()
    {
        $this->getAttributeHolder()->remove('line');
    }

    public function getEffect()
    {
        return $this->getAttribute('effect');
    }

    public function setEffect(Effect $effect)
    {
        $this->setAttribute('effect', $effect);
    }

    public function clearEffect()
    {
        $this->getAttributeHolder()->remove('effect');
    }

    public function getCategory()
    {
        return $this->getAttribute('category');
    }

    public function setCategory(Category $category)
    {
        $this->setAttribute('category', $category);
    }

    public function clearCategory()
    {
        $this->getAttributeHolder()->remove('category');
    }

    public function getSubcategory()
    {
        return $this->getAttribute('subcategory');
    }

    public function setSubcategory(Subcategory $subcategory)
    {
        $this->setAttribute('subcategory', $subcategory);
    }

    public function clearSubcategory()
    {
        $this->getAttributeHolder()->remove('subcategory');
    }
}
