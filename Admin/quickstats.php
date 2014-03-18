<? 
	include('includes/connectionPool.php');
	$obj = new connectionPool();
	include_once('noentry.php');
	
	include('includes/smarty.php');
	include('paging.php');
#--------------------------------------------------------------
# Admin total 
#------------------------------------------------
$sql="select count(admin_id) as tot from admin_tbl where eStatus<>'Deleted'";
$db_rec = mysql_query($sql);
if(mysql_num_rows($db_rec) > 0)
{
	$result = mysql_fetch_array($db_rec);
	$tot_admin = $result["tot"];
	if ($tot_admin == '')
   		$tot_admin = 0;
}
else
{
	$tot_admin = 0;
}

#--------------------------------------------------------------
$sql="select * from admin_tbl where admin_id ='".$_SESSION['ses_varid']."'";

$db_rec = mysql_query($sql);
if(mysql_num_rows($db_rec) > 0)
{
	$result = mysql_fetch_array($db_rec);
	$tLastLogin = $result["tLastLogin"];
	$vFromIP  = $result["vFromIP"];
}
$smarty->assign("name",$_SESSION['ses_name']);

$smarty->assign("tot_admin",$tot_admin);
$smarty->assign("tLastLogin",date("l, F jS, Y",strtotime($tLastLogin)));
$smarty->assign("vFromIP",$vFromIP);

	$smarty->assign("left_file","quickstats_left.tpl");
	$smarty->assign("middle_file","quickstats.tpl");
    @$smarty->display("common_template1.tpl");
#--------------------------------------------------------------
?>