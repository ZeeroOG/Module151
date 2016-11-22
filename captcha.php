<?php

session_start();
$image = imagecreate(200, 50);

imagecolorallocate($image, 222, 222, 222);

if(rand(0, 1) == 0) $text_color = imagecolorallocate($image, 0, 100, 200);
else $text_color = imagecolorallocate($image, 57, 222, 39);

$line_color = imagecolorallocate($image, 64, 64, 64);

for($i = 0; $i < 6; $i++) {
	if(rand(0, 1) == 0) $x = chr(rand(65,90));
	else $x = rand(0, 9);

	$code = $code . $x;
	$text = $text . $x . " ";
}

imagettftext($image, 18, 0, 20, 30, $text_color, "font.ttf", $text);

for($i=0; $i<10; $i++) {
	imageline($image, 0, rand()%50, 200, rand()%50, $line_color);
}

header ("Content-type: image/png");
imagepng($image);

$_SESSION['code'] = $code;

?>
