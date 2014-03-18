<?php
//	session_start();

	include('includes/connectionPool.php');
	$obj = new connectionPool();
	include_once('noentry.php');

	if(isset($_POST['update']))
	{
		$id = $_POST["id"];

		$sql_check = "select * from member_tbl where member_id='".$id."'";
		$res_check = mysql_query($sql_check) or die("Error 1");
		$result_check = mysql_fetch_array($res_check);

		$image_url = $result_check["image_url"];

		$member_id = $result_check["member_id"];
		$name = mysql_real_escape_string($_POST["name"]);
		$info = mysql_real_escape_string($_POST["info"]);
		$position = mysql_real_escape_string($_POST["position"]);
		$slot = mysql_real_escape_string($_POST["slot"]);

		if(mysql_num_rows($res_check) > 0)
		{
			if($_FILES['image_url']['tmp_name']!="")
			{
				if(file_exists("UploadedImage/" . $image_url))
				{
					@unlink("UploadedImage/".$image_url);
				}
				$previewImgNameChange = member."_".$member_id;
				$str = explode('.',$_FILES['image_url']['name']);
				$img_name = $previewImgNameChange. '.' .end($str);
				move_uploaded_file($_FILES['image_url']['tmp_name'],"UploadedImage/$img_name");

				$sql_update = "UPDATE `member_tbl` SET `image_url` = '".$img_name."' WHERE `member_id` = '".$id."' ";
				$qry_update_qry = mysql_query($sql_update);
			}


			$sql = "UPDATE `member_tbl` SET `name`='".$name."', `info`='".$info."', `slot`='".$slot."', `position`='".$position."' WHERE `member_id`='".$id."'";
			$db_sql=mysql_query($sql) or die("Error 2");
			if($db_sql)
			{
				$msg = base64_encode("Record is Updated");
				header("Location: memberView.php?var_msg=$msg");
				exit;
			}
			else
			{
				$msg = base64_encode("Record is not Updated");
				header("Location: memberView.php?var_msg=$msg");
				exit;
			}
		}
		else
		{
			$msg = base64_encode("Record is not Valid");
			header("Location: memberView.php?var_msg=$msg");
			exit;
		}
	}

	if(isset($_POST['add']))
	{

		$name = mysql_real_escape_string($_POST["name"]);
		$info = mysql_real_escape_string($_POST["info"]);
		$position = mysql_real_escape_string($_POST["position"]);
		$slot = mysql_real_escape_string($_POST["slot"]);

		$sql = "INSERT INTO `member_tbl` (`name`,`info`, `position`, `slot`)
		VALUES ('".$name."','".$info."','".$position."','".$slot."')";
		$db_sql=mysql_query($sql) or die("Error 3");

		$member_id = mysql_insert_id();

		if($_FILES['image_url']['tmp_name']!="")
		{
			if(file_exists("UploadedImage/" . $image_url))
			{
				@unlink("UploadedImage/".$image_url);
			}
			$previewImgNameChange = member."_".$member_id;
			$str = explode('.',$_FILES['image_url']['name']);
			$img_name = $previewImgNameChange. '.' .end($str);
			move_uploaded_file($_FILES['image_url']['tmp_name'],"UploadedImage/$img_name");

			$sql_update = "UPDATE member_tbl SET image_url = '".$img_name."' WHERE member_id = '".$member_id."' ";
			$qry_update_qry = mysql_query($sql_update);
		}

		if($db_sql)
		{
			$msg = base64_encode("Record is Added Successfully");
			header("Location: memberView.php?var_msg=$msg");
			exit;
		}
		else
		{
			$msg = base64_encode("Record is not added");
			header("Location: memberView.php?var_msg=$msg");
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
		$sql="select * from member_tbl where `member_id`='".$id."'";
		$res=mysql_query($sql) or die("Error");
		$db_sql = mysql_fetch_array($res);

		$id=$db_sql["member_id"];
		$name = stripslashes($db_sql["name"]);
		$info = stripslashes($db_sql["info"]);
		$position = stripslashes($db_sql["position"]);
		$image_url = stripslashes($db_sql["image_url"]);
		$slot = stripslashes($db_sql["slot"]);

		$smarty->assign("id",$id);
		$smarty->assign("name",$name);
		$smarty->assign("info",$info);
		$smarty->assign("position",$position);
		$smarty->assign("image_url",$image_url);
		$smarty->assign("slot",$slot);

		$smarty->assign("action",$action);
	}
	else
	{
		$action="Add";

		$smarty->assign("action",$action);
	}

	$smarty->assign("data_packages",$data);

	$smarty->assign("left_file","server_left.tpl");
	$smarty->assign("middle_file","memberAdd.tpl");
	$smarty->display("common_template1.tpl");
?>