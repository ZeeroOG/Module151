<?php
//	aide: 	http://stackoverflow.com/questions/19751354/how-to-import-sql-file-in-mysql-database-using-php
//			http://dev.mysql.com/doc/refman/5.7/en/show-table-status.html
			http://stackoverflow.com/questions/12403662/how-to-remove-all-mysql-tables-from-the-command-line-without-drop-database-permi je n'ai pas utilisé cette méthode

	function import(&$db,$sql,&$errors,$delete = TRUE) {
		
	  $query = '';
	  if($delete) {
		  $db->query('SET foreign_key_checks = 0');
		  $stmt = $db->query('SHOW TABLE STATUS FROM projet151');
		  $tables = Array();
		  while($result = $stmt->fetch()) { 
			array_push($tables,$result['Name']);
		  }
		  foreach($tables as $table) {
			$stmt = $db->query('DROP TABLE IF EXISTS '.$table);
			if(!$stmt) {
			  array_push($errors,$db->errorInfo()[2]);
			}
		  }
		  $db->query('SET foreign_key_checks = 1');
	  }
	  foreach($sql as $line) {
		if (substr($line, 0, 2) == '--' || $line == '') {
		  continue;
		}
		$query .= $line;
		if (substr(trim($line), -1, 1) == ';') {
		  $stmt = $db->query($query);
		  if(!$stmt) {
			array_push($errors,$db->errorInfo()[2]);
		  }
		  $query = '';
		}
	  }
	}
?>