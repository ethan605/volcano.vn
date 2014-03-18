<?php /* Smarty version 2.6.0, created on 2014-02-26 00:49:36
         compiled from projectAdd.tpl */ ?>
<?php echo '
	<script type="text/javascript" src="js/validation/jprojectAdd.js"></script>
'; ?>


<div id="content">
	<h2><img src="images/icons/tools_32.png" alt="Manage Admin" />Manage Categories</h2>

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
					<li><a href="projectView.php">View Categories</a></li>
					<li><a href="projectAdd.php">Add Categories</a></li>
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
						<span>Title :</span><br />
						<label>Title</label>
						<input type="text" class="small" name="title" id="title" value="<?php echo $this->_tpl_vars['title']; ?>
">
					</p>

					<p>
						<span>Info:</span><br />
						<label>Info</label>
						<input type="text" class="small" name="info" id="info" value="<?php echo $this->_tpl_vars['info']; ?>
">
					</p>

					<p>
						<span>Url:</span><br />
						<label>Url</label>
						<input type="text" class="small" name="url" id="info" value="<?php echo $this->_tpl_vars['url']; ?>
">
					</p>

					<p>
						<span>Image :</span><br />
						<label>Image</label>
            <input type="file" class="small" name="image_url" id="image_url" />
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