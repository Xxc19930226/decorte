<?php

class btJapaneseMessage extends Swift_Message {
    protected static $non_top_chars = array(
        '、', '。', '，', '．', '・', '：', '；', '！', '？', '」', '』',
        '）', '｝', '〕', '］', '】', '!', '?', '%', ')', ']', '}', ',',
        '.', ':', ';', 'ー', 'ぁ', 'ぃ', 'ぅ', 'ぇ', 'ぉ', 'っ', 'ゃ',
        'ゅ', 'ょ', 'ゎ', 'ァ', 'ィ', 'ゥ', 'ェ', 'ォ', 'ッ', 'ャ', 'ュ',
        'ョ', 'ヮ', 'ヶ');

    protected static $non_tail_chars = array(
        '「', '『', '（', '｛', '〔', '［', '【', '(', '[', '{');

    protected static function mb_str2chars($s) {
        $bytes = unpack('C*', $s);
        $mb_chars = array();

        $is_top = true;
        $is_pre_1bytes = false;
        $c_buf = null;

        for ($i = 1; $i <= count($bytes); $i++) {
            if (((0x81 <= $bytes[$i] && $bytes[$i] <= 0x9f) ||
                 (0xe0 <= $bytes[$i] && $bytes[$i] <= 0xfc)) &&
                ((0x40 <= $bytes[$i + 1] && $bytes[$i + 1] <= 0x7e) ||
                 (0x80 <= $bytes[$i + 1] && $bytes[$i + 1] <= 0xfc))) {
                /*
                 * 2バイト文字の場合
                 */
                $c = pack('C*', $bytes[$i], $bytes[$i + 1]);

                if (!$is_top && in_array($c, self::$non_top_chars)) {
                    $pre_c = array_pop($mb_chars);
                    array_push($mb_chars, $pre_c . $c_buf . $c);
                    $c_buf = null;
                } else if (!$is_top && in_array($c, self::$non_tail_chars)) {
                    $c_buf .= $c;
                } else {
                    array_push($mb_chars, $c_buf . $c);
                    $c_buf = null;
                }

                $i++;
                $is_top = false;
                $is_pre_1bytes = false;
            } else {
                /*
                 * 1バイト文字の場合
                 */
                $c = pack('C*', $bytes[$i]);

                if ($c == "\r") {
                    continue;
                } else if ($c == "\n") {
                    if ($c_buf) {
                        array_push($mb_chars, $c_buf);
                    }
                    array_push($mb_chars, $c);
                    $is_top = true;
                    $is_pre_1bytes = false;
                    $c_buf = null;
                } else if (!$is_top && ($c == ' ' || $c == '-')) {
                    $pre_c = array_pop($mb_chars);
                    array_push($mb_chars, $pre_c . $c_buf . $c);
                    $is_top = false;
                    $is_pre_1bytes = false;
                    $c_buf = null;
                } else {
                    if (!$is_top && in_array($c, self::$non_top_chars)) {
                        $pre_c = array_pop($mb_chars);
                        array_push($mb_chars, $pre_c . $c_buf . $c);
                        $c_buf = null;
                    } else if (!$is_top &&
                               in_array($c, self::$non_tail_chars)) {
                        $c_buf .= $c;
                    } else if ($is_pre_1bytes) {
                        if (!$c_buf) {
                            $pre_c = array_pop($mb_chars);
                        } else {
                            $pre_c = null;
                        }
                        array_push($mb_chars, $pre_c . $c_buf . $c);
                        $c_buf = null;
                    } else {
                        array_push($mb_chars, $c_buf . $c);
                        $c_buf = null;
                    }

                    $is_top = false;
                    $is_pre_1bytes = true;
                }
            }
        }

        if ($c_buf) {
            array_push($mb_chars, $c_buf);
        }

        return $mb_chars;
    }

    protected static function regularize($s) {
        $chars = self::mb_str2chars($s);
        $len = 0;
        $regularized = '';

        while (count($chars) > 0) {
            $c = array_shift($chars);
            $clen = strlen($c);

            if ($c == "\n") {
                $regularized .= "\r\n";
                $len = 0;
            } else if ($len + $clen > 58) {
                array_unshift($chars, $c);
                $regularized .= "\r\n";
                $len = 0;
            } else {
                $regularized .= $c;
                $len += $clen;
            }
        }

        return $regularized;
    }

    protected static function convertVariables($text, $vals) {
        foreach ($vals as $key => $val) {
            $text = str_replace('${' . $key . '}', $val, $text);
        }

        return $text;
    }

    public function __construct($subject = null, $body = null,
                                $content_type = null, $charset = null) {
        parent::__construct($subject, $body, $content_type, $charset);

        $this->setCharset('ISO-2022-JP');
        $this->setEncoder(Swift_Encoding::get7BitEncoding());
    }

    public function setSubject($subject) {
        if ($subject) {
              $str = mb_convert_encoding($subject, "ISO-2022-JP","UTF-8");
              ini_set('mbstring.internal_encoding', 'ISO-2022-JP');
              $str = mb_encode_mimeheader($subject, "ISO-2022-JP");
              ini_set('mbstring.internal_encoding', 'UTF-8');
              $subject = mb_encode_mimeheader($subject, 'JIS', 'B', '');
        }
        parent::setSubject($subject);

        return $this;
    }

    public function setBody($body, $content_type = null, $charset = null) {
        if ($body) {
            $body = mb_convert_encoding($body, 'SJIS');
//            $body = self::regularize($body);
            $body = mb_convert_encoding($body, 'JIS', 'SJIS');
        }

        parent::setBody($body, $content_type, $charset);

        return $this;
    }

}
