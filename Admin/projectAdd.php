<?php
//	session_start();

	include('includes/connectionPool.php');
	$obj = new connectionPool();
	include_once('noentry.php');

	if(isset($_POST['update']))
	{
		$id=$_POST["id"];

		$title=mysql_real_escape_string($_POST["title"]);
		$info=mysql_real_escape_string($_POST["info"]);
		$url = mysql_real_escape_string($_POST["url"]);

		$sql_check = "select * from project_tbl where project_id ='".$id."'";
		$res_check = mysql_query($sql_check) or die("Error 1");

		$image_url = $result_check["image_url"];

		if(mysql_num_rows($res_check) > 0)
		{
			if($_FILES['image_url']['tmp_name']!="")
			{
				if(file_exists("UploadedImage/" . $image_url))
				{
					@unlink("UploadedImage/".$image_url);
				}
				$previewImgNameChange = project."_".$id;
				$str = explode('.',$_FILES['image_url']['name']);
				$img_name = $previewImgNameChange. '.' .end($str);
				move_uploaded_file($_FILES['image_url']['tmp_name'],"UploadedImage/$img_name");

				$sql_update = "UPDATE `project_tbl` SET `image_url` = '".$img_name."' WHERE `project_id` = '".$id."' ";
				$qry_update_qry = mysql_query($sql_update);
			}

			$sql = "UPDATE `project_tbl` SET `title`='".$title."', `info`='".$info."', `url`='".$url."' WHERE `project_id`='".$id."'";
			$db_sql=mysql_query($sql) or die("Error 2");

			if($db_sql)
			{
				$msg = base64_encode("Record is Updated");
				header("Location: projectView.php?var_msg=$msg");
				exit;
			}
			else
			{
				$msg = base64_encode("Record is not Updated");
				header("Location: projectView.php?var_msg=$msg");
				exit;
			}
		}
		else
		{
			$msg = base64_encode("Record is not Valid");
			header("Location: projectView.php?var_msg=$msg");
			exit;
		}
	}

	if(isset($_POST['add']))
	{

		$name=mysql_real_escape_string($_POST["name"]);
		$info=mysql_real_escape_string($_POST["info"]);
		$url=mysql_real_escape_string($_POST["url"]);

		$sql = "INSERT INTO `project_tbl` (`title`, `info`, `url`) VALUES ('".$name."', '".$info."', '".$url."')";
		$db_sql=mysql_query($sql) or die("Error 3");

		$id = mysql_insert_id();

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

			$sql_update = "UPDATE `project_tbl` SET `image_url` = '".$img_name."' WHERE `project_id` = '".$id."' ";
			$qry_update_qry = mysql_query($sql_update);
		}

		if($db_sql)
		{
			$msg = base64_encode("Record is Added Successfully");
			header("Location: projectView.php?var_msg=$msg");
			exit;
		}
		else
		{
			$msg = base64_encode("Record is not added");
			header("Location: projectView.php?var_msg=$msg");
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
		$sql="select * from project_tbl where `project_id`='".$id."'";
		$res=mysql_query($sql) or die("Error 4");
		$db_sql = mysql_fetch_array($res);

		$id=$db_sql["project_id"];
		$title= stripslashes($db_sql["title"]);
		$info= stripslashes($db_sql["info"]);
		$url= stripslashes($db_sql["url"]);

		$smarty->assign("id",$id);
		$smarty->assign("title",$title);
		$smarty->assign("info",$info);
		$smarty->assign("url",$url);

		$smarty->assign("action",$action);
	}
	else
	{
		$action="Add";
		$smarty->assign("action",$action);
	}

	$smarty->assign("middle_file","projectAdd.tpl");
	$smarty->display("common_template1.tpl");
?>