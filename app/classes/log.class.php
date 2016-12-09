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
		self::writeToLog("WARN", $text);
	}

	public static function error($text) {
		self::writeToLog("ERROR", $text);
	}

	private function writeToLog($level, $text) {
		$file = PROJECT_PATH . "\logs\\" . date("Ymd") . ".txt";

		if(!file_exists($file)) {
			$handle = fopen($file, 'w');
			fclose($handle);
		}

		$data = $level . ": " . $text . "\n";
		file_put_contents($file, file_get_contents($file) . $data);
	}
}

?>
