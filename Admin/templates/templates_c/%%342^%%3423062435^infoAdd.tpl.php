<?php /* Smarty version 2.6.0, created on 2014-02-25 23:14:40
         compiled from infoAdd.tpl */ ?>
<?php echo '
	<script type="text/javascript" src="js/validation/jmemberAdd.js"></script>
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
					<li><a href="infoView.php">View Info Details</a></li>
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
						<span>Key :</span><br />
						<label>Key</label>
						<input type="text" class="small" name="info_key" id="info_key" maxlength="50" value="<?php echo $this->_tpl_vars['info_key']; ?>
" />
					</p>
					<p>
						<span>Info :</span><br />
						<label>Info</label>
							<textarea type="text" class="small" name="info" id="info"><?php echo $this->_tpl_vars['info']; ?>
</textarea>
					</p>

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