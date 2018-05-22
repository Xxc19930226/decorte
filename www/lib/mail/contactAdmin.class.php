<?php

class contactAdmin extends btJapaneseMessage {
    public function __construct($contact) {
        parent::__construct();

        $new_contact = array();
        foreach ($contact as $key => $value) {
            $new_contact[$key] =
                mb_convert_encoding(
                    $value, 'UTF-8', sfConfig::get('sf_charset'));
        }
        $contact = $new_contact;

        $url = sfContext::getInstance()->getRequest()->getUri();

        $content = mb_convert_encoding($contact['content'], 'SJIS','UTF-8');
        $content = btJapaneseMessage::regularize($content);
        $content = mb_convert_encoding($content, 'UTF-8', 'SJIS');

        $this->setFrom(sfConfig::get('app_contact_from_admin_mail'),'COSME DECORTE ');
        $this->setTo(sfConfig::get('app_contact_to_admin_mail'));

        $this->setSubject('コスメデコルテお問い合わせ内容');

        // XML方式対応
        $contents = 'コスメデコルテお問い合わせ内容'."\n";
        $contents .= $contact['articles_name']."\n";
        $contents .= $content."\n"; 

        $name = $contact['name_sei'].$contact['name_mei'];
        $name = preg_replace('/(\s|　)/','',$name);

        $name_kana = $contact['name_sei_kana'].$contact['name_mei_kana'];
        $name_kana = preg_replace('/(\s|　)/','',$name_kana); 
        $name_kana = mb_convert_kana($name_kana, "C", "UTF-8");
        $name_kana = mb_convert_kana($name_kana, "K", "UTF-8");

        $address = $contact['address1'].$contact['address2'];
        $address = preg_replace('/(\s|　)/','',$address);

        $tel = str_replace("-", "", $contact['tel']);
        if ($contact['tel_type']=='自宅') {
            $tel_number = '<attribute name="tel_number_1" value="'.$tel.'" />';
        } elseif ($contact['tel_type']=='会社') {
            $tel_number = '<attribute name="tel_number_2" value="'.$tel.'" />'; 
        } else {
            $tel_number = '<attribute name="tel_number_mobile" value="'.$tel.'" />';
        }

        $zip_code = str_replace("-", "", $contact['zip_code']);
        if ($contact['sex']=='女性') {
            $sex = 0;
        } elseif ($contact['sex']=='男性') {
            $sex = 1;
        } else {
            $sex = 2; 
        }

        $age = substr($contact['age'],-2,1);
        if (!$age || $age==0) {
            $age = 0;
        } elseif ($age>8) {
            $age = 8;
        }

        $this->setBody(
            '<mail>'."\n".
            '<attribute name="body_text">'."\n".
            '<value>'."\n".
            '<![CDATA['. $contents .']]>'."\n".
            '</value>'."\n".
            '</attribute>'."\n".
            '<attribute name="family_name_kanji">'."\n".
            '<value><![CDATA['. $name .']]></value>'."\n".
            '</attribute>'."\n".
            '<attribute name="family_name_kana">'."\n".
            '<value><![CDATA['. $name_kana .']]></value>'."\n".
            '</attribute>'."\n".
            '<attribute name="email" value="' .$contact['email']. '" />'."\n".
            '<attribute name="addr_zip_code" value="' .$zip_code. '" />'."\n".
            '<attribute name="address">'."\n".
            '<value><![CDATA['. $contact['prefecture'].$address .']]></value>'."\n".
            '</attribute>'."\n".
             $tel_number."\n".
            '<attribute name="seibetsu" value="' .$sex. '" />'."\n".
            '<attribute name="nenrei" value="' .$contact['age']. '" />'."\n".
            '<attribute name="nendai" value="' .$age. '" />'."\n".
            '</mail>'
        );
        $this->setContentType('text/plain');
    }
}
