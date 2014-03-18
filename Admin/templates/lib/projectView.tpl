{literal}
	<script type="text/javascript" src="js/validation/jlist.js"></script>
{/literal}

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
			<h3>News List&nbsp;&nbsp;<font class="errormsg">&nbsp;{if $var_msg}({$var_msg}){/if}</font></h3>
		</div><!-- end .content-box-header -->

		<div class="content-box-content">
			<table class="pagination" rel="{$RECLIMIT}"><!-- add the class .pagination to dynamically create a working pagination! The rel-attribute will tell how many items there are per page -->
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

					{foreach item="currdata" from=$data}

						{if $currdata.i%2 == 0}
						<tr onmouseover="this.style.backgroundColor='#fbb4de'" onmouseout="this.style.backgroundColor='#eeeeee'" bgcolor="#eeeeee">
						{else}
						<tr onmouseover="this.style.backgroundColor='#fbb4de'" onmouseout="this.style.backgroundColor='#dddddd'" bgcolor="#dddddd">
						{/if}

							<td><input  type="checkbox" id='iId' name="ch{$currdata.i}" value="{$currdata.id}"></td>
							<td>{$currdata.title}</td>
							<td>{$currdata.info}</td>
							<td>{$currdata.url}</td>
							<td>
                {if $currdata.image_url neq ""}
                    <a class="fancybox" rel="group" href="UploadedImage/{$currdata.image_url}">
                    <img src="UploadedImage/{$currdata.image_url}" width="50" height="20" alt="" />
                  </a>
                  {else}
                    <img src="images/no_image.png" width="50" height="20" alt="" />
                  {/if}
              </td>
							<td>
								<a href="projectAdd.php?id={$currdata.id}&action=Update"><img src="images/icons/pencil.png" alt="Edit" /></a>
								<a href="projectView.php?id={$currdata.id}&action=Delete" class="confirmation"><img src="images/icons/cross.png" alt="Delete" /></a><!-- to create a tooltip-style confirmation, just add .confirmation to the <a>-tag -->
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