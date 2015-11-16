<?php
/** Database Model **/

class database {
	public 
		$LinkID = false, $QueryID = false,
		$Record = array(), $Row, 
		$memcache = null, $cache_timeout = 60,
		$errno = 0, $error = '', $pre = '', $pre_destruct = null;
	# Connection Data Defaults - Private Variables: Only the specified class can access them.  Even subclasses will be denied access.
	private 
		$schema	= "TheGearSafe",
		$host	= "127.0.0.1",
		$login	= DB_USERNAME,
		$pass	= DB_PASSWORD,
		$port	= "3306",
		$salt	= 'uiosfa<|>oizxvc';
	
	function __construct() {

		$this->connect();
		#global $cache;
		#$this->memcache = $cache;
	}
	
	function __destruct() {
		if (!is_null($this->pre_destruct)) $this->pre_destruct->_destruct();
		if ($this->LinkID) mysqli_close($this->LinkID);
	}
	
	function call_before_destruct() {
		
	}
	
	function connect() {
		if ($this->LinkID) return;
		$this->LinkID = mysqli_connect($this->host, $this->login, $this->pass, $this->schema, $this->port);
		if ($this->LinkID) return;
		$this->errno = mysqli_connect_errno();
		$this->error = mysqli_connect_error();
		$this->halt('Connection failed (host:' . $this->host . ':' . $this->port . ' Login:' . $this->login . ')');
	}
	
	function halt($msg) {
		$this->oops($msg);
		die();
	}
	
	function error() {
		return mysqli_error($this->LinkID);
	}

	function query($Query) {
		$this->QueryID = mysqli_query($this->LinkID, $Query);
		
		$this->query = $Query;
		
		
		if (!$this->QueryID) {
			$this->errno = mysqli_errno($this->LinkID);
			$this->error = mysqli_error($this->LinkID);
			
			$this->halt('Invalid Query: ' . $Query);
		}
		
		$this->Row = 0;
		return $this->QueryID;
	}

	function query_unb($Query) {
		mysqli_real_query($this->LinkID, $Query);
	}

	function inserted_id() {
		if ($this->LinkID) return mysqli_insert_id($this->LinkID);
	}
	
	// MYSQL_ASSOC, MYSQL_NUM, and MYSQL_BOTH
	function next_record($Type = MYSQLI_BOTH) {
		if($this->LinkID) {
			$this->Record = mysqli_fetch_array($this->QueryID,$Type);
			//echo $this->query."<br />";
			$this->Row++;
			if (!is_array($this->Record)) { $this->QueryID=false; }
			return $this->Record;
		}
	}
	
	function to_array($Type = MYSQLI_BOTH) {
		$Return = array();
		
		if (!is_bool($this->QueryID)) {
			while($Row = mysqli_fetch_array($this->QueryID, $Type)) $Return[] = $Row;
			mysqli_data_seek($this->QueryID, 0);
		} elseif ($this->QueryID) {
			$Return[0]['Query Info'] = mysqli_info($this->LinkID);
			if (!$Return[0]['Query Info']) $Return[0]['Query Info'] = 'Affected rows: ' . mysqli_affected_rows($this->LinkID);
			$Return[0]['Query Info'] .= ' Last inserted ID: ' . mysqli_insert_id($this->LinkID);
		}
		
		return $Return;
	}
	
	// An Alternative to to_array
	// The Main difference is that fetch_all_array accepts the $SQL and returns an ASSOC array.
	// to_array depends on a previously ran query, and returns BOTH
	#-#############################################
	# desc: returns all the results (not one row)
	# param: (MySQL query) the query to run on server
	# returns: assoc array of ALL fetched results
	function fetch_all_array($sql, $type = MYSQLI_ASSOC) {
	    $query_id = $this->query($sql);
	    $out = array();
		
	    while ($row = $this->next_record($type)) $out[] = $row;
		
	    $this->free_result($query_id);
	    
	    return $out;
	}#-#fetch_all_array()
	
