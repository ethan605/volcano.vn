<div id="content">
	<h2><img src="images/icons/tools_32.png" alt="Manage Admin" />Manage Quick Status</h2>

	<div class="content-box column-left sidebar">
		<div class="content-box-header">
			<h3>Closed Sidebar</h3>
		</div>
		<div class="content-box-content" style="height:auto;">
			<ul>
				<li><a href="quickstats.php">Quick Status</a></li>
			</ul>
		</div>
	</div>
	<div style="float:left; width:10px;">
		&nbsp;
	</div>			
	<div class="content-box column-left main">
		<div class="content-box-header">
			<h3>Quick Status&nbsp;&nbsp;<font class="errormsg">&nbsp;{if $var_msg}({$var_msg}){/if}</font></h3>
		</div>
		
		<div class="content-box-content">
			<table class="pagination" rel="5">
				<thead>
					<tr>
						<th><a href="#">Total Administrator</a></th>
						<th><a href="#">Last Login Date</a></th>
						<th><a href="#">Your IP</a></th>
					</tr>
				</thead>
				<tbody>					
					<tr>
						<td><a href="adminview.php" title="Total Administrators">{$tot_admin}</a></td>
						<td>{$tLastLogin}</td>
						<td>{$vFromIP}</td>
					</tr>
				</tbody>				
			</table>
			
		</div>
	</div>
</div>