<?php

	include('includes/connectionPool.php');
	$obj = new connectionPool();
	include_once('noentry.php');
	
	if($_POST['action'] == "Update")
	{
		$sql="update setting set vValue ='".$_POST['vValue']."' where vName ='".$_REQUEST['vName']."'";
		$db_sql=mysql_query($sql);
		
		if($db_sql)
		{	
			$var_msg= base64_encode("Updated General Setting Value Succesfully");
			header("Location:settinglist.php?var_msg=$var_msg");
			exit;
		}
		else
		{
			$var_msg= base64_encode("Updated General Setting Value Not Succesfully");
			header("Location:settinglist.php?var_msg=$var_msg");
			exit;
		}
	}
	
// ---------------------------------------- INCLUDE SMARTY ---------------------------------------------	
	include('includes/smarty.php');
	include('paging.php');
// ---------------------------------------- INCLUDE SMARTY ---------------------------------------------

	if($_GET['action'] == "update")
	{
		$action = $_REQUEST['action'];
		$sql="select * from setting where vName ='".$_REQUEST['vName']."'";
		$db_sql=$obj->select($sql);
	
		$vName = $db_sql[0]["vName"];
		$vDesc = $db_sql[0]["vDesc"];
		$vValue	= $db_sql[0]["vValue"];
		
		$smarty->assign("vName",$vName);
		$smarty->assign("vDesc",$vDesc);
		$smarty->assign("vValue",$vValue);
		
		$smarty->assign("action",$action);
	} 
	else 
	{
		$action = $_REQUEST['action'];	
		$action="Add";
	   
	   $smarty->assign("action",$action);
	}

	 
	
	if($_REQUEST['action']=="Search")
	{
		
		$keyword=$_REQUEST['keyword'];
		$option=$_REQUEST['option'];
		header("Location: settinglist.php?keyword=$keyword&option=$option");
		exit;
	}
	if($_REQUEST['action']=="showAll")
	{
		header("Location: settinglist.php");
		exit;
	}
	
	$smarty->assign("middle_file","settingadd.tpl");
	$smarty->display("common_template1.tpl");
?>