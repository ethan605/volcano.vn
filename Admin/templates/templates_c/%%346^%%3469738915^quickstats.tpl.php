<?php /* Smarty version 2.6.0, created on 2014-02-22 17:00:38
         compiled from quickstats.tpl */ ?>
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
			<h3>Quick Status&nbsp;&nbsp;<font class="errormsg">&nbsp;<?php if ($this->_tpl_vars['var_msg']): ?>(<?php echo $this->_tpl_vars['var_msg']; ?>
)<?php endif; ?></font></h3>
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
						<td><a href="adminview.php" title="Total Administrators"><?php echo $this->_tpl_vars['tot_admin']; ?>
</a></td>
						<td><?php echo $this->_tpl_vars['tLastLogin']; ?>
</td>
						<td><?php echo $this->_tpl_vars['vFromIP']; ?>
</td>
					</tr>
				</tbody>				
			</table>
			
		</div>
	</div>
</div>