	/**
	 * Fetch All Array Cache, a cached alternative to Fetch All Array
	 * @param string $sql
	 * @param mixed $type
	 * Special thanks to: http://pureform.wordpress.com/2008/05/21/using-memcache-with-mysql-and-php/
	 */
	function fetch_all_array_cache($sql, $type = MYSQLI_ASSOC) {
		if (($cache = $this->getCache(md5('mysql_fetch' . $sql))) === false) {
			$query_id = $this->query($sql);
			$cache = array();
			while ($row = $this->next_record($type))
				$cache[] = $row;
			$this->free_result($query_id);
			if (!$this->setCache(md5('mysql_fetch' . $sql), array_to_object($cache), $this->cache_timeout)) {
				# No memcache daemon!
			}
		}
		return $cache;
	}
	
	/**
	 * Query First Cache, a cached alternative to Query First
	 * @param unknown_type $key
	 */
	function query_first_cache($sql, $type = MYSQLI_BOTH) {
		$sql .= (!preg_match('/LIMIT/', $sql) ? ' LIMIT 1' : '');
		
		if (($cache = $this->getCache(md5('mysql_first' . $sql))) === false) {
			$query_id = $this->query($sql);
	    	$cache = $this->next_record($type);
	    	$this->free_result();
			if (!$this->setCache(md5('mysql_first' . $sql), $cache, $this->cache_timeout)) {
				# No memcache daemon!
			}
		}
	    return $cache;
	}
	
	/**
	 * Get Cache - A way to access memcache->get
	 * @param string $key
	 */
	function getCache($key) {
		echo 'KEY ' . $key . '<br>';
		return ($this->memcache) ? $this->memcache->get($key) : false;
	}
	
	/**
	 * Set Cache - A way to access memcache->set
	 * @param string $key
	 * @param array/mixed $object
	 * @param integer $timeout >> in seconds
	 */
	function setCache($key, $object, $timeout = 60) {
		return ($this->memcache) ? $this->memcache->set($key, $object, MEMCACHE_COMPRESSED, $timeout) : false;
	}
	
	function close() {
		if ($this->LinkID) {
			if(!mysqli_close($this->LinkID)) $this->halt('Cannot close connection or connection did not open.');
			$this->LinkID = false;
		}
	}
	
	function record_count() {
		if ($this->QueryID) return mysqli_num_rows($this->QueryID);
	}
	
	function info() {
		if ($this->LinkID) return mysqli_info($this->LinkID);
	}
	
	/**
	 * @param $pass -> Required: the $pass should have already been MD5'd
	 * @return the salted password
	 */
	function salt($pass) {
		return 'md5(\'' . preg_replace('/<\|>/', $pass, $this->salt) . '\')';
	}
	
	function affected_rows() {
		if ($this->LinkID) return mysqli_affected_rows($this->LinkID);
	}
	
	/**
	 * Modified Rows
	 * 
	 * Parses info() after an update to get the rows looked at, and the affected rows.
	 * Useful for determining if an update was successful or not.
	 * 
	 * It lives next to affected_rows because these are the rows that it tried to touch, not just the rows that were touched.
	 */
	function modified_rows() {
		preg_match('/Rows matched: (\d+)/', $this->info(), $m);
		return isset($m[1]) ? $m[1] : 0;
    }

	function escape_str($Str) {
		$this->connect();
		return mysqli_real_escape_string($this->LinkID, $Str);
	}
	
	function oops($msg = '') {
	    if ($this->LinkID) {
	        $this->error = mysqli_error($this->LinkID);
	        $this->errno = mysqli_errno($this->LinkID);
	    } else {
	    	// NWW commented out, functions need parameter
	        //$this->error = mysqli_error();
	        //$this->errno = mysqli_errno();
	    }
	    	
		$errorOutput = basic_error_output('database');
		$errorOutput['ERROR_DETAILS'] = array(
			'mysqlmessage' => $msg,
			'mysqlerror' => $this->error
		);
		
		if (AJAX) {
			echo $msg . EOL . EOL;
			echo $this->error;
			exit;
		}
		
		$vardump = base64_encode(serialize($errorOutput));
		
		$_SESSION['error500'] = array(
			'dump' => $vardump,
			'request_uri' => $_SERVER['REQUEST_URI'],
			'mysqlmessage' => $msg,
			'mysqlerror' => $this->error
		);
		
		redirect('/error/500');
		exit(1);
	}#-#oops()
	
