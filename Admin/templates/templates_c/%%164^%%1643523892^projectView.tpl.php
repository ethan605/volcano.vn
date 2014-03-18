<?php /* Smarty version 2.6.0, created on 2014-02-26 02:02:11
         compiled from projectView.tpl */ ?>
<?php echo '
	<script type="text/javascript" src="js/validation/jlist.js"></script>
'; ?>


<div id="content">
	<h2><img src="images/icons/tools_32.png" alt="Manage News" />Manage Projects</h2>

<form name="frmlist" method="post" action="projectView.php">
<input type="hidden" name="action" value="Search">
<input type="hidden" name="srname" value="">
<input type="hidden" name="keyname" value="">


	<div class="content-box column-left sidebar">
		<div class="content-box-header">
			<h3>Closed Sidebar</h3>
		</div>
		<div class="content-box-content" style="height:auto;">
				<select name="option">
					<option value="title">Title</option>
                    <option value="date">Date</option>
                    <option value="IsActive ">Status</option>
				</select>
			 <br /><br />
			<div style="float:left;">
			 	<input name="keyword" type="Text" size="28" style="height:25px;" value="">
			</div>
			<div>
				&nbsp;&nbsp;<input name="Search" type="image" src=images/search.jpg alt="Search" onClick="return valid()">
			</div>

			<ul>
				<li><a href="projectView.php">View Projects</a></li>
				<li><a href="projectAdd.php">Add Project</a></li>
			</ul>
		</div>
	</div>
	<div style="float:left; width:10px;">
		&nbsp;
	</div>
	<div class="content-box column-left main">
		<div class="content-box-header">
			<h3>News List&nbsp;&nbsp;<font class="errormsg">&nbsp;<?php if ($this->_tpl_vars['var_msg']): ?>(<?php echo $this->_tpl_vars['var_msg']; ?>
)<?php endif; ?></font></h3>
		</div><!-- end .content-box-header -->

		<div class="content-box-content">
			<table class="pagination" rel="<?php echo $this->_tpl_vars['RECLIMIT']; ?>
"><!-- add the class .pagination to dynamically create a working pagination! The rel-attribute will tell how many items there are per page -->
				<thead>
					<tr>
						<th><input type="checkbox" name="abc" value="1" onclick="checkAll();" /></th>
						<th>Title</th>
						<th>Info</th>
						<th>Url</th>
						<th>Image</th>
						<th><a href="#">Actions</a></th>
					</tr>
				</thead>
				<tbody>

					<?php if (count($_from = (array)$this->_tpl_vars['data'])):
    foreach ($_from as $this->_tpl_vars['currdata']):
?>

						<?php if ($this->_tpl_vars['currdata']['i']%2 == 0): ?>
						<tr onmouseover="this.style.backgroundColor='#fbb4de'" onmouseout="this.style.backgroundColor='#eeeeee'" bgcolor="#eeeeee">
						<?php else: ?>
						<tr onmouseover="this.style.backgroundColor='#fbb4de'" onmouseout="this.style.backgroundColor='#dddddd'" bgcolor="#dddddd">
						<?php endif; ?>

							<td><input  type="checkbox" id='iId' name="ch<?php echo $this->_tpl_vars['currdata']['i']; ?>
" value="<?php echo $this->_tpl_vars['currdata']['id']; ?>
"></td>
							<td><?php echo $this->_tpl_vars['currdata']['title']; ?>
</td>
							<td><?php echo $this->_tpl_vars['currdata']['info']; ?>
</td>
							<td><?php echo $this->_tpl_vars['currdata']['url']; ?>
</td>
							<td>
                <?php if ($this->_tpl_vars['currdata']['image_url'] != ""): ?>
                    <a class="fancybox" rel="group" href="UploadedImage/<?php echo $this->_tpl_vars['currdata']['image_url']; ?>
">
                    <img src="UploadedImage/<?php echo $this->_tpl_vars['currdata']['image_url']; ?>
" width="50" height="20" alt="" />
                  </a>
                  <?php else: ?>
                    <img src="images/no_image.png" width="50" height="20" alt="" />
                  <?php endif; ?>
              </td>
							<td>
								<a href="projectAdd.php?id=<?php echo $this->_tpl_vars['currdata']['id']; ?>
&action=Update"><img src="images/icons/pencil.png" alt="Edit" /></a>
								<a href="projectView.php?id=<?php echo $this->_tpl_vars['currdata']['id']; ?>
&action=Delete" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a><!-- to create a tooltip-style confirmation, just add .confirmation to the <a>-tag -->
							</td>
						</tr>
					<?php endforeach; unset($_from); endif; ?>

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
	<input  type="hidden" name="no" value="<?php echo $this->_tpl_vars['count_db_res']; ?>
">
</form>
</div>