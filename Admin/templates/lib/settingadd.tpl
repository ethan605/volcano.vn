{literal}
<script type="text/javascript" language="javascript">

function chkValidSubmit() 
{
	if(document.frmadd.vValue.value.length<1)
	{
		alert("Please Do not blank this Field !!");
		document.frmadd.vValue.focus(); 
		return false;
	}
 	ans = confirm("Are you sure you want to do this action ?");
	if(ans == true)
	{
		document.frmadd.action.value="Update";
	    document.frmadd.submit();
	}
	else
	{
		return false;
	}	
	return true;
}
</script>

{/literal}
<div id="content">
	<h2><img src="images/icons/tools_32.png" alt="Manage Appisode Screen" />Manage General Settings</h2>
<form name="frmadd" method="post">
<input type="hidden" name="action" value="{$action}">
<input type="hidden" name="vName" value="{$vName}">
	<div class="content-box column-left sidebar">
			<div class="content-box-header">
				<h3>Closed Sidebar</h3>
			</div>
			<div class="content-box-content" style="height:auto;">
				<ul>
					<li><a href="settinglist.php">Settings</a></li>
				</ul>
			</div>
		</div>
	<div style="float:left; width:10px;">
		&nbsp;
	</div>
	<div class="content-box column-left main">
		<div class="content-box-header">
			{if $action == "Update"}
			<h3>Edit Form</h3>
			{else}
			<h3>Add Form</h3>
			{/if}
		</div>
		
		<div class="content-box-content">
				<fieldset>
					<p>
						<label>Description</label>
						<span>{$vDesc}</span>
					</p>
					
					<p>
						<label>Set Value</label>
						<input type="text" class="small" name="vValue" value="{$vValue}">
					</p>
					
				</fieldset>
				
				{if $action == "Update"}
					<input type="submit" id="submit" name="update" value="Modify" onclick="return chkValidSubmit();" >
				{else}
					<input type="submit" id="submit" name="add" value="Submit" onclick="return chkValidSubmit();" >
					<input type="button" value="Reset" onclick="reset();return false;">
				{/if}
					<input type="button" value="Cancel" onclick="history.back(-1);return false;">
		</div>
	</div>
</form>				
</div>