	#-#############################################
	# desc: does an update query with an array
	# param: table (no prefix), assoc array with data (doesn't need escaped), where condition
	# returns: (query_id) for fetching results etc
	function query_update($table, $data, $where='1') {
		$table = preg_replace('/\./', '`.`', $table);
		
	    $q="UPDATE `".$this->pre.$table."` SET ";
		
	    foreach($data as $key=>$val) {
	        if(strtolower($val)=='null') $q.= "`$key` = NULL, ";
	        elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), ";
	        elseif(preg_match('/^md5\(/i', $val)) $q.= "`$key` = ".$val.", ";
	        # <|L|> == Literal.  Useful when using `FIELD` = `FIELD`, which is sometimes necessary to keep functions dynamic.
	        elseif(preg_match('/^<\|L\|>/', $val)) $q .= "`$key` = `" . preg_replace('/^<\|L\|>/', '', $val) . "`, ";
	        # <|F|> == Formula.  Useful for formulas, such as Qty = Qty - #number#
	        elseif(preg_match('/^<\|F\|>/', $val)) $q .= "`$key` = " . preg_replace('/^<\|F\|>/', '', $val) . ", ";
	        else $q.= "`$key`='".$this->clean($val)."', ";
	    }
		
	    $q = rtrim($q, ', ') . ' WHERE '.$where.';';
	    
