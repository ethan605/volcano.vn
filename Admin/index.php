<?php
	session_start();
	include('includes/connectionPool.php');
	$obj = new connectionPool();
	
   if(isset($_SESSION['ses_varid']) && $_SESSION['ses_varid']!="")
   {
   		header("Location: quickstats.php");
		exit;
   }
   else
   {
	   	include('includes/smarty.php');
		if($_REQUEST['err_msg'] == "fail")
		{
			$err_msg = "Invalid Username or Password";
			$smarty->assign("err_msg",$err_msg);
		}
	 	if($_REQUEST['err_msg'] == "logout")
		{
			$err_msg = "You have successfully Logged Out";
			$smarty->assign("err_msg",$err_msg);
		}
	 
     $smarty->assign("on_load","onload='get_fuBlog();'");
     $smarty->display("login.tpl");
   }
	
?>
