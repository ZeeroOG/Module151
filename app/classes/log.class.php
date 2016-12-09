<?php

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
		$file = PROJECT_PATH . "\log\\" . date("Ymd") . ".txt";
		$data = file_get_contents($file)
		$data = $data . $level . ": " . $text . "\n";
		file_put_contents($file, $data);
	}
}

?>
