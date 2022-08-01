<?php include_once('script.php') ?>
<?php include_once('header.php') ?>       
       <div class="col_w900">
          <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table width="416" border="0" cellpadding="5" align="center">
           	<caption><h2>Admin Login</h2><hr/></caption>
              <tr>
                <td width="216">Admin ID</td>
                <td width="358"><input type="text" name="adminid" id="adminid" /></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnLogin" id="btnLogin" value="Login" /></td>
              </tr>
              <tr>
                <td colspan="2" align="center" style="color:red;font-weight:bold">
                	<?php
						if(isset($_POST['btnLogin']))
						{
							admin_login($_POST['adminid'],$_POST['password']);							
						}
					?>
                </td>
              </tr>
            </table>
          </form>
          <div class="cleaner"></div>
        </div>                    
<?php include_once('footer.php') ?>