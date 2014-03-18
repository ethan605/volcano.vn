<?php
//	session_start();

	include('includes/connectionPool.php');
	$obj = new connectionPool();
	include_once('noentry.php');

	if(isset($_POST['update']))
	{
		$id = $_POST["id"];

			$sql_check = "select * from info_tbl where infoID='".$id."'";
			$res_check = mysql_query($sql_check) or die("Error");
			$result_check = mysql_fetch_array($res_check);



		$info = mysql_real_escape_string($_POST["info"]);
		$info_key = mysql_real_escape_string($_POST["info_key"]);

		$sql_check = "select * from info_tbl where infoID ='".$id."'";
		$res_check = mysql_query($sql_check) or die("Error");
		if(mysql_num_rows($res_check) > 0)
		{
			$sql = "UPDATE `info_tbl` SET `info`='".$info."',`info_key`='".$info_key."'  WHERE `infoID`='".$id."'";

			$db_sql=mysql_query($sql) or die("Error");
			if($db_sql)
			{
				$msg = base64_encode("Record is Updated");
				header("Location: infoView.php?var_msg=$msg");
				exit;
			}
			else
			{
				$msg = base64_encode("Record is not Updated");
				header("Location: infoView.php?var_msg=$msg");
				exit;
			}
		}
		else
		{
			$msg = base64_encode("Record is not Valid");
			header("Location: infoView.php?var_msg=$msg");
			exit;
		}
	}

	if(isset($_POST['add']))
	{
		$info_key = mysql_real_escape_string($_POST["info_key"]);
		$info = mysql_real_escape_string($_POST["info"]);

		$sql = "INSERT INTO `info_tbl` (`info_key`,`info`) VALUES ('".$info_key."', '".$info."')";
		$db_sql=mysql_query($sql) or die("Error");

		if($db_sql)
		{
			$msg = base64_encode("Record is Added Successfully");
			header("Location: infoView.php?var_msg=$msg");
			exit;
		}
		else
		{
			$msg = base64_encode("Record is not added");
			header("Location: infoView.php?var_msg=$msg");
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
		$id = $_REQUEST['id'];
		$sql="select * from info_tbl where `infoID`='".$id."'";
		$res=mysql_query($sql) or die("Error");
		$db_sql = mysql_fetch_array($res);

		$id=$db_sql["infoID"];
		$info =$db_sql["info"];
		$info_key =$db_sql["info_key"];

		$smarty->assign("id",$id);
		$smarty->assign("info",$info);
		$smarty->assign("info_key",$info_key);

		$smarty->assign("action",$action);
	}
	else
	{
		$action="Add";
		$smarty->assign("action",$action);
	}

	$smarty->assign("data_packages",$data);

	$smarty->assign("left_file","info_left.tpl");
	$smarty->assign("middle_file","infoAdd.tpl");
	$smarty->display("common_template1.tpl");
?>