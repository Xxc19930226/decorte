<?php

class frontendConfiguration extends sfApplicationConfiguration
{
    const DEVICE_TYPE_PC = 1;
    const DEVICE_TYPE_FEATURE_PHONE = 2;
    const DEVICE_TYPE_SMART_PHONE = 3;

    public function isInForcePcMode()
    {
        $mode = isset($_COOKIE['mode']) ? $_COOKIE['mode'] : '';
        if ($mode && $mode == self::DEVICE_TYPE_PC) {
            return true;
        } else {
            return false;
        }
    }

    public function setForcePcMode()
    {
        setcookie('mode', frontendConfiguration::DEVICE_TYPE_PC,
                  0, '/', $_SERVER["HTTP_HOST"]);
    }

    public function resetForcePcMode()
    {
        setcookie('mode', null, 0, '/', $_SERVER["HTTP_HOST"]);
    }

    public function getDeviceType()
    {
        $url = @$_SERVER['REQUEST_URI'];
        if (preg_match('/^\/campaign\/tgc2013\//', $url) ||
            preg_match('/^\/sp\/campaign\/tgc2013\//', $url) ||
            preg_match('/^\/campaign\/entry/', $url) ||
            preg_match('/^\/campaign\/member\//', $url) ||
            preg_match('/^\/campaign\/entry\/login/', $url)) {
            return $this->getRawDeviceType();
        } else {
            if ($this->isInForcePcMode()) {
                return self::DEVICE_TYPE_PC;
            }

            return $this->getRawDeviceType();
        }
    }

    public function getRawDeviceType()
    {
        $ua = @$_SERVER['HTTP_USER_AGENT'];
        if (preg_match('/^DoCoMo/', $ua) ||
            preg_match('/^KDDI/',$ua) ||
            preg_match('/^SoftBank/', $ua) ||
            preg_match('/^Vodafone/', $ua) ||
            preg_match('/^MOT-C980/', $ua) ||
            preg_match('/^MOT-V980/', $ua)) {
            return self::DEVICE_TYPE_FEATURE_PHONE;
        } else if (preg_match('/^Mozilla[^\(]*\(iPhone/', $ua) ||
                   preg_match('/^Mozilla[^\(]*\(iPod/', $ua) ||
                   preg_match('/^Mozilla.*Android.*Mobile/', $ua)) {
            return self::DEVICE_TYPE_SMART_PHONE;
        } else {
            return self::DEVICE_TYPE_PC;
        }
    }

    public function getDeviceTypeString()
    {
        $type = $this->getDeviceType();
        if ($type == self::DEVICE_TYPE_FEATURE_PHONE) {
            return 'mb';
        } else if ($type == self::DEVICE_TYPE_SMART_PHONE) {
            return 'sp';
        } else {
            return 'pc';
        }
    }

    public function getRawDeviceString()
    {
        $type = $this->getRawDeviceType();
        if ($type == self::DEVICE_TYPE_FEATURE_PHONE) {
            return 'mb';
        } else if ($type == self::DEVICE_TYPE_SMART_PHONE) {
            return 'sp';
        } else {
            return 'pc';
        }
    }

    protected function getDeviceDir()
    {
        return $this->getDeviceTypeString();
    }

    public function configure()
    {
        $this->dispatcher->connect(
            'context.load_factories',
            array($this, 'setCurrentConnection'));
        $this->dispatcher->connect(
            'doctrine.configure_connection',
            array($this, 'listenToDoctrineConfigureConnection'));
        $this->dispatcher->connect(
            'form.post_configure',
            array($this, 'listenToFormPostConfigure'));

        sfWidget::setXhtml(false);
    }

    public function setCurrentConnection(sfEvent $event)
    {
        Doctrine_Manager::getInstance()->setCurrentConnection('doctrine');
    }

