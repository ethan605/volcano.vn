{literal}
	<script type="text/javascript" src="js/validation/jlist.js"></script>
{/literal}
<div id="content">
	<h2><img src="images/icons/tools_32.png" alt="Manage Appisode Screen" />Manage General Settings</h2>

<form name="frmlist" method="post" action="settinglist.php" >
<input type="hidden" name="action" value="Search">
<input type="hidden" name="srname" value="">
<input type="hidden" name="keyname" value="">

	<div class="content-box column-left sidebar">
		<div class="content-box-header">
			<h3>Closed Sidebar</h3>
		</div>
		<div class="content-box-content" style="height:auto;">
				<select name="option">
					 <option value="vDesc">Description</option>
                     <option value="vValue">Values</option>
				</select>
			 <br /><br />
			<div style="float:left;">
			 	<input name="keyword" type="Text" size="28" style="height:25px;" value="">
			</div>	
			<div>
				&nbsp;&nbsp;<input name="Search" type="image" src=images/search.jpg alt="Search" onClick="return valid()">
			</div>	

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
			<h3>Appisode List&nbsp;&nbsp;<font class="errormsg">&nbsp;{if $var_msg}({$var_msg}){/if}</font></h3>
		</div>
		
		<div class="content-box-content">
			<table class="pagination" rel="{$RECLIMIT}">
				<thead>
					<tr>
						<th><a href="settinglist.php?sorton=1&sortby={$sortby}&tempvar=true{$var_pgs}">Description</a></th>
						<th><a href="settinglist.php?sorton=2&sortby={$sortby}&tempvar=true{$var_pgs}">Values</a></th>
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
			  
							<td>{$currdata.vDesc}</td>
							<td>{$currdata.vValue}</td>
							<td>
								<a href="settingadd.php?action=update&vName={$currdata.vName}"><img src="images/icons/pencil.png" alt="Edit" /></a>
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
									<option value="showall">Show All</option>
								</select>
								<a href="#" class="graybutton" onclick="return callFunction('searching_option');">Apply to selected</a>
							</div>
						</td>
					</tr>
				</tfoot>
			</table>
			
		</div>
		
	</div>
</form>				
</div>