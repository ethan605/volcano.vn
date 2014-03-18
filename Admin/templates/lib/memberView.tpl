{literal}
  <script type="text/javascript" src="js/validation/jlist.js"></script>

    <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $(".fancybox").fancybox();
    });
  </script>
{/literal}

<div id="content">
  <h2><img src="images/icons/tools_32.png" alt="Manage News" />Manage Members</h2>

<form name="frmlist" method="post" action="memberView.php">
<input type="hidden" name="action" value="Search">
<input type="hidden" name="srname" value="">
<input type="hidden" name="keyname" value="">


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
      <h3>Station List&nbsp;&nbsp;<font class="errormsg">&nbsp;{if $var_msg}({$var_msg}){/if}</font></h3>
    </div><!-- end .content-box-header -->

    <div class="content-box-content">
      <table class="pagination" rel="{$RECLIMIT}"><!-- add the class .pagination to dynamically create a working pagination! The rel-attribute will tell how many items there are per page -->
        <thead>
          <tr>
            <th>Name</th>
            <th>Info</th>
            <th>Position</th>
            <th>Slot</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          {foreach item="currdata" from=$data}

            {if $currdata.i%2 == 0}
            <tr onmouseover="this.style.backgroundColor='#fbb4de'" onmouseout="this.style.backgroundColor='#eeeeee'" bgcolor="#eeeeee">
            {else}
            <tr onmouseover="this.style.backgroundColor='#fbb4de'" onmouseout="this.style.backgroundColor='#dddddd'" bgcolor="#dddddd">
            {/if}

              <td>{$currdata.name}</td>
              <td>{$currdata.info}</td>
              <td>{$currdata.position}</td>
              <td>{$currdata.slot}</td>
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
                <a href="memberAdd.php?id={$currdata.id}&action=Update"><img src="images/icons/pencil.png" alt="Edit" /></a>
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