    public function listenToDoctrineConfigureConnection(sfEvent $event)
    {
        $params = $event->getParameters();
        $conn = $params['connection'];

        $type = $this->getDeviceType();
        if ($type == self::DEVICE_TYPE_FEATURE_PHONE) {
            $conn->setCharset('cp932');
        } else {
            $conn->setCharset('UTF8');
        }

        $conn->getDbh()->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public function convertStringForFeaturePhone($s, $kana_conv_flag = true)
    {
        $s = mb_convert_encoding($s, 'SJIS', 'UTF-8');
        if ($kana_conv_flag) {
            $s = Util::convertStringIntoHalfWidth($s);
        }

        return $s;
    }

    protected function resetValidatorForFeaturePhone(
        sfValidatorBase $validator) {
        if ($validator instanceof sfValidatorAnd ||
            $validator instanceof sfValidatorOr) {
            foreach ($validator->getValidators() as $child_validator) {
                $this->resetValidatorForFeaturePhone($child_validator);
            }
        }

        $messages = $validator->getMessages();
        foreach ($messages as $name => $message) {
            $validator->setMessage(
                $name,
                $this->convertStringForFeaturePhone($message));
        }

        if ($validator instanceof sfValidatorChoice) {
            $choices = $validator->getChoices();
            $new_choices = array();
            foreach ($choices as $value) {
                $value = $this->convertStringForFeaturePhone($value, false);
                $new_choices[] = $value;
            }

            $validator->setOption('choices', $new_choices);
        }
    }

    public function listenToFormPostConfigure(sfEvent $event)
    {
        $type = $this->getDeviceType();
        if ($type != self::DEVICE_TYPE_FEATURE_PHONE) {
            return;
        }

        $form = $event->getSubject();

        foreach ($form->getWidgetSchema()->getFields() as $widget) {
            $label = $widget->getLabel();
            if ($label) {
                $widget->setLabel($this->convertStringForFeaturePhone($label));
            }

            if ($widget instanceof sfWidgetFormChoiceBase) {
                $choices = $widget->getChoices();
                $new_choices = array();
                foreach ($choices as $key => $value) {
                    $key = $this->convertStringForFeaturePhone($key, false);
                    $value = $this->convertStringForFeaturePhone($value);
                    $new_choices[$key] = $value;
                }

                $widget->setOption('choices', $new_choices);
            }

            if ($widget instanceof sfWidgetFormDate) {
                $format = $widget->getOption('format');
                if ($format) {
                    $widget->setOption(
                        'format',
                        $this->convertStringForFeaturePhone($format));
                }
            }
        }

        foreach ($form->getValidatorSchema()->getFields() as $validator) {
            $this->resetValidatorForFeaturePhone($validator);
        }
        $post_validator = $form->getValidatorSchema()->getPostValidator();
        if ($post_validator) {
            $this->resetValidatorForFeaturePhone($post_validator);
        }

        $helps = $form->getWidgetSchema()->getHelps();
        foreach ($helps as $name => $help) {
            $form->getWidgetSchema()->setHelp(
                $name,
                $this->convertStringForFeaturePhone($help));
        }

        $form->getWidgetSchema()->setCharset('Shift_JIS');
        $form->getValidatorSchema()->setCharset('Shift_JIS');
    }

    public function initialize()
    {
        $timeout = 60 * 60 * 2;
        ini_set('session.cookie_lifetime', 0);
        ini_set('session.gc_maxlifetime', $timeout);

        $type = $this->getDeviceType();
        if ($type == self::DEVICE_TYPE_FEATURE_PHONE) {
            $charset = 'Shift_JIS';
            ini_set('session.use_trans_sid', '1');
            ini_set('session.use_cookies', 'Off');
            ini_set('session.use_only_cookies', 'Off');
        } else {
            $charset = 'UTF-8';
        }

        sfConfig::set('sf_charset', $charset);
        sfConfig::set(
            'sf_factory_response_parameters',
            array_merge(
                array('http_protocol' =>
                      isset($_SERVER['SERVER_PROTOCOL']) ?
                      $_SERVER['SERVER_PROTOCOL'] : null),
                array('logging' => '1',
                      'charset' => $charset,
                      'send_http_headers' => true)));
        mb_internal_encoding($charset);
    }

    public function getTemplateDirs($module_name)
    {
        $dirs = parent::gettemplateDirs($module_name);
        $additional_dir =
            sfConfig::get('sf_web_dir') . '/templates/' . $module_name;
        if ($module_name == 'reserve') {
            $additional_dir .= '/' . $this->getDeviceDir();
        }
        array_unshift($dirs, $additional_dir);
        return $dirs;
    }

    public function getDecoratorDirs()
    {
        $dirs = parent::getDecoratorDirs();
        $additional_dir = sfConfig::get('sf_web_dir') . '/templates/layout';
        array_unshift($dirs, $additional_dir);
        return $dirs;
    }

    public function getDomeinType($mail)
    {
        if (preg_match( "/@(docomo|softbank|disney|ezweb|[dhtkrsnqc]\.vodafone|pdx|d[kij]\.pdx|wm\.pdx)\.ne\.jp$/i", $mail) ||
            preg_match("/@(jp-[dhtkrsnqc]\.ne\.jp|i\.softbank\.jp|willcom\.com|[a-z]+\.biz\.ezweb\.ne\.jp)$/i", $mail))
        {
            return 'mb';
        } else {
            return 'pc';
        }
    }
}
