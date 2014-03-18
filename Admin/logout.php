<?

include_once("noentry.php");
include('includes/connectionPool.php');
$obj = new connectionPool();

$vFromIP=$_SERVER["REMOTE_ADDR"];
$sql = "update admin_tbl set tLastLogin=now(), vFromIP='".$vFromIP."' where admin_id ='".$_SESSION['ses_varid']."'";
$db_sql = mysql_query($sql) or die("LOGOUT ERROR");

session_destroy();

header("location:index.php?err_msg=logout");
//header("location:../home.php?login=logout");
exit;
?>