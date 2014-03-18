<?php
$sql_set = "select * from setting";
$res = mysql_query($sql_set);
$chk = 0;

while($result = mysql_fetch_array($res))
{
	if($result['vName'] == "site_title")
	{
		$cpanel_title = $result['vValue'];
		$smarty->assign("cpanel_title",$cpanel_title);
	}	
	if($result['vName'] == "RECLIMIT")
	{
		$RECLIMIT = $result['vValue'];
		$smarty->assign("RECLIMIT",$RECLIMIT);
	}
}
?>  