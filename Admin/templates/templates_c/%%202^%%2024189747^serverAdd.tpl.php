<?php /* Smarty version 2.6.0, created on 2014-02-25 22:41:23
         compiled from memberAdd.tpl */ ?>
<?php echo '
	<script type="text/javascript" src="js/validation/jmemberAdd.js"></script>
	<script language="JavaScript">
		var windowReference;
		function openPopup(field) {
			var left = (screen.width/2)-(500/2);
  		var top = (screen.height/2)-(500/2);
			windowReference = window.open(
				"images.php?field="+field,\'imagewindow\', "toolbar=NO,scrollbars=yes, resizable=yes, width=500, height=500, top="+top+", left="+left);
			windowReference.opener = self;
		}
	</script>
'; ?>


<div id="content">
	<h2><img src="images/icons/tools_32.png" alt="Manage Server Details" />Manage Server Details</h2>

<form name="frmadd" method="post"  enctype="multipart/form-data">
<input type="hidden" name="action" value="<?php echo $this->_tpl_vars['action']; ?>
">
<input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
">
	<div class="content-box column-left sidebar">
			<div class="content-box-header">
				<h3>Closed Sidebar</h3>
			</div>
			<div class="content-box-content" style="height:auto;">
				<ul>
					<li><a href="memberView.php">View Server Details</a></li>
					<li><a href="memberAdd.php">Add Server Details</a></li>
				</ul>
			</div>
		</div>
	<div style="float:left; width:10px;">
		&nbsp;
	</div>
	<div class="content-box column-left main">
		<div class="content-box-header">
			<?php if ($this->_tpl_vars['action'] == 'Update'): ?>
			<h3>Edit Form</h3>
			<?php else: ?>
			<h3>Add Form</h3>
			<?php endif; ?>
		</div>

		<div class="content-box-content">
				<fieldset>
					<p>
						<span>Name :</span><br />
						<label>Name</label>
						<input type="text" class="small" name="name" id="name" value="<?php echo $this->_tpl_vars['name']; ?>
" />
					</p>

          <p>
						<span>Info :</span><br />
						<label>Info</label>
						<input type="text" class="small" name="info" id="info" value="<?php echo $this->_tpl_vars['info']; ?>
" />
					</p>

					 <p>
						<span>Position :</span><br />
						<label>Position</label>
						<input type="text" class="small" name="position" id="position" value="<?php echo $this->_tpl_vars['position']; ?>
" />
					</p>

					<p>
						<span>Slot :</span><br />
						<label>Slot</label>
						<input type="text" class="small" name="slot" id="slot" value="<?php echo $this->_tpl_vars['slot']; ?>
" />
					</p>

					<p>
						<span>Image :</span><br />
						<label>Image</label>
            <input type="file" class="small" name="image_url" id="image_url" />
					</p>

					<script type="text/javascript" src="js/jquery.multi-select.js"></script>
					<script type="text/javascript">
						$('#categories').multiSelect()
					</script>
				</fieldset>

				<?php if ($this->_tpl_vars['action'] == 'Update'): ?>
					<input type="submit" id="submit" name="update" value="Modify" >
				<?php else: ?>
					<input type="submit" id="submit" name="add" value="Submit" >
					<input type="button" value="Reset" onclick="reset();return false;">
				<?php endif; ?>
					<input type="button" value="Cancel" onclick="history.back(-1);return false;">
		</div>
	</div>
</form>
</div>