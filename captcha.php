<?php

class Captcha {
	private $texte;
	private $image;

	public function getTexte() { return $this->texte; }
	public function getImage() { return $this->image; }

	public function __construct()
	{
		$this->generate();
	}

	private function generate()
	{
		$image = imagecreate(300, 75);
		imagecolorallocate($image, 222, 222, 222);

		switch (rand(0, 2)) {
			case 0:
				$text_color = imagecolorallocate($image, 0, 100, 200);
				break;
			case 1:
				$text_color = imagecolorallocate($image, 200, 0, 0);
				break;
		  case 2:
				$text_color = imagecolorallocate($image, 102, 0, 102);
				break;
		}

		$line_color = imagecolorallocate($image, 64, 64, 64);

		for($i = 0; $i < 6; $i++) {
			if(rand(0, 1) == 0) $x = chr(rand(65,90));
			else $x = rand(0, 9);

			$code = $code . $x;
			$text = $text . $x . " ";
		}

		imagettftext($image, 34, -rand(1, 5), 20, 40, $text_color, "font.ttf", $text);

		for($i = 0; $i < 7; $i++) {
			imageline($image, 0, rand()%50, 300, rand()%50, $line_color);
		}

		ob_start ();
		imagepng($image);
		$image_data = ob_get_contents();
		ob_end_clean ();

		$this->texte = strtolower($code);
		$this->image = "data:image/png;base64," . base64_encode($image_data);
	}
}

$captcha = new Captcha();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<img src="<?php echo $captcha->getImage(); ?>" />
		<br />
		<h3>CODE : <?php echo $captcha->getTexte(); ?></h3>
	</body>
</html>
