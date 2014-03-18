{literal}
	<script type="text/javascript" src="js/validation/jmemberAdd.js"></script>
{/literal}

<div id="content">
	<h2><img src="images/icons/tools_32.png" alt="Manage Server Details" />Manage Members</h2>

<form name="frmadd" method="post"  enctype="multipart/form-data">
<input type="hidden" name="action" value="{$action}">
<input type="hidden" name="id" value="{$id}">
	<div class="content-box column-left sidebar">
			<div class="content-box-header">
				<h3>Closed Sidebar</h3>
			</div>
			<div class="content-box-content" style="height:auto;">
				<ul>
					<li><a href="memberView.php">View Member Details</a></li>
					<li><a href="memberAdd.php">Add Member Details</a></li>
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
						<input type="text" class="small" name="name" id="name" value="{$name}" />
					</p>

          <p>
						<span>Info :</span><br />
						<label>Info</label>
						<input type="text" class="small" name="info" id="info" value="{$info}" />
					</p>

					 <p>
						<span>Position :</span><br />
						<label>Position</label>
						<input type="text" class="small" name="position" id="position" value="{$position}" />
					</p>

					<p>
						<span>Slot :</span><br />
						<label>Slot</label>
						<input type="text" class="small" name="slot" id="slot" value="{$slot}" />
					</p>

					<p>
						<span>Image :</span><br />
						<label>Image</label>
            <input type="file" class="small" name="image_url" id="image_url" />
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