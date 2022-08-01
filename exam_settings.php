<?php include_once('script.php') ?>
<?php include_once('header.php') ?>       
       <div class="col_w900">
          <form action="exam_settings.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table width="416" border="0" cellpadding="5" align="center">
           	<caption><h2>Exam Details</h2><hr/></caption>
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
                <td width="216">Exam Date</td>
                <td width="358"><input type="text" name="examdate" id="examdate" placeholder="YYYY-MM-DD"/></td>
              </tr>              
              <tr>
                <td>Duration</td>
                <td><input type="text" name="duration" id="duration" placeholder="Duration in Min"/></td>
              </tr>
              <tr>
                <td>No Of Questions</td>
                <td><input type="text" name="noqtn" id="noqtn" /></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password" /></td>
              </tr>
              <tr>
                <td>Retype Password</td>
                <td><input type="password" name="repassword" id="repassword" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnAddExam" id="btnAddExam" value="Add Exam" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="center" style="color:red;font-weight:bold">
                	<?php
						if(isset($_POST['btnAddExam']))
						{
							$rs=add_exam($_POST);
							
							var_dump($rs);
							
							if($rs){
								echo 'successfully inserted...';
							}else{
								echo 'can not add ...';
							}
						}
					?>
                </td>
              </tr>
            </table>
          </form>
          
          
          <br/><br/>
          
          <?php
		  		if(isset($_GET['exid'])){
					remove_exam($_GET['exid']);
				}
				
				if(isset($_GET['exid4activation'])){
					activate_exam($_GET['exid4activation'],$_GET['act']);
				}
		  ?>
          
          <table width="600" border="0" cellpadding="5" cellspacing="5" align="center">
           	<caption><h4>&nbsp;</h4></caption>
              <tr>
                <th>Exam ID</th>
                <th>Exam Date</th>
                <th>Subject</th>
                <th>Duration</th>
                <th>No of Qtn</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr> 
              <?php 
			  	$rs=get_exams();
			  	while(($row=mysqli_fetch_assoc($rs))!=null)
				{
					//var_dump($row);
			  		echo '
						  <tr>
							<td align="center">'.$row["examID"].'</td>
							<td align="center">'.$row["exam_date"].'</td>
							<td align="center">'.$row["subname"].'</td>
							<td align="center">'.$row["duration"].'</td>
							<td align="center">'.$row["no_qtn"].'</td>							
							<td align="center"> <a href="?exid='.$row["examID"].'">Delete</a></td>
							<td align="center"> <a href="result_viewer.php?exid='.$row["examID"].'">View Results</a></td>
							';
							
					
					if(can_i_activate($row["examID"]))
					{
						if($row['activated']==0)
						{
							echo '<td align="center"> <a href="?exid4activation='.$row["examID"].'&act=1">Activate</a></td>';
						}
						else
						{
							echo '<td align="center"> <a href="?exid4activation='.$row["examID"].'&act=0">Deactivate</a></td>';
						}
					}							
							
					echo '</tr> 
			 		   '; 
				}
			  ?>
                           
          </table>
          <div class="cleaner"></div>
        </div>                    
<?php include_once('footer.php') ?>