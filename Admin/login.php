<?php
session_start();
//include_once("include.php");
include('includes/connectionPool.php');
$obj = new connectionPool();


$sql = "select * from admin_tbl where username = '".$_REQUEST['username']."' and password = '".$_REQUEST['password']."' and eStatus ='1' ";
$res = mysql_query($sql);

if(mysql_num_rows($res) > 0)
{
	$result = mysql_fetch_array($res);
	
 	$_SESSION['ses_varid'] = $result["admin_id"];
	$_SESSION['ses_login'] = $result["username"];
	$_SESSION['ses_name'] = $result["name"];
	$_SESSION['ses_usertype']="admin";
	
	#------------------------------------------------------
	# FOR LAST LOGIN LOG.
	#------------------------------------------------------
	//$tLastLogin=time();
//	$vFromIP=$_SERVER["REMOTE_ADDR"];
//	$sql = "update admin set tLastLogin='$tLastLogin', vFromIP='$vFromIP' where iAdminId 	='".$_SESSION['ses_varid']."'";
//	$db_sql = $obj->sql_query($sql);
	#------------------------------------------------------

	header("location:quickstats.php");
	exit;
}
else
{
	header("location: index.php?err_msg=fail");
	exit;
}

?>