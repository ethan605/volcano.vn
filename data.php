<?php
  include('Admin/includes/connectionPool.php');
  $obj = new connectionPool();
  // include_once('noentry.php');

  $sql_set = "select info_key,info from info_tbl";
  $res = mysql_query($sql_set);
  $chk = 0;

  while($result = mysql_fetch_array($res))
  {
    if($result['info_key'] == "app_development")
    {
      $app_development = $result['info'];
    }
    if($result['info_key'] == "web_development")
    {
      $web_development = $result['info'];
    }
    if($result['info_key'] == "design_and_more")
    {
      $design_and_more = $result['info'];
    }
    if($result['info_key'] == "description")
    {
      $description = $result['info'];
    }
    if($result['info_key'] == "contact_email")
    {
      $contact_email = trim(stripslashes($result['info']));
    }
    if($result['info_key'] == "smtp_username")
    {
      $smtp_username = trim(stripslashes($result['info']));
    }
    if($result['info_key'] == "smtp_password")
    {
      $smtp_password = trim(stripslashes($result['info']));
    }
    if($result['info_key'] == "contact_phone")
    {
      $contact_phone = $result['info'];
    }
  }

  $sql = "select * from member_tbl";
  $members = mysql_query($sql);
  $members1 = mysql_query($sql);

  $sql = "select * from project_tbl";
  $result = mysql_query($sql);
  // $projects = mysql_fetch_array($results)

  while($projects[]=mysql_fetch_array($result));

  $text = split(';', $web_development);
?>
