<?php

/**
 * Product
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    cosmedecorte
 * @subpackage model
 * @author     BROADTECH INC.
 * @version    SVN: $Id: Product.class.php 1390 2016-03-08 09:18:19Z oda $
 */
class Product extends BaseProduct
{
    protected $same_line_products = null;
    protected $great_friend_products = null;

    protected function convertSpecialChars($s)
    {
        $reg = '®';
        $reg = mb_convert_encoding($reg, sfConfig::get('sf_charset'), 'UTF-8');
        return str_replace('(R)', $reg, $s);
    }

    /**
     * 商品名を返却する。
     *
     * @return string 商品名
     */
    public function getName()
    {
        return $this->convertSpecialChars(parent::_get('name'));
    }

    /**
     * 半角文字を使用した商品名を返却する。
     *
     * @return string 半角文字を使用した商品名
     */
    public function getHName()
    {
        return Util::convertStringIntoHalfWidth(parent::_get('name'));
    }

    /**
     * 適切な位置で改行した商品名を返却する。
     *
     * @return string 適切な位置で改行した商品名
     */
    public function getLinedName()
    {
        $name = $this->getName();
        $name = mb_convert_kana($name, 's', sfConfig::get('sf_charset'));
        $name = preg_replace('/ +/', ' ', $name);

        $lined_name = '';
        $current_line = '';
        foreach (explode(' ', $name) as $piece) {
            if ($current_line &&
                mb_strlen($current_line . ' ' . $piece,
                          sfConfig::get('sf_charset')) > 11) {
                if ($lined_name) {
                    $lined_name .= "\n";
                }
                $lined_name .= $current_line;
                $current_line = '';
            }

            if ($current_line) {
                $current_line .= ' ';
            }
            $current_line .= $piece;
        }

        if ($current_line) {
            if ($lined_name) {
                $lined_name .= "\n";
            }
            $lined_name .= $current_line;
        }

        return $lined_name;
    }

    /**
     * 長い商品名を返却する。
     *
     * @return string 長い商品名
     */
    public function getLongName()
    {
        $line = $this->getLine();

        if ($line->getMajorFlag()) {
            $separator = mb_convert_encoding(
                '　', sfConfig::get('sf_charset'), 'UTF-8');
            return $line->getName() . $separator . $this->getName();
        } else {
            return $this->getName();
        }
    }

    /**
     * 半角文字を使用した長い商品名を返却する。
     *
     * @return string 半角文字を使用した長い商品名
     */
    public function getHLongName()
    {
        $line = $this->getLine();

        if ($line->getMajorFlag()) {
            $separator = mb_convert_encoding(
                '　', sfConfig::get('sf_charset'), 'UTF-8');
            return $line->getHName() . $separator . $this->getHName();
        } else {
            return $this->getHName();
        }
    }

    /**
     * 商品概要を返却する。
     *
     * @return string 商品概要
     */
    public function getOutline()
    {
        return $this->convertSpecialChars(parent::_get('outline'));
    }

    /**
     * 半角文字を使用した商品概要を返却する。
     *
     * @return string 半角文字を使用した商品概要
     */
    public function getHOutline()
    {
        return Util::convertStringIntoHalfWidth(parent::_get('outline'));
    }

    /**
     * 商品説明を返却する。
     *
     * @return string 商品説明
     */
    public function getExplanation()
    {
        return $this->convertSpecialChars(parent::_get('explanation'));
    }

    /**
     * 半角文字を使用した商品説明を返却する。
     *
     * @return string 半角文字を使用した商品説明
     */
    public function getHExplanation()
    {
        return Util::convertStringIntoHalfWidth(parent::_get('explanation'));
    }

    /**
     * 商品容量を返却する。
     *
     * @return string 商品容量
     */
    public function getCapacity()
    {
        return $this->convertSpecialChars(parent::_get('capacity'));
    }

    /**
     * 半角文字を使用した商品容量を返却する。
     *
     * @return string 半角文字を使用した商品容量
     */
    public function getHCapacity()
    {
        return Util::convertStringIntoHalfWidth(parent::_get('capacity'));
    }

    /**
     * 税込価格を返却する。
     *
     * @return integer 税込価格
     */
    public function getTaxedPrice()
    {
        $tax = sfConfig::get('app_product_tax');
        $tax /= 100;
        return $this->getPrice() + ($this->getPrice() * $tax);
    }

    /**
     * 商品使用方法を返却する。
     *
     * @return string 商品使用方法
     */
    public function getHowTo()
    {
        return $this->convertSpecialChars(parent::_get('how_to'));
    }

    /**
     * 半角文字を使用した商品使用方法を返却する。
     *
     * @return string 半角文字を使用した商品使用方法
     */
    public function getHHowTo()
    {
        return Util::convertStringIntoHalfWidth(parent::_get('how_to'));
    }

