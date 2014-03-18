{literal}
	<script type="text/javascript" src="js/validation/jlist.js"></script>
{/literal}
<div id="content">
	<h2><img src="images/icons/tools_32.png" alt="Manage Admin" />Manage Admin</h2>

<form name="frmlist" method="post" action="adminView.php" >
<input type="hidden" name="action" value="Search">
<input type="hidden" name="srname" value="">
<input type="hidden" name="keyname" value="">

	<div class="content-box column-left sidebar">
		<div class="content-box-header">
			<h3>Closed Sidebar</h3>
		</div>
		<div class="content-box-content" style="height:auto;">
				<select name="option">
					<option value="name">Name</option>
					<option value="username">Username</option>
					<option value="eStatus">Status</option>
				</select>
			 <br /><br />
			<div style="float:left;">
			 	<input name="keyword" type="Text" size="28" style="height:25px;" value="">
			</div>	
			<div>
				&nbsp;&nbsp;<input name="Search" type="image" src=images/search.jpg alt="Search" onClick="return valid()">
			</div>	

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
			<h3>Admin List&nbsp;&nbsp;<font class="errormsg">&nbsp;{if $var_msg}({$var_msg}){/if}</font></h3>
		</div><!-- end .content-box-header -->
		
		<div class="content-box-content">
			<table class="pagination" rel="{$RECLIMIT}"><!-- add the class .pagination to dynamically create a working pagination! The rel-attribute will tell how many items there are per page -->
				<thead>
					<tr>
						<th><input type="checkbox" name="abc" value="1" onclick="checkAll();" /></th>
						<th><a href="adminView.php?sorton=1&sortby={$sortby}&tempvar=true{$var_pgs}">Name</a></th>
						<th><a href="adminView.php?sorton=2&sortby={$sortby}&tempvar=true{$var_pgs}">Username</a></th>
                        <th><a href="adminView.php?sorton=4&sortby={$sortby}&tempvar=true{$var_pgs}">Country</a></th>
						<th><a href="adminView.php?sorton=5&sortby={$sortby}&tempvar=true{$var_pgs}">Created Date</a></th>
						<th><a href="adminView.php?sorton=6&sortby={$sortby}&tempvar=true{$var_pgs}">Status</a></th>
						<th><a href="#">Actions</a></th>
					</tr>
				</thead>
				<tbody>
					
					{foreach item="currdata" from=$data}
         
						{if $currdata.i%2 == 0}
						<tr onmouseover="this.style.backgroundColor='#fbb4de'" onmouseout="this.style.backgroundColor='#eeeeee'" bgcolor="#eeeeee">
						{else}
						<tr onmouseover="this.style.backgroundColor='#fbb4de'" onmouseout="this.style.backgroundColor='#dddddd'" bgcolor="#dddddd">
						{/if}
			  
							<td><input  type="checkbox" id='iId' name="ch{$currdata.i}" value="{$currdata.admin_id}"></td>
							<td>{$currdata.name}</td>
							<td>{$currdata.username}</td>
                            <td>{$currdata.country}</td>
							<td>{$currdata.created_date}</td>				  				  
							<td>
							{if $currdata.eStatus == "1"}
								<img src="images/icon-active.gif" alt="Active">
							{elseif $currdata.eStatus == "0"}
								<img src="images/icon-inactive.gif" alt="Inactive">
							{else}
								<img src="images/icon-delete.gif" alt="Deleted">
							{/if}
							</td>
							<td>
								<a href="adminAdd.php?admin_id={$currdata.admin_id}&action=Update"><img src="images/icons/pencil.png" alt="Edit" /></a>
								<a href="adminView.php?admin_id={$currdata.admin_id}&action=Delete" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a><!-- to create a tooltip-style confirmation, just add .confirmation to the <a>-tag -->
							</td>
						</tr>
					{/foreach}
					
				</tbody>
				<tfoot>
					<tr>
						<td colspan="7">			
							<div class="bulk-actions">
								<select name="searching_option" id="searching_option">
									<option value="">Choose an action...</option>
									<option value="active">Active</option>
									<option value="inactive">Inactive</option>
									<option value="delete">Delete</option>
									<option value="showall">Show All</option>
								</select>
								<a href="#" class="graybutton" onclick="return callFunction('searching_option');">Apply to selected</a>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
			
		</div><!-- end .content-box-content -->
		
	</div>
	<input  type="hidden" name="no" value="{$count_db_res}">
</form>				
</div>