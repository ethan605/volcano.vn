<? 
#===========================================================
# SECURITY PURPOSE SCRIPT
#===========================================================
$site_folder = "/sat/charmingpicture/lib";
$site_path	= $_SERVER["DOCUMENT_ROOT"].$site_folder;

$DIRPATH = $site_path;

if (isset($fileid) and $fileid != "")
{
#-----------------------------------------------------------
# Open File
#-----------------------------------------------------------
	$file = $DIRPATH."/".$fileid;
	$lfd = @fopen ($file, "r"); 
	$data = @fread ($lfd, filesize ($file)); 
	@fclose ($lfd); 
#-----------------------------------------------------------
}
if (isset($action) and $action == "Update")
{
#-----------------------------------------------------------
# Save File
#-----------------------------------------------------------
	$file = $DIRPATH."/".$fileid; 
	$lfd = @fopen ($file, "w"); 
	@fwrite($lfd, stripslashes($fileDate));
	fclose ($lfd); 
#-----------------------------------------------------------
	$var_msg = rawurlencode("File <b>$fileid</b> Successfully Updated.");
	header("Location: smarty_lib.php?var_msg=$var_msg&fileid=$fileid");
	exit;
}

if (isset($action) and $action == "Delete")
{
#-----------------------------------------------------------
# Delete File
#-----------------------------------------------------------

	$file = $file = $DIRPATH.$fileid;
	@unlink($file); 
#-----------------------------------------------------------
	$var_msg = rawurlencode("File <b>$fileid</b> Successfully Deleted.");
	header("Location: smarty_lib.php?var_msg=$var_msg&fileid=$fileid");
	exit;
}

$the_array = Array();
$handle = opendir($DIRPATH);
while (false !== ($file = readdir($handle))) {
   if ($file != "." && $file != "..") {
   $the_array[] = $file;
   }
}
closedir($handle);
sort ($the_array);
reset ($the_array);
$i=1;
	echo "<table align=center border=1 width=60% cellspacing=0  cellpadding=4 bgcolor=#c0c0c0><tr><td colspan=3 class='topmenu11'><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;File List [ $site_path ] </b></td></tr>";
while (list ($key, $val) = each ($the_array)) {
	echo "<tr><td width=10% align=center class='topmenu11'><B>".$i++.".</B></td><td><a href=smarty_lib.php?fileid=$val class='topmenu11'>$val</a></td><td align=right><a href=smarty_lib.php?action=Delete&fileid=$val class='topmenu11'>Delete File Now !!</a></td></tr>";
}
	 echo "</table>";

#===========================================================

?>
<style>
.topmenu11 { font-family: Verdana, Arial, sans-serif; font-size: 10px; color: #102B8F; font-weight: bold; text-decoration: none; }
a.topmenu11:link { font-family: Verdana, Arial, sans-serif; font-size: 10px; color: #102B8F; font-weight: bold; text-decoration: none; }
a.topmenu11:visited { font-family: Verdana, Arial, sans-serif; font-size: 10px; color: #102B8F; font-weight: bold; text-decoration: none; }
a.topmenu11:active { font-family: Verdana, Arial, sans-serif; font-size: 10px; color: #102B8F; font-weight: bold; text-decoration: none; }
a.topmenu11:hover { font-family: Verdana, Arial, sans-serif; font-size: 10px; color: #FF0000; font-weight: bold; text-decoration: underline;}
.topmenu1 { font-family: Verdana, Arial, sans-serif; font-size: 10px; color: #102B8F; font-weight: normal; text-decoration: none; }

</style>

<form name="frmssl" method="post" action="smarty_lib.php?action=Update">

<table width="60%" border="0" align="center">
  <tr>
    <td class="topmenu11"><? if (!isset($fileid) and $fileid == "") { ?> File Not Open:<? } else {?>Current Open File Name : <B> <? echo $fileid; }?></B></td>
		</tr>
	<tr>
	<td align=left class=topmenu11><?=$var_msg ?></td>
  </tr>
  <tr>
    <td colspan=2 class="topmenu11" align="center">
    <textarea name="fileDate" cols="114" rows="20" class="topmenu1"><?=$data; ?></textarea>
</td>
  </tr>
  <tr>
    <td  colspan=2><div align="center">
          <input type="submit" name="Submit" value="Save File Now !!"> 
           &nbsp;&nbsp;<input type="reset" name="Submit2" value="Reset !!">
    </div></td>
  </tr>
</table>
	<input type="hidden" name="fileid" value="<?=$fileid?>">
    </form>