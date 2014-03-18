<?php
	//	session_start();
	include('includes/connectionPool.php');
	$obj = new connectionPool();
	include_once('noentry.php');

	if($_REQUEST['action'] == "Delete")
	{
		$count=0;
		if($_REQUEST['admin_id'] != "")
		{
			$admin_id = $_REQUEST["admin_id"];
			if($admin_id != "")
			{
				$sql="delete from admin_tbl where admin_id='".$admin_id."'";
				$db_sql = mysql_query($sql) or die("Error in Delete");
				$count++;
			}
		}
		else
		{
			for($i=0;$i<$_REQUEST['no'];$i++)
			{
				$temp = "ch".$i;
				$admin_id=$_REQUEST["$temp"];
				if($admin_id != "")
				{
					$sql="delete from admin_tbl where admin_id='".$admin_id."'";
					$db_sql = mysql_query($sql) or die("Error in Delete");
					$count++;
				}
			}
		}

		if($db_sql)
		{
			if($count==1)
			{
				$msg=rawurlencode($count." Record Deleted Successfully");
			}
			else
			{
				$msg=rawurlencode($count." Records Deleted Successfully");
			}
		}
		else
		{
			$msg=rawurlencode($count." Record not Delete");
		}
		$var_msg1 =$msg;
	}

	// ACTIVE
	if($_REQUEST['action'] == "Active")
	{
		$count=0;

		for($i=0;$i<$_REQUEST['no'];$i++)
		{
		 	$temp = "ch".$i;
			$admin_id=$_REQUEST["$temp"];
		  	if($admin_id != "")
			{
				$sql="update admin_tbl set eStatus = '1' where admin_id='".$admin_id."'";
				$db_sql=mysql_query($sql) or die("Error in Active");
				$count++;
			}
		}
		if($db_sql)
		{
			$msg=rawurlencode($count." Records are Activated Successfully" );
		}
		else
		{
			$msg=rawurlencode($count."Records are not Activated");
		}
		$var_msg1 =$msg;
	}

	// INACTIVE
	if($_REQUEST['action'] == "Inactive")
	{
		$count=0;
		for($i=0;$i<$_REQUEST['no'];$i++)
		{
		 $temp = "ch".$i;
		 $admin_id = $_REQUEST["$temp"];
		  if($admin_id != "")
			{
			$sql="update admin_tbl set eStatus = '0' where admin_id='".$admin_id."'";
			$db_sql=mysql_query($sql) or die("Error in Inactive");
			$count++;
			}
		}
		if($db_sql)
		{
			$msg=rawurlencode($count." Records are Inactivated Successfully");
		}
		else
		{
			$msg=rawurlencode($count. " Records are not Inactivated");
		}
		$var_msg1 = $msg;
	}

	$action = $_REQUEST['action'];
	$id="";

//----------------------------------------------------------------
	$sql_count1="select * from admin_tbl";
	$db_result1=mysql_query($sql_count1);
	$num_totrec = mysql_num_rows($db_result1);

# ======================================================================================
include('includes/smarty.php');
include('paging.php');
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

	$keyword = $_REQUEST['keyword'];
	$option = $_REQUEST['option'];

	$sorton=$_REQUEST[sorton];
	if(isset($sorton))
	{
		switch ($sorton)
		{
			case "1":
				($stat==1)? $sort = "name" : $sort = "name ".$sortby;
				break;
			case "2":
				($stat==1)? $sort = "username" : $sort = "username ".$sortby;
				break;
			case "3":
				($stat==1)? $sort = "password" : $sort = "password ".$sortby;
				break;
			case "4":
				($stat==1)? $sort = "country" : $sort = "country ".$sortby;
				break;
			case "5":
				($stat==1)? $sort = "created_date" : $sort = "created_date ".$sortby;
				break;
			case "6":
				($stat==1)? $sort = "eStatus" : $sort = "eStatus ".$sortby;
				break;

		}
		if($option=="eStatus" and !empty($keyword))
		{
			$db_query = "select * from admin_tbl where $option like '".trim($keyword)."%' order by $sort ";
		}
		else
		{
			if(!isset($keyword))
			{
				$db_query = "select * from admin_tbl order by $sort ";
			}
			else
			{
				$db_query = "select * from admin_tbl where $option like '".trim($keyword)."%' and eStatus<>'Deleted' order by $sort ";
			}
		}

		$db_result = mysql_query($db_query) or die("Error 4");
		$count_db_res = mysql_num_rows($db_result);
		$smarty->assign("count_db_res",$count_db_res);

	}
	else
	{
		if(isset($keyword))
		{
			$db_query = "select * from admin_tbl where `$option` like '".trim($keyword)."%' order by `$option` desc ";
		}
		else
		{
			$db_query="select * from admin_tbl order by admin_id desc ";
		}

		$db_result = mysql_query($db_query) or die("Error 7");
		$count_db_res = mysql_num_rows($db_result);
		$smarty->assign("count_db_res",$count_db_res);
	}
	$data = array();
	$d = array();
	$i=0;
	while($db_res= mysql_fetch_array($db_result))
	{
		$d['i'] = $i;
		$d['admin_id'] = $db_res['admin_id'];
		$d['username'] = $db_res['username'];
		$d['password'] = $db_res['password'];
		$d['country'] = $db_res['country'];
		$d['name'] = $db_res['name'];
		$d['eStatus'] = $db_res['eStatus'];
		$d['created_date'] = date("l, F jS, Y",strtotime($db_res['created_date']));

		$data[] = $d;
		$i++;
	}
	$smarty->assign("data",$data);
	$smarty->assign("sorton",$sorton);

	$count_db_res;
	if($_REQUEST['var_msg'] != "")
	{
		$var_msg = $_REQUEST['var_msg'];
		$smarty->assign("var_msg",base64_decode($var_msg));
	}
	elseif($count_db_res > 0 && ($keyword == ""))
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

	$smarty->assign("middle_file","adminView.tpl");
	$smarty->display("common_template1.tpl");
?>