	    return $this->query($q);
	    #$x = $this->query($q); echo $this->query . ' <br>' . EOL; return $x;
	}#-#query_update()
	
	#-#############################################
	# desc: does an insert query with an array
	# param: table (no prefix), assoc array with data
	# returns: id of inserted record, false if error
	function query_insert($table, $data, $extra = '') {
		$table = preg_replace('/\./', '`.`', $table);
	    $q="INSERT " . ($extra == 'ignore' ? 'IGNORE ' : '') . "INTO `".$this->pre.$table."` ";
	    $v=''; $n='';
		
	    foreach($data as $key=>$val) {
	        $n.="`$key`, ";
	        if(strtolower($val)=='null') $v.="NULL, ";
	        elseif(strtolower($val)=='now()') $v.="NOW(), ";
	        elseif(preg_match('/^md5\(/i', $val)) $v.=$val.', ';
	        # <|F|> == Formula.  Useful for formulas, such as Qty = Qty - #number#
	        elseif(preg_match('/^<\|F\|>/', $val)) $v.=preg_replace('/^<\|F\|>/', '', $val).', ';
	        else $v.= "'".$this->clean($val)."', ";
	    }
	    
	    $q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";
		
	    if($this->query($q)){
	        //$this->free_result();
	        return $this->inserted_id();
	    }
	    else return false;
	
	}#-#query_insert()
	
	function query_insert_ignore($table, $data) {
		return $this->query_insert($table, $data, 'ignore');
	}
	
	/**
	 * Query Insert Many, insert multiple rows with one query
	 */
	function query_insert_many($table, $datas) {
		if (empty($datas)) return false;
		$table = preg_replace('/\./', '`.`', $table);
	    $q="INSERT INTO `".$this->pre.$table."` (";
	    $v=''; #$n='';
	    
	    foreach ($datas[0] as $k => $v) $q .= "`$k`, ";
	    
	    $q = rtrim($q, ', ') . ") VALUES ";
	    
	    foreach ($datas as $data) {
	    	$v = '';
		    foreach($data as $key=>$val) {
		        #$n.="`$key`, ";
		        if(strtolower($val)=='null') $v.="NULL, ";
		        elseif(strtolower($val)=='now()') $v.="NOW(), ";
		        elseif(preg_match('/^md5\(/i', $val)) $v.=$val.', ';
		        # <|F|> == Formula.  Useful for formulas, such as Qty = Qty - #number#
		        elseif(preg_match('/^<\|F\|>/', $val)) $v.=preg_replace('/^<\|F\|>/', '', $val).', ';
		        else $v.= "'".$this->clean($val)."', ";
		    }
		    
			$q .= "(". rtrim($v, ', ') ."), ";
	    }
	    
	    if($this->query(rtrim($q, ', ') . ';')){
	        //$this->free_result();
	        return $this->inserted_id();
	    }
	    else return false;
	}
	
	#-#############################################
	# Desc: escapes characters to be mysql ready
	# Param: string
	# returns: string
	function clean($string) {
	    if (get_magic_quotes_gpc()) $string = stripslashes($string);
	    return mysqli_real_escape_string($this->LinkID, $string);
	}#-#clean()
	
	#-#############################################
	# desc: does a query, fetches the first row only, frees resultset
	# param: (MySQL query) the query to run on server
	# returns: array of fetched results
	# NWW added the "limit 1" clause
	// MYSQL_ASSOC, MYSQL_NUM, and MYSQL_BOTH
	function query_first($query_string, $Type = MYSQLI_BOTH) {
	    $query_id = $this->query($query_string . (!preg_match('/LIMIT/', $query_string) ? ' LIMIT 1' : ''));
	    $out = $this->next_record($Type);
	    $this->free_result();
	    return $out;
	}#-#query_first()
	
	#-#############################################
	# desc: frees the resultset
	# param: query_id for mysql run. if none specified, last used
	function free_result($query_id=null) {
	    if (!is_null($query_id)) {
	        $this->QueryID=$query_id;
	    }
	    if(!@mysqli_free_result($this->QueryID)) {
	        //$this->oops("Result ID: <b>" . $this->QueryID . "</b> could not be freed.");
	    }
	}#-#free_result()
	
	/**
	 * Get Fields
	 *  Dynamically get all of the fields from the objects table.  Useful for duplicating records in a database.
	 * @param $table -> Table Name
	 * @param $returnType -> array, or imploded array (comma seperated)
	 * @param $keepID -> Don't kill the first column (assumed to be the auto_increment column)
	 */
	function get_fields($table, $returnType = 'string', $keepID = false) {
		$objectsTable = $this->fetch_all_array('DESCRIBE ' . $table);
		if (!$keepID) array_shift($objectsTable);
		$fields = array();
		foreach ($objectsTable as $column) $fields[] = $column['Field'];
		return $returnType == 'array' ? $fields : implode(', ', $fields); 
	}
	
	/**
	 * Delete
	 * 	Builds a delete query from the paramters
	 * @param table (no prefix), where condition
	 * @return query_id
	 */
	function query_delete($table, $where) {
		$table = preg_replace('/\./', '`.`', $table);
		return $this->query('DELETE FROM `' . $this->pre . $table . '` WHERE ' . $where . ';'); 
	}
	
	function debug($exit = false) {
		$br = (AJAX ? '' : '<br>') . EOL;
		echo $this->query . $br . $br;
		echo $this->info() . $br;
		echo 'Affected: ' . $this->affected_rows() . $br;
		echo 'Modified: ' . $this->modified_rows() . $br . $br;
		if ($exit) exit;
	}
	
	function shell_query($query) {
		exec('mysql -u ' . $this->login . ' -p"' . $this->pass . '" ' . '-e "' . $query . '" ' . $this->schema . ' > /tmp/shell_query 2> /tmp/shell_query2 &');
	}
	
	/**
	 * Multi Query
	 * 	http://php.net/manual/en/mysqli.multi-query.php
	 */
	public function query_many($queries) {
		if (empty($queries)) return;
		
		$query = '';
		if (is_array($queries))
			foreach ($queries as $q) 
				$query .= $q . ';';
		else 
			$query = $queries;
		
		mysqli_multi_query($this->LinkID, $query);
		do {
			if ($result = mysqli_store_result($this->LinkID)) mysqli_free_result($result);
		} while (mysqli_next_result($this->LinkID));
		
		#mysqli_free_result(mysqli_store_result($this->LinkID));
	}
	
}

?>
