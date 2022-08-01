<?php include_once('script.php') ?>
<?php include_once('header.php') ?>       
       <div class="col_w900">
          <form action="add_student.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table width="416" border="0" cellpadding="5" align="center">
           	<caption><h2>Add Student</h2><hr/></caption>
              <tr>
                <td width="216">Roll No</td>
                <td width="358"><input type="text" name="rollno" id="rollno" /></td>
              </tr>              
              <tr>
                <td>Student Name</td>
                <td><input type="text" name="name" id="name" /></td>
              </tr>
              <tr>
                <td>College</td>
                <td><input type="text" name="college" id="college" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnStudent" id="btnStudent" value="Add Student" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="center" style="color:red;font-weight:bold">
                	<?php
						if(isset($_POST['btnStudent']))
						{
							$rs=add_student($_POST);
							
							/*if($rs){
								echo 'successfully inserted...';
							}else{
								echo 'can not add subject...';
							}*/
						}
					?>
                </td>
              </tr>
            </table>
          </form>
          
          
          <br/><br/>
          
          <?php
		  		if(isset($_GET['roll'])){
					remove_student($_GET['roll']);
				}
		  ?>
          
          <table width="600" border="0" cellpadding="5" cellspacing="5" align="center">
           	<caption><h4>&nbsp;</h4></caption>
              <tr>
                <th>Roll No</th>
                <th>Student Name</th>
                <th>College Name</th>
                <th>&nbsp;</th>
            </tr> 
              <?php 
			  	$rs=get_students();
			  	while(($row=mysqli_fetch_assoc($rs))!=null)
				{
					//var_dump($row);
			  		echo '
						  <tr>
							<td align="center">'.$row["rollno"].'</td>
							<td align="center">'.$row["name"].'</td>
							<td align="center">'.$row["college"].'</td>
							
							<td align="center"> <a href="?roll='.$row["rollno"].'">Delete</a></td>
						  </tr> 
			 		   '; 
				}
			  ?>
                           
          </table>
          <div class="cleaner"></div>
        </div>                    
<?php include_once('footer.php') ?>