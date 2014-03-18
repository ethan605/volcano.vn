<?php
	//	session_start();
	include('includes/connectionPool.php');
	$obj = new connectionPool();
	include_once('noentry.php');

	if($_REQUEST['action'] == "Delete")
	{
		$count=0;
		if($_REQUEST['id'] != "")
		{
			$id = $_REQUEST["id"];
			if($id != "")
			{
				$sql="delete from project_tbl where project_id='".$id."'";
				$db_sql = mysql_query($sql) or die("Error in Delete");
				$count++;
			}
		}
		else
		{
			for($i=0;$i<$_REQUEST['no'];$i++)
			{
				$temp = "ch".$i;
				$id=$_REQUEST["$temp"];
				if($id != "")
				{
					$sql="delete from project_tbl where `project_id`='".$id."'";
					$db_sql = mysql_query($sql) or die("Error in Delete");

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

	if($_REQUEST['action'] == "Active")
	{
		$count=0;

		for($i=0;$i<$_REQUEST['no'];$i++)
		{
		 	$temp = "ch".$i;
			$id=$_REQUEST["$temp"];
		  	if($id != "")
			{
				$sql="update `project_tbl` set IsActive = 'YES' where project_id='".$id."'";
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
			$id = $_REQUEST["$temp"];
			if($id != "")
			{
				$sql="update `project_tbl` set IsActive = 'NO' where project_id='".$id."'";
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
	$sql_count1 = "select * from project_tbl";
	$db_result1 = mysql_query($sql_count1);
	$num_totrec = mysql_num_rows($db_result1);

# ======================================================================================
# Paging Paging comes from this File. Don't Remove this below line.
# ======================================================================================
include('includes/smarty.php');
include("paging.php");
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
				($stat==1)? $sort = "title" : $sort = "title ".$sortby;
				break;
			case "2":
				($stat==1)? $sort = "IsActive" : $sort = "IsActive ".$sortby;
				break;
		}

		if($option=="IsActive" and !empty($keyword))
		{
			$db_query = "select * from project_tbl where $option like '".trim($keyword)."%' order by $sort ";
		}
		else
		{
			if(!isset($keyword))
			{
				$db_query = "select * from project_tbl order by $sort ";
			}
			else
			{
				$db_query = "select * from project_tbl where $option like '".trim($keyword)."%' and IsActive<>'Deleted' order by $sort ";
			}
		}

		$db_result = mysql_query($db_query) or die("Error Select 1");
		$count_db_res = mysql_num_rows($db_result);
		$smarty->assign("count_db_res",$count_db_res);

	}
	else
	{
		if(isset($keyword))
		{
			$db_query = "select * from project_tbl where `$option` like '".trim($keyword)."%' order by `$option` desc ";
		}
		else
		{
			$db_query="select * from project_tbl order by project_id desc ";
		}

		$db_result = mysql_query($db_query) or die("Error Select 2");
		$count_db_res = mysql_num_rows($db_result);
		$smarty->assign("count_db_res",$count_db_res);
	}
	$data = array();
	$d = array();
	$i=0;
	while($db_res= mysql_fetch_array($db_result))
	{
		$d['i'] = $i;
		$d['id'] = $db_res['project_id'];
		$d['title'] = stripslashes($db_res['title']);
		$d['info'] = stripslashes($db_res['info']);
		$d['image_url'] = stripslashes($db_res['image_url']);
		$d['url'] = stripslashes($db_res['url']);

		$data[] = $d;
		$i++;
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
	$smarty->assign("page_name","projectView.php");
	$smarty->assign("curr_page",$page);
	$smarty->assign("links",$page_start);
	$smarty->assign("page_args","{$page_args}");
	$smarty->assign("arr_page_vars",$arr_page_vars);
	// Paging variables Ends Here

	$smarty->assign("middle_file","projectView.tpl");
	$smarty->display("common_template1.tpl");
?>
