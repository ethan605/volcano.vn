<?php
	//	session_start();
	include('includes/connectionPool.php');
	$obj = new connectionPool();
	include_once('noentry.php');

	$action = $_REQUEST['action'];
	$id="";

//----------------------------------------------------------------
	$sql = "select * from member_tbl";
	$db_result = mysql_query($sql);

# ======================================================================================
# Paging Paging comes from this File. Don't Remove this below line.
# ======================================================================================
include('includes/smarty.php');
include("paging.php");
# ======================================================================================

	while($db_res= mysql_fetch_array($db_result))
	{
		$d['id'] = $db_res['member_id'];
		$d['name'] = stripslashes($db_res['name']);
		$d['info'] = stripslashes($db_res['info']);
		$d['image_url'] = stripslashes($db_res['image_url']);
		$d['position'] = stripslashes($db_res['position']);
		$d['slot'] = stripslashes($db_res['slot']);
		$data[] = $d;
	}
	$smarty->assign("data",$data);
	$smarty->assign("sorton",$sorton);


	if($_REQUEST['var_msg'] != "")
	{
		$var_msg = $_REQUEST['var_msg'];
		$smarty->assign("var_msg",base64_decode($var_msg));
	}
	elseif($var_msg1 != "")
	{
		$smarty->assign("var_msg",rawurldecode($var_msg1));
	}
	else if($keyword != "")
	{
		$var_msg = "Your search for <font color=#000000>$keyword</font> has found <font color=#000000>$count_db_res</font> matches:";
		$smarty->assign("var_msg",$var_msg);
	}
	elseif($count_db_res > 0 && ($keyword == ""))
	{
		$var_msg = "Total no of records are <font color=#000000>$count_db_res</font>";
		$smarty->assign("var_msg",$var_msg);
	}




	if(!isset($start))
		$start = $start_limit;//1;
//	$num_limit = ($start-1)*$RECLIMIT;
	$startrec = $start;
	$lastrec = $startrec + $RECLIMIT;
	$startrec = $startrec + 1;
	if($lastrec > $num_totrec)
		$lastrec = $num_totrec;
	if($num_totrec > 0 )
	{
		$recmsg = "Showing ".$startrec." - ".$lastrec." Records Of ".$num_totrec;
		$smarty->assign("recmsg",$recmsg);
	}
	else
	{
		$recmsg="No Records Found.";
		$smarty->assign("recmsg",$recmsg);
	}

	// For making paging links
	for( $pageStart=$arr_page_vars['page_link_start']; $pageStart<($arr_page_vars['page_link_start']+10); $pageStart++ )
	{
	  if( $pageStart > $arr_page_vars['no_of_pages'] )
	      break;

	  $page_start[$pageStart] = $pageStart;
	}
	// Ends here

	// Paging variables
	$smarty->assign("page_name","memberView.php");
	$smarty->assign("curr_page",$page);
	$smarty->assign("links",$page_start);
	$smarty->assign("page_args","{$page_args}");
	$smarty->assign("arr_page_vars",$arr_page_vars);
	// Paging variables Ends Here

	$smarty->assign("left_file","server_left.tpl");
	$smarty->assign("middle_file","memberView.tpl");
	$smarty->display("common_template1.tpl");
?>