<?php
//	session_start();

	include('includes/connectionPool.php');
	$obj = new connectionPool();
	include_once('noentry.php');

	if(isset($_POST['update']))
	{
		$admin_id=mysql_real_escape_string($_POST["admin_id"]);
		$username=mysql_real_escape_string($_POST["username"]);
		$password= mysql_real_escape_string($_POST["password"]);
		$country= mysql_real_escape_string($_POST["country"]);
		$name= mysql_real_escape_string($_POST["name"]);
		$eStatus= mysql_real_escape_string($_POST["eStatus"]);

		$sql_check = "select * from admin_tbl where admin_id='".$admin_id."'";
		$res_check = mysql_query($sql_check) or die("Error");
		if(mysql_num_rows($res_check) > 0)
		{
			$sql="update admin_tbl set name= '".$name."', username= '".$username."', password= '".$password."', country = '".$country."', eStatus = '".$eStatus."' where admin_id='".$admin_id."'";

			$db_sql=mysql_query($sql) or die("Error");
			if($db_sql)
			{
				$msg=base64_encode("Record is Updated");
				header("Location: adminView.php?var_msg=$msg");
				exit;
			}
			else
			{
				$msg=base64_encode("Record is not Updated");
				header("Location: adminView.php?var_msg=$msg");
				exit;
			}
		}
		else
		{
			$msg=base64_encode("Record is not Valid");
			header("Location: adminView.php?var_msg=$msg");
			exit;
		}
	}

	if(isset($_POST['add']))
	{
		$username=mysql_real_escape_string($_POST["username"]);
		$password= mysql_real_escape_string($_POST["password"]);
		$name= mysql_real_escape_string($_POST["name"]);
		$country= mysql_real_escape_string($_POST["country"]);
		$eStatus= mysql_real_escape_string($_POST["eStatus"]);

		$sql="insert into admin_tbl (username, password, country, name, eStatus, created_date) values ('".$username."','".$password."','".$country."','".$name."','".$eStatus."',now())";
		$db_sql=mysql_query($sql) or die("Error");
		if($db_sql)
		{
			$msg=base64_encode("Record is Added Successfully");
			header("Location: adminView.php?var_msg=$msg");
			exit;
		}
		else
		{
			$msg=base64_encode("Record is not added");
			header("Location: adminView.php?var_msg=$msg");
			exit;
		}
	}

// ---------------------------------------- INCLUDE SMARTY ---------------------------------------------
	include('includes/smarty.php');
	include('paging.php');
// ---------------------------------------- INCLUDE SMARTY ---------------------------------------------
	$action = $_REQUEST['action'];

	$id="";
	if($action == "Update")
	{
		$admin_id = $_REQUEST['admin_id'];
		$sql="select * from admin_tbl where admin_id='".$_REQUEST['admin_id']."'";
		$res=mysql_query($sql) or die("Error");
		$db_sql = mysql_fetch_array($res);

		$admin_id= stripslashes($db_sql["admin_id"]);
		$username= stripslashes($db_sql["username"]);
		$password= stripslashes($db_sql["password"]);
		$country= stripslashes($db_sql["country"]);
		$name= stripslashes($db_sql["name"]);
		$eStatus= stripslashes($db_sql["eStatus"]);

		$smarty->assign("admin_id",$admin_id);
		$smarty->assign("username",$username);
		$smarty->assign("password",$password);
		$smarty->assign("country",$country);
		$smarty->assign("name",$name);
		$smarty->assign("eStatus",$eStatus);

		$smarty->assign("action",$action);
	}
	else
	{
		$action="Add";
		$smarty->assign("action",$action);
	}

	$smarty->assign("left_file","admin_left.tpl");
	$smarty->assign("middle_file","adminAdd.tpl");
	$smarty->display("common_template1.tpl");
?>