    /**
     * 補足事項1を返却する。
     *
     * @return string 補足事項1
     */
    public function getSupplement1()
    {
        return $this->convertSpecialChars(parent::_get('supplement1'));
    }

    /**
     * 半角文字を使用した補足事項1を返却する。
     *
     * @return string 半角文字を使用した商品使用方法
     */
    public function getHSupplement1()
    {
        return Util::convertStringIntoHalfWidth(parent::_get('supplement1'));
    }

    /**
     * 補足事項2を返却する。
     *
     * @return string 補足事項2
     */
    public function getSupplement2()
    {
        return $this->convertSpecialChars(parent::_get('supplement2'));
    }

    /**
     * 半角文字を使用した補足事項2を返却する。
     *
     * @return string 半角文字を使用した商品使用方法
     */
    public function getHSupplement2()
    {
        return Util::convertStringIntoHalfWidth(parent::_get('supplement2'));
    }

    /**
     * 商品が属するラインのスラッグを返却する。
     */
    public function getLineSlug()
    {
        return $this->getLine()->getSlug();
    }

    /**
     * 商品が属するラインの他の商品を返却する。
     *
     * @return array ラインが同一の他の商品
     */
    public function getSameLineProducts()
    {
        if (!$this->same_line_products) {
            $this->same_line_products =
                ProductTable::getInstance()->createQuery('p')->
                where('p.line_id = ?', $this->getLineId())->
                addWhere('p.id != ?', $this->getId())->
                addWhere('p.search_only_flag = ?', false)->
                orderBy('p.line_priority')->
                execute();
        }

        return $this->same_line_products;
    }

    /**
     * 商品画像ファイルの絶対パスを取得する。
     */
    public function getAbsoluteImagePath()
    {
        return sfConfig::get('sf_web_dir') .
            '/images/' . $this->getRelativeImagePath();
    }

    /**
     * 商品画像ファイルの相対パス(images からの相対パス)を取得する。
     */
    public function getRelativeImagePath()
    {
        return 'product/' .
            $this->getLineSlug() . '/' . $this->getSlug() . '.png';
    }

    /**
     * 色玉HTMLファイルの絶対パスを取得する。
     */
    public function getAbsoluteColorBallHtmlPath()
    {
        $relative_path = $this->getRelativeColorBallHtmlPath();
        if (!$relative_path) {
            return null;
        }

        return sfConfig::get('sf_web_dir') . '/images/' . $relative_path;
    }

    /**
     * 色玉HTMLファイルの相対パス(images からの相対パス)を取得する。
     */
    public function getRelativeColorBallHtmlPath()
    {
        if (!$this->getColorBallFlag()) {
            return null;
        }

        return 'product/' .
            $this->getLineSlug() . '/color/' . $this->getSlug() . '/' .
            $this->getSlug() . '.html';
    }

    /**
     * 商品のアクセスログを記録する。
     *
     * @param Member           $member       アクセスした会員
     * @param boolean          $is_logged_in アクセスしたユーザのログイン状態
     * @param ProductSearchLog $log          商品検索ログ
     */
    public function recordAccessLog(
        Member $member = null, $is_logged_in, $log = null)
    {
        $access_log = new ProductAccessLog();
        $access_log->setProduct($this);

        if ($member) {
            $access_log->setMemberId($member->getId());
            $access_log->setAge($member->getAge());
            $access_log->setPrefecture($member->getPrefecture());
        }

        $access_log->setLoginFlag($is_logged_in);

        if ($log) {
            $access_log->setSearchLog($log);
        }

        $access_log->save();
    }

    /**
     * 特に結びつきが強いフレンド商品を返却する。
     *
     * @return array 特に結びつきが強いフレンド商品
     */
    public function getGreatFriendProducts()
    {
        if (!$this->great_friend_products) {
            $product_friends =
                ProductFriendTable::getInstance()->createQuery('f')->
                leftJoin('f.Product2 p')->
                where('f.product_id1 = ?', $this->getId())->
                orderBy('f.relation_count DESC')->
                limit(sfConfig::get('app_product_great_friends_max'))->
                execute();

            $this->great_friend_products = array();
            foreach ($product_friends as $product_friend) {
                $this->great_friend_products[] =
                    $product_friend->getProduct2();
            }
        }

        return $this->great_friend_products;
    }

    /**
     * 2つの商品をフレンド商品として結びつける。
     *
     * @param Product $product1 1つめの商品
     * @param Product $product2 2つめの商品
     */
    protected function tieUpProducts(Product $product1, Product $product2)
    {
        $product_friend =
            ProductFriendTable::getInstance()->createQuery()->
            forUpdate(true)->
            where('product_id1 = ?', $product1->getId())->
            addWhere('product_id2 = ?', $product2->getId())->
            fetchOne();

        if ($product_friend) {
            $product_friend->setRelationCount(
                $product_friend->getRelationCount() + 1);
        } else {
            $product_friend = new ProductFriend();
            $product_friend->setProduct1($product1);
            $product_friend->setProduct2($product2);
            $product_friend->setRelationCount(1);
        }

        $product_friend->save();
    }

