<?php
	session_start();
	
	include('includes/connectionPool.php');
	$obj = new connectionPool();
	include_once('noentry.php');
	
	//order_number="+order_number+"&dataid="+dataid+"&table_name="+table_name+"&field_id="+field_id+"&primary_id="+primary_id
	$order_number = $_REQUEST['order_number'];
	$dataid = $_REQUEST['dataid'];
	$before_order_number = $_REQUEST['datavalue'];
	$table_name = $_REQUEST['table_name'];
	$field_id = $_REQUEST['field_id'];
	$primary_id = $_REQUEST['primary_id'];
	
	if($order_number != "")
	{	
		$sql_check = "select * from $table_name where $field_id = '".$order_number."' LIMIT 1";
		$res_check = mysql_query($sql_check);
		if(mysql_num_rows($res_check) > 0)
		{
			$result_data = mysql_fetch_array($res_check);
			$sql_update1 = "update $table_name set $field_id='".$before_order_number."' where $primary_id='".$result_data[$primary_id]."'";	
			mysql_query($sql_update1);
			
			$sql_update1 = "update $table_name set $field_id='".$order_number."' where $primary_id='".$dataid."'";	
			mysql_query($sql_update1);
		}
		else
		{
			$sql_update1 = "update $table_name set $field_id='".$order_number."' where $primary_id='".$dataid."'";	
			mysql_query($sql_update1);
		}
	}
?>