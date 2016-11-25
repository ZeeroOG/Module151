<?php

class Captcha {
   /*
    * 	# Générateur de captcha alphanumériques
    *
    *	Utilisation
	*	===========
	*
	*	// Création de l'objet
	*	$captcha = new Captcha();
	*
	*	// Pour afficher l'image en base64
	*	<img src="<?php echo $captcha->getImage(); ?>" />
	*
	*	// Pour récupérer le texte du captcha
	*	$texte = $captcha->getTexte();
	*/

	private $texte;
	private $image;

	public function getTexte() { return $this->texte; }
	public function getImage() { return $this->image; }

	public function __construct()
	{
		// Générer le Captcha
		$this->generate();
	}

	private function getTextColor()
	{
		// Retourne une des couleurs RGB (aléatoire)
		switch (rand(0, 2)) {
			case 0:
				return array(0, 100, 200);
				break;
			case 1:
				return array(200, 0, 0);
				break;
			case 2:
				return array(102, 0, 102);
				break;
		}
	}

	private function generate()
	{
		// Creation de l'image
		$image = imagecreate(300, 75);

		// Couleur de fonds de l'image
		imagecolorallocate($image, 222, 222, 222);

		// Choisir la couleur du texte aléatoirement
		$text_rgb = $this->getTextColor();
		$text_color = imagecolorallocate($image, $text_rgb[0], $text_rgb[1], $text_rgb[2]);

		// Générer un code aléatoire
		$code = "";
		$text = "";

		for($i = 0; $i < 6; $i++) {
			if(rand(0, 1) == 0) $x = chr(rand(65,90));
			else $x = rand(0, 9);

			$code = $code . $x;
			$text = $text . $x . " ";
		}

		// Affichage du texte (avec un angle aléatoire entre -1 et -5 deg)
		imagettftext($image, 34, -rand(1, 5), 20, 40, $text_color, "app/ressources/captcha.ttf", $text);

		// Couleur des lignes
		$line_color = imagecolorallocate($image, 64, 64, 64);

		// Ajouter 8 lignes
		for($i = 0; $i < 7; $i++) {
			imageline($image, 0, rand()%50, 300, rand()%50, $line_color);
		}

		// Transformation de l'image en base64
		ob_start ();
		imagepng($image);
		$image_data = ob_get_contents();
		ob_end_clean ();

		// Retourner le captcha en image (base64) et en plaintext
		$this->texte = strtolower($code);
		$this->image = "data:image/png;base64," . base64_encode($image_data);
	}
}
?>
