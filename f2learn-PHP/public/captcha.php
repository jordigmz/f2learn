<?php
    function randomText($length)
    {
        $key = '';
        $pattern = "123456789abcdefghijkmnpqrstuvwxyz";
        for ($i = 0; $i < $length; $i++) {
            $key .= $pattern[mt_rand(0, 32)];
        }
        return $key;
    }

    session_start();
    $_SESSION['captcha'] = randomText(7);
    $text = $_SESSION['captcha'];
    $height = 300;
    $width = 150;
    $image = imagecreatetruecolor($height, $width);
    $color = imagecolorallocate($image, 255, 255, 255);
    $backgroudColor = imagecolorallocate($image, 88, 46, 131);
    imagefill($image, 0, 0, $backgroudColor);
    imageline($image, 50, 0, $width, 130, $color);
    imageline($image, 200, 0, $width, 100, imagecolorallocate($image, 184, 169, 201));
    imagettftext($image, 30, 34, 105, 134, $color, 'captchaFont.otf', $text);
    header("content-type: image/png");
    imagepng($image);
    imagedestroy($image);