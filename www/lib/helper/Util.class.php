<?php

class Util
{
    const ENCRYPTION_KEY = 'j!U-I5=*b';
    const ENCRYPTION_IV = 'OEMQHPDR';

    const IMAGE_TYPE_GIF = 1;
    const IMAGE_TYPE_JPEG = 2;
    const IMAGE_TYPE_PNG = 3;

    /**
     * 指定された文字列を暗号化して返却する。
     *
     * @param string $s 暗号化する文字列
     * @return string 暗号化された文字列
     */
    public static function encrypt($s)
    {
        $s = mcrypt_cbc(
            MCRYPT_TRIPLEDES, self::ENCRYPTION_KEY, $s,
            MCRYPT_ENCRYPT, self::ENCRYPTION_IV);
        $s = base64_encode($s);
        $s = preg_replace('/\//', '_', preg_replace('/\+/', '-', $s));
        $s =  preg_replace('/=/', '', $s);
        return $s;
    }

    /**
     * 指定された文字列を復号化して返却する。
     *
     * @param string $s 復号化する文字列
     * @return string 復号化された文字列
     */
    public static function decrypt($s)
    {
        $s =  preg_replace('/_/', '/', preg_replace('/\-/', '+', $s));
        $s = str_pad(
            $s, ((ceil(strlen($s) / 4)) * 4), '=', STR_PAD_RIGHT);
        $s = base64_decode($s);
        $s = mcrypt_cbc(
            MCRYPT_TRIPLEDES, self::ENCRYPTION_KEY,
            $s, MCRYPT_DECRYPT, self::ENCRYPTION_IV);
        return trim($s);
    }

    /**
     * 郵便番号から住所を検索する。
     *
     * @param string $zip_code 郵便番号(ハイフンなしの半角数字7桁)
     * @return array 検索された住所の情報
     */
    public static function searchAddress($zip_code)
    {
        $charset = sfConfig::get('sf_charset');

        $zip_code= str_replace("-","",$zip_code);

        $json_data = @file_get_contents(
               'http://www.broad.ne.jp/service/zip/_remote_call.php' .
               '?zip=' . $zip_code . '&charpref=1&charset=' . $charset);
        if (!$json_data) {
            return null;
        }

        $data = json_decode($json_data);

        return array(
            'prefecture' =>
            mb_convert_encoding($data->prefecture, $charset, 'UTF-8'),
            'address1' =>
            mb_convert_encoding(
                $data->address1 . $data->address2, $charset, 'UTF-8'));
    }

    public static function convertStringIntoHalfWidth($s)
    {
        if ($s) {
            return mb_convert_kana($s, 'ka');
        } else {
            return $s;
        }
    }

    /**
     * サムネイル画像を作成する。
     *
     * @param string  $org_file   元画像のファイルパス
     * @param integer $width      サムネイル画像の幅
     * @param integer $height     サムネイル画像の高さ
     * @param string  $back       サムネイル画像の背景色(RRGGBB指定)
     * @param string  $border     サムネイル画像の枠線色(RRGGBB指定)
     * @param integer $back_alpha サムネイル画像の背景色の透明度(0-127)
     */
    public static function createThumbnail(
        $org_file, $image_type, $width = null, $height = null,
        $back = null, $border = null, $back_alpha = null)
    {
        $org_image_size = getimagesize($org_file);
        $org_width = $org_image_size[0];
        $org_height = $org_image_size[1];

        if ($width && !$height) {
            $height = $org_height * ($width / $org_width);
        } else if (!$width && $height) {
            $width = $org_width * ($height / $org_height);
        }

        if ($border != null) {
            $width -= 2;
            $height -= 2;
        }

        $resize_ratio_x = $width / $org_width;
        $resize_ratio_y = $height / $org_height;

        if ($resize_ratio_x < $resize_ratio_y) {
            $resize_width = $width;
            $resize_height = $org_height * $resize_ratio_x;
            $resize_origin_x = 0;
            $resize_origin_y = ($height - $resize_height) / 2;
        } else {
            $resize_width = $org_width * $resize_ratio_y;
            $resize_height = $height;
            $resize_origin_x = ($width - $resize_width) / 2;
            $resize_origin_y = 0;
        }

        $src_image = imagecreatefrompng($org_file);
        $tmb_image = imagecreatetruecolor($resize_width, $resize_height);
        $dst_image = imagecreatetruecolor($width, $height);

        $back_r = $back_g = $back_b = 255;
        if ($back != null) {
            $back = $back . 'ffffff';
            $back = substr($back, 0, 6);
            $back_r = intval(substr($back, 0, 2), 16);
            $back_g = intval(substr($back, 2, 2), 16);
            $back_b = intval(substr($back, 4, 2), 16);
        }

        if ($back_alpha) {
            imagealphablending($tmb_image, false);
            imagealphablending($dst_image, false);
            imagesavealpha($tmb_image, true);
            imagesavealpha($dst_image, true);
            $back_color =
                imagecolorallocatealpha(
                    $dst_image, $back_r, $back_g, $back_b, $back_alpha);
        } else {
            $back_color =
                imagecolorallocate($dst_image, $back_r, $back_g, $back_b);
        }
        imagefill($tmb_image, 0, 0, $back_color);
        imagefill($dst_image, 0, 0, $back_color);

        imagecopyresampled(
            $tmb_image, $src_image, 0, 0, 0, 0,
            $resize_width, $resize_height, $org_width, $org_height);
        imagecopyresampled(
            $dst_image, $tmb_image, $resize_origin_x, $resize_origin_y, 0, 0,
            $resize_width, $resize_height, $resize_width, $resize_height);

        if ($border != null) {
            $border_image = imagecreatetruecolor($width + 2, $height + 2);

            $border = $border . 'ffffff';
            $border = substr($border, 0, 6);
            $border_r = intval(substr($border, 0, 2), 16);
            $border_g = intval(substr($border, 2, 2), 16);
            $border_b = intval(substr($border, 4, 2), 16);

            $border_color = imagecolorallocate(
                $border_image, $border_r, $border_g, $border_b);
            imagefill($border_image, 0, 0, $border_color);

            imagecopyresampled(
                $border_image, $dst_image, 1, 1, 0, 0,
                $width, $height, $width, $height);
            $dst_image = $border_image;
        }

        $tmb_data = self::getImageString($dst_image, $image_type);

        imagedestroy($src_image);
        imagedestroy($tmb_image);
        imagedestroy($dst_image);

        return $tmb_data;
    }

    public static function getImageString($image, $type)
    {
        $temp_file = tempnam(sys_get_temp_dir(), 'img');

        switch ($type) {
        case self::IMAGE_TYPE_GIF:
            imagegif($image, $temp_file);
            break;
        case self::IMAGE_TYPE_JPEG:
            imagejpeg($image, $temp_file, 75);
            break;
        case self::IMAGE_TYPE_PNG:
            imagepng($image, $temp_file);
            break;
        }

        $data = file_get_contents($temp_file);
        unlink($temp_file);

        return $data;
    }
}
