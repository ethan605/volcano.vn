<?php /* Smarty version 2.6.0, created on 2014-02-26 02:00:00
         compiled from memberView.tpl */ ?>
<?php echo '
  <script type="text/javascript" src="js/validation/jlist.js"></script>

    <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

    <script type="text/javascript" src="js/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
      $(".fancybox").fancybox();
    });
  </script>
'; ?>


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
      <h3>Station List&nbsp;&nbsp;<font class="errormsg">&nbsp;<?php if ($this->_tpl_vars['var_msg']): ?>(<?php echo $this->_tpl_vars['var_msg']; ?>
)<?php endif; ?></font></h3>
    </div><!-- end .content-box-header -->

    <div class="content-box-content">
      <table class="pagination" rel="<?php echo $this->_tpl_vars['RECLIMIT']; ?>
"><!-- add the class .pagination to dynamically create a working pagination! The rel-attribute will tell how many items there are per page -->
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

          <?php if (count($_from = (array)$this->_tpl_vars['data'])):
    foreach ($_from as $this->_tpl_vars['currdata']):
?>

            <?php if ($this->_tpl_vars['currdata']['i']%2 == 0): ?>
            <tr onmouseover="this.style.backgroundColor='#fbb4de'" onmouseout="this.style.backgroundColor='#eeeeee'" bgcolor="#eeeeee">
            <?php else: ?>
            <tr onmouseover="this.style.backgroundColor='#fbb4de'" onmouseout="this.style.backgroundColor='#dddddd'" bgcolor="#dddddd">
            <?php endif; ?>

              <td><?php echo $this->_tpl_vars['currdata']['name']; ?>
</td>
              <td><?php echo $this->_tpl_vars['currdata']['info']; ?>
</td>
              <td><?php echo $this->_tpl_vars['currdata']['position']; ?>
</td>
              <td><?php echo $this->_tpl_vars['currdata']['slot']; ?>
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
                <a href="memberAdd.php?id=<?php echo $this->_tpl_vars['currdata']['id']; ?>
&action=Update"><img src="images/icons/pencil.png" alt="Edit" /></a>
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