<?php
error_reporting (E_ALL ^ E_NOTICE);

if($_SERVER['HTTP_HOST']=="localhost:8888")
{
	define("HOST", "localhost:8889");
	define("DATABASE", "volcano");
	define("USER", "root");
	define("PASS", "root");
}
else
{
	define("HOST", "localhost");
	define("DATABASE", "volcano");
	define("USER", "eric");
	define("PASS", "vinova123");
}

define("SITE_PATH", "http://www.iradiomobile.com/clients/voice");
define("DEFAULT_IMG", "images/no_image.gif");

define("PAGE_LIMIT", 10);
define("DEBUG", "1");  // When you upload this file online change here 1 to 0

include('paging_class.php');

class connectionPool
{
		function connectionPool()
		{
			mysql_connect(HOST,USER,PASS) or die("Connection Failed");
			mysql_select_db(DATABASE) or die("Database not found");

		}
		function Query($query) { // queries the database
		$result = mysql_query($query) or die("error");

		return $result;

	}

		function select($sql="")
		{
			if(empty($sql)) { return false; }
			if(!preg_match("/^select/",$sql))
			{
				echo "wrongquery<br>$sql<p>";
				echo "<H2>Wrong function silly!</H2>\n";
				return false;
			}
			 $results = @mysql_query($sql);
			if( (!$results) or (empty($results)) ) {
				return false;
			}
			$count = 0;
			$data = array();
			while ( $row = mysql_fetch_array($results))
			{
				$data[$count] = $row;
				$count++;
			}
			mysql_free_result($results);

			return $data;


		}
		function NumRows($ressql)
		{
			return mysql_num_rows($ressql);
		}

		function insert($sql="")
		{
			if(empty($sql)) { return false; }
			if(!preg_match("/^insert/",$sql))
			{
				return false;
			}

			$results = mysql_query($sql);
			if(!$results)
			{
				//$this->error("<H2>No results!</H2>\n");
				return false;
			}
			 $id = mysql_insert_id();
			return $id;
		}

		function update($sql="")
		{
			if(empty($sql)) { return false; }
			if(!preg_match("/^update/",$sql))
			{
				return false;
			}

			$results = mysql_query($sql);
			if(!$results)
			{
				return false;
			}
			$rows = 0;
			$rows = mysql_affected_rows();
			return $rows;
		}

		function delete($sql="")
		{
			if(empty($sql)) { return false; }
			if(!preg_match("/^delete/",$sql))
			{
				return false;
			}

			$results = mysql_query($sql);
			if(!$results)
			{

				return false;
			}
			$rows = 0;
			$rows = mysql_affected_rows();
			return $rows;
		}

		function esacpestring($arr_implode)
		{
			$arr_implode = mysql_real_escape_string($arr_implode);
			return $arr_implode;
		}
}
?>