    /**
     * 引数で渡された商品をフレンド商品として設定する。
     * 既にフレンド商品である場合は、その商品との結びつきをより強める。
     *
     * @param Product $product フレンド商品に設定する商品
     */
    public function addFriendProduct(Product $product)
    {
        /*
         * 同一の商品の場合は何もしない。
         * ※同一の商品はフレンドになれない。
         */
        if ($this->getId() == $product->getId()) {
            return;
        }

        $product1 = null;
        $product2 = null;
        if ($this->getId() < $product->getId()) {
            $product1 = $this;
            $product2 = $product;
        } else {
            $product1 = $product;
            $product2 = $this;
        }

        $conn = Doctrine_Manager::connection();

        $conn->beginTransaction();

        try {
            /*
             * フレンドとする2つの商品のレコードをロックする。
             * デッドロックを防ぐため、必ず id の小さいものから順にロックする。
             */
            ProductTable::getInstance()->createQuery()->
                forUpdate(true)->
                where('id = ?', $product1->getId())->
                execute();
            ProductTable::getInstance()->createQuery()->
                forUpdate(true)->
                where('id = ?', $product2->getId())->
                execute();

            $this->tieUpProducts($product1, $product2);
            $this->tieUpProducts($product2, $product1);

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollback();
            return;
        }
    }

    /**
     * オブジェクトの現在の内容を本番環境に反映させる。
     */
    public function liveup()
    {
        $line = $this->getLine();
        $category = $this->getCategory();
        $sub_category = $this->getSubCategory();
        $effects = array();
        foreach ($this->getEffects() as $effect) {
            $effects[] = $effect;
        }
        $ingredients = array();
        foreach ($this->getIngredients() as $ingredient) {
            $ingredients[] = $ingredient;
        }

        Doctrine_Manager::getInstance()->setCurrentConnection('livedb');

        $live_product =
            ProductTable::getInstance()->findOneBySlug($this->getSlug());

        $live_line = null;
        if ($line && $line->getId()) {
            $live_line =
                LineTable::getInstance()->findOneBySlug($line->getSlug());
            if (!$live_line) {
                Doctrine_Manager::getInstance()->
                    setCurrentConnection('doctrine');

                throw new NoLineException();
            }
        }

        $live_category = null;
        if ($category && $category->getId()) {
            $live_category =
                CategoryTable::getInstance()->
                findOneBySlug($category->getSlug());
            if (!$live_category) {
                Doctrine_Manager::getInstance()->
                    setCurrentConnection('doctrine');

                throw new NoCategoryException();
            }
        }

        $live_sub_category = null;
        if ($sub_category && $sub_category->getId()) {
            $live_sub_category =
                SubCategoryTable::getInstance()->
                findOneBySlug($sub_category->getSlug());
            if (!$live_sub_category) {
                Doctrine_Manager::getInstance()->
                    setCurrentConnection('doctrine');

                throw new NoSubCategoryException();
            }
        }

        $live_effects = array();
        foreach ($effects as $effect) {
            $live_effect =
                EffectTable::getInstance()->findOneBySlug($effect->getSlug());
            if (!$live_effect) {
                Doctrine_Manager::getInstance()->
                    setCurrentConnection('doctrine');

                throw new NoEffectException();
            }
            $live_effects[] = $live_effect;
        }

        if ($live_product) {
            $values = $this->toArray();
            unset($values['id']);
            unset($values['created_at']);
            unset($values['updated_at']);
            unset($values['Effects']);
            $live_product->fromArray($values);
            $live_product->setUpdatedAt(null);
        } else {
            $live_product = $this->copy();
            $live_product->setCreatedAt(null);
            $live_product->setUpdatedAt(null);
        }

        /*
         * 下記の処理を実行しないと新規(INSERT)の場合に何故か outline と
         * explanation に空文字を設定できない。
         */
        if ($live_product->getOutline() === '') {
            $live_product->setOutline('0');
            $live_product->setOutline('');
        }
        if ($live_product->getExplanation() === '') {
            $live_product->setExplanation('0');
            $live_product->setExplanation('');
        }

        $live_product->setLine($live_line);
        $live_product->setCategory($live_category);
        $live_product->setSubCategory($live_sub_category);
        $live_product->getEffects()->clear();
        foreach ($live_effects as $live_effect) {
            $live_product->getEffects()->add($live_effect);
        }
        $live_product->getIngredients()->clear();
        foreach ($ingredients as $ingredient) {
            $live_ingredient = $ingredient->copy();
            $live_ingredient->setCreatedAt(null);
            $live_ingredient->setUpdatedAt(null);
            $live_ingredient->setProduct($live_product);
            $live_product->getIngredients()->add($live_ingredient);
        }
        $live_product->
            save(Doctrine_Manager::getInstance()->getConnection('livedb'));

        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
    }
}
