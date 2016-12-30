<?php

function getArticle($id) {
	global $db_sql;

	$req = $db_sql->prepare('SELECT t_film.titreOriginal, t_film.titreTraduit, t_formatfilm.prix,
							 t_film.pochetteURL AS image, t_format.nom AS format FROM t_formatfilm
							 INNER JOIN t_film ON t_formatfilm.fk_film = t_film.id_film
							 INNER JOIN t_format ON t_formatfilm.fk_format = t_format.id_format
							 WHERE t_formatfilm.numero_article = ? LIMIT 1');
	$req->execute(array($id));
	$data = $req->fetch();

	return $data;
}

function formatPrice($price) {
	$price = (string)$price;
	$price = explode('.', $price);

	if(isset($price[1])) {
		if((int)$price[1] < 10) $price[1] = $price[1] . '0';
		$price = $price[0] . '.' . $price[1];
	} else {
		$price = $price[0] . '.-';
	}

	return (string)$price;
}

function setVarHTML(&$html, $name, $value) {
	$html = str_replace("%" . $name . "%", $value, $html);
}

?>
