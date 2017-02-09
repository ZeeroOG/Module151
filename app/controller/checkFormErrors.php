<?php 
	function checkError(&$errors,$post,$files) {
		if(empty($post['titreOriginal']) OR strlen($post['titreOriginal']) > 255) {
			$errors['titreOriginal'] = 'Titre original vide ou trop long';
		}
		if(!empty($post['titreTraduit']) AND strlen($post['titreTraduit']) > 255) {
			$errors['titreTraduit'] = 'Titre traduit trop long';
		}
		if(empty($post['duree']) OR !is_numeric($post['duree']) OR preg_match('#^.+\..+$#',$post['duree']) OR intval($post['duree']) > 999) {
			$errors['duree'] = 'Durée vide ou format non autorisé (1-999)';
		}
		if(empty($post['dateSortieSuisse']) OR !preg_match('#^(19|20)[0-9]{2}-(0[1-9])|(1[0-2])-([0-2][0-9])|(3[0-1])$#',$post['dateSortieSuisse'])) { //aide pour la regex: https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/les-expressions-regulieres-partie-1-2
			$errors['dateSortieSuisse'] = 'Date vide ou format non autorisé (yyyy-mm-dd)';
		}
		if(empty($post['description'])) {
			$errors['description'] = 'Description vide';
		}
		if(empty($post['accordParental']) OR !is_numeric($post['accordParental']) OR preg_match('#^.+\..+$#',$post['accordParental']) OR intval($post['accordParental']) > 99) {
			$errors['accordParental'] = 'Accord parental vide ou format non autorisé (1-99)';
		}
		if($files['pochetteFile']['error'] != 4) {
			if(strtolower(pathinfo($files['pochetteFile']['name'],PATHINFO_EXTENSION)) != 'jpg' AND strtolower(pathinfo($files['pochetteFile']['name'],PATHINFO_EXTENSION)) != 'jpeg' AND strtolower(pathinfo($files['pochetteFile']['name'],PATHINFO_EXTENSION)) != 'png') {
				$errors['pochetteFile'] = 'Format de l\'image non accepté (.jpg, .jpeg, .png)';
			}
			else if($files['pochetteFile']['size'] > 2000000 OR $files['pochetteFile']['error'] == UPLOAD_ERR_INI_SIZE OR $files['pochetteFile']['error'] == UPLOAD_ERR_FORM_SIZE) {
				$errors['pochetteFile'] = 'Image trop volumineuse (max. 2MB)';
			}
			else if($files['pochetteFile']['error'] != UPLOAD_ERR_OK) {
				$errors['pochetteFile'] = 'Erreur inconue lors de l\'envoi de l\'image';
			}
		}
		$emptyGenre = TRUE;
		foreach(preg_grep('#^genre.$#',array_keys($post)) as $value) {
			if($post[$value] != 'NULL') {
				$emptyGenre = FALSE;
			}
		}
		if($emptyGenre) {
			$errors[$value] = 'Au moins 1 genre doit être choisi';
		}
		
		$emptyLangue = TRUE;
		foreach(preg_grep('#^langue.$#',array_keys($post)) as $value) {
			if($post[$value] != 'NULL') {
				$emptyLangue = FALSE;
			}
		}
		if($emptyLangue) {
			$errors[$value] = 'Au moins 1 langue doit être choisi';
		}
		
		$emptySociete = TRUE;
		foreach(preg_grep('#^societe.$#',array_keys($post)) as $value) {
			if($post[$value] != 'NULL') {
				$emptySociete = FALSE;
			}
		}
		if($emptySociete) {
			$errors[$value] = 'Au moins 1 Société doit être choisi';
		}
		
		$emptyFormat = TRUE;
		foreach(preg_grep('#^format.$#',array_keys($post)) as $value) {
			if($post[$value] != 'NULL') {
				$emptyFormat = FALSE;
			}
		}
		if($emptyFormat) {
			$errors[$value] = 'Au moins 1 format doit être choisi';
		}
		
		$emptyPersonne = TRUE;
		foreach(preg_grep('#^personne.$#',array_keys($post)) as $value) {
			if($post[$value] != 'NULL') {
				$emptyPersonne = FALSE;
			}
		}
		if($emptyPersonne) {
			$errors[$value] = 'Au moins 1 personne doit être choisi';
		}
		
		foreach(preg_grep('#^prix.$#',array_keys($post)) as $value) {// aide pour faire un foreach avec une regex: openclassrooms et http://php.net/manual/fr/function.preg-grep.php
			if((empty($post[$value]) OR !is_numeric($post[$value])) AND $post['format'.substr($value,-1)] != 'NULL') {
				$errors[$value] = $value.' vide ou format non autorisé';
			}
		}
		foreach(preg_grep('#^role.$#',array_keys($post)) as $value) {
			if((empty($post[$value]) OR strlen($post[$value]) > 255) AND $post['personne'.substr($value,-1)] != 'NULL') {
				$errors[$value] = $value.' vide ou trop long';
			}
		}
		if(empty($errors)) return TRUE;
		else return FALSE;
	}
	
	function checkItemError(&$errors,$post,$name) {
		if(isset($post[$name])) {
			if(empty($post[$name])){
				$errors[$name] = 'Le champ était vide';
				return FALSE;
			}
			else {
				return TRUE;
			}
		}
	}