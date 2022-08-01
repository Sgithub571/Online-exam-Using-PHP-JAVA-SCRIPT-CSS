<?php include_once('script.php') ?>
<?php include_once('header.php') ?>       
       <div class="col_w900" style="min-height:400px;">
       		<br/><br/><br/><br/><br/>
          <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table width="416" border="0" cellpadding="5" align="center">
           	<caption><h2>Student Login</h2><hr/></caption>
              <tr>
                <td width="216">Roll No</td>
                <td width="358"><input type="text" name="rollno" id="rollno" /></td>
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
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="center" style="color:red;font-weight:bold">
                	<?php
						if(isset($_POST['btnLogin']))
						{
							$rs=stud_login($_POST['rollno'],$_POST['password']);
						}
					?>
                </td>
              </tr>

            </table>
          </form>
          <div class="cleaner"></div>
        </div>
                   <!-- <div class="testimonial"><span class="close"></span>
                    <p>Donec dolor lectus, rutrum id facilisis eu, condimentum ut enim. Sed quis dapi bus nisi. Mauris at tortor tortor, sit amet porttitor velit. Cras viverra interdum ligula, quis cursus nulla sollicitudin vitae. Sed adipiscing sem ac erat pharetra ac eleifend tellus eleifend. Morbi tempus pharetra gravida.</p>                    
                </div>-->
<?php include_once('footer.php') ?>