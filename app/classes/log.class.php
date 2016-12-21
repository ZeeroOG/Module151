<?php
/*

Classe statique pour écrire des logs d'application

Usage :

Pour une info => Log::info("Mon texte");
Pour un warning => Log::warn("Mon texte");
Pour une erreur => Log::error("Mon texte");

*/
class Log {
	public static function info($text) {
		self::writeToLog("INFO", $text);
	}

	public static function warn($text) {
		self::writeToLog("WARNING", $text);
	}

	public static function error($text) {
		self::writeToLog("ERROR", $text);
	}

	private static function writeToLog($level, $text) {
		//$file = PROJECT_PATH . "\logs\\" . date("Ymd") . ".txt";
		$file = "logs/" . date("Ymd") . ".txt";
		$time = date("H:i:s");

		if(!file_exists($file)) {
			$handle = fopen($file, 'w');
			fclose($handle);
		}

		$data = "[$time $level] $text \n";
		file_put_contents($file, file_get_contents($file) . $data);
	}
}

?>
