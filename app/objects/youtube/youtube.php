<?php

class Youtube {
	private $id;
	private $width;
	private $height;

	public function setWidth($x) { $this->width = $x; }
	public function setHeight($x) { $this->height = $x; }

	public function getWidth() { return $this->width; }
	public function getHeight() { return $this->height; }
	public function getId() { return $this->id; }

	public function __construct($url, $width = 560, $height = 315) {
		$this->id = $this->getIdFromURL($url);
		$this->width = $width;
		$this->height = $height;
	}

	public function getHTML() {
		$html = '<iframe width="' . $this->width . '" height="' . $this->height . '" src="https://www.youtube.com/embed/' . $this->id . '" frameborder="0" allowfullscreen></iframe>';
		return $html;
	}

	public function show() {
		echo $this->getHTML();
	}

	private function getIdFromURL($url) {
		$url = explode("?v=", $url);
		$url = explode("&", $url[1]);
		$id = $url[0];

		return $id;
	}
}

?>
