<?php include_once('script.php') ?>
<?php include_once('header.php') ?>       
       <div class="col_w900">
          <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table width="550" border="0" cellpadding="10" align="center">
           	<caption>
           	<h2>Add Question</h2><hr/></caption>
              <tr>
                <td width="216">Subject Name</td>
                <td width="358"><select name="subid" id="subid" style="width:420px;height:30px;">
                	<?php
						$rs=get_subjects();
						while(($row=mysqli_fetch_assoc($rs))!=null)
						{
							echo '<option value="'.$row['subid'].'">'.$row['subname'].'</option>';
						}
					?>
                </select></td>
              </tr>              
              <tr>
                <td valign="top">Question</td>
                <td><textarea name="question" cols="50" rows="5" id="question"></textarea></td>
              </tr>
              <tr>
                <td valign="top">Option 1</td>
                <td><textarea name="opt1" cols="50" rows="5" id="opt1"></textarea></td>
              </tr>
              <tr>
                <td valign="top">Option 2</td>
                <td><textarea name="opt2" cols="50" rows="5" id="opt2"></textarea></td>
              </tr>
              <tr>
                <td valign="top">Option 3</td>
                <td><textarea name="opt3" cols="50" rows="5" id="opt3"></textarea></td>
              </tr>
              <tr>
                <td>Answer</td>
                <td><select name="answer" id="answer" style="width:100px;height:30px;">
                	<option>a</option>
                    <option>b</option>
                    <option>c</option>
                    <option>d</option>
                </select></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnAddQues" id="btnAddQues" value="Add Question" /></td>
              </tr>
              <td colspan="2" align="center" style="color:red;font-weight:bold">
                	<?php
						if(isset($_POST['btnAddQues']))
						{
							$rs=add_question($_POST);
							
							if($rs){
								echo 'successfully added...';
							}else{
								echo 'can not add question...';
							}
						}
					?>
                </td>
            </table>
          </form>
          <div class="cleaner"></div>
        </div>                    
<?php include_once('footer.php') ?>