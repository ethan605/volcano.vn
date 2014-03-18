{literal}
	<script type="text/javascript" src="js/validation/jadminAdd.js"></script>
{/literal}
<div id="content">
	<h2><img src="images/icons/tools_32.png" alt="Manage Admin" />Manage Admin</h2>
<form name="frmadd" method="post" >
<input type="hidden" name="action" value="{$action}">
<input type="hidden" name="admin_id" value="{$admin_id}">
	<div class="content-box column-left sidebar">
			<div class="content-box-header">
				<h3>Closed Sidebar</h3>
			</div>
			<div class="content-box-content" style="height:auto;">
				<ul>
					<li><a href="adminView.php">View Admin</a></li>
					<li><a href="adminAdd.php">Add Admin</a></li>
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
						<span>Name :</span><br />
						<label>Name</label>
						<input type="text" class="small" name="name" id="name" maxlength="40" value="{$name}">
					</p>
						
					<p>
						<span>Username :</span><br />
						<label>Username</label>
						<input type="text" class="small" name="username" id="username" maxlength="40" value="{$username}">
					</p>
						
					<p>
						<span>Password :</span><br />
						<label>Password</label>
						<input type="password" class="small" name="password" id="password" maxlength="25" value="{$password}">
					</p>
                    
                    <p>
						<span>Country :</span><br />
						<label>Country</label>
						<input type="text" class="small" name="country" id="country" maxlength="25" value="{$country}">
					</p>
					
					<p>
						<span>Status :</span><br />
						<label>Select Status</label>
						<select name="eStatus">
							{if $eStatus == "1"}
								<option  value="1" selected="selected">Active</option>
								<option  value="0">Inactive</option>
						  	{elseif $eStatus == "0"}
								<option  value="1">Active</option>
								<option  value="0" selected="selected">Inactive</option>
							{else}
								<option  value="1">Active</option>
								<option  value="0">Inactive</option>
							{/if}
						</select>
					</p>
					
				</fieldset>
				
				{if $action == "Update"}
					<input type="submit" id="submit" name="update" value="Modify" >
				{else}
					<input type="submit" id="submit" name="add" value="Submit" >
					<input type="button" value="Reset" onclick="reset();return false;">
				{/if}
					<input type="button" value="Cancel" onclick="history.back(-1);return false;">
		</div>
	</div>
</form>				
</div>