<?php
	//	session_start();
	
	include('includes/connectionPool.php');
	include_once('noentry.php');
	include('includes/smarty.php');
	$obj = new connectionPool();
	
	$var_msg = $_REQUEST['var_msg'];
	$smarty->assign("var_msg",base64_decode($var_msg));
	
	$sql_count1 = "select *from setting";
	$db_result1=mysql_query($sql_count1);
	$num_totrec = mysql_num_rows($db_result1);

	# ======================================================================================
	# Paging Paging comes from this File. Don't Remove this below line.
	# ======================================================================================
	include("paging.php");	
	# ======================================================================================

	if(($_REQUEST['sortby'] == "") || ($_REQUEST['sortby'] == "ASC"))
	{
		$sortby = "ASC";
		$smarty->assign("sortby","DESC");
	}
	if($_REQUEST['sortby'] == "DESC")
	{
		$sortby = "DESC";
		$smarty->assign("sortby","ASC");
	}
	$keyword=$_REQUEST['keyword'];
	$option=$_REQUEST['option'];
	
	$sorton = $_REQUEST['sorton'];
	
	if(isset($sorton))
	{  	
		switch ($sorton)
		{	
			case "1":	
				($stat==1)? $sort = "vName" : $sort = "vName ".$sortby;
				break;
			case "2":	
				($stat==1)? $sort = "vValue" : $sort = "vValue ".$sortby;
				break;
		}
		
		if($option=="eStatus" and !empty($keyword)) 
		{
			$sql = "select * from setting where $option like '".trim($keyword)."%'order by $sort $var_limit";
		}
		else
		{
			if(!isset($keyword))
				$sql = "select * from setting order by $sort $var_limit ";
			else
				$sql = "select * from setting where $option like '".trim($keyword)."%' order by $sort $var_limit";
		}

	}	
	else
	{
		if(isset($keyword))
			$sql="select * from setting where $option like '".trim($keyword)."%' $var_limit";
		else
			$sql="select *from setting order by vName ASC $var_limit ";
	}

	$db_result=mysql_query($sql);
	$count_db_res = mysql_num_rows($db_result);
	$smarty->assign("count_db_res",$count_db_res);

	
	$data = array();
	$d = array();
	$i=0;
	while($db_res= mysql_fetch_array($db_result))
	{
		$d['i'] = $i;
		$d['vName'] = $db_res['vName'];
		$d['vDesc'] = $db_res['vDesc'];
		$d['vValue'] = $db_res['vValue'];

		$i++;
		$data[] = $d;
	}
	$smarty->assign("data",$data);
	$smarty->assign("sorton",$sorton);
	
	$count_db_res;
	if($count_db_res > 0 && ($keyword == ""))
	{
		$var_msg = "Total no of records are <font color=#000000>$count_db_res</font>";
		$smarty->assign("var_msg",$var_msg);
	}
	else if($keyword != "")
	{
		$var_msg = "Your search for <font color=#000000>$keyword</font> has found <font color=#000000>$count_db_res</font> matches:";
		$smarty->assign("var_msg",$var_msg);
	}
	elseif($var_msg1 != "")
	{
		$smarty->assign("var_msg",rawurldecode($var_msg1));
	}
	
	$smarty->assign("middle_file","settinglist.tpl");
	$smarty->display("common_template1.tpl");
?>