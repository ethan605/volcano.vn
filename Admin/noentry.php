<?
//include_once("include.php");

//if(isset($llink))
//	{
//		$left_link=$llink;
//		session_register('left_link');
//	}
	session_start();
if(!isset($_SESSION['ses_varid']) || $_SESSION['ses_varid'] == ""){

	header("Location:login.php");

	exit();
}
?>