<?php include_once('script.php') ?>
<?php include_once('header.php') ?>       
       <div class="col_w900">
          <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <table width="416" border="0" cellpadding="5" align="center">
           	<caption><h2>Add Subject</h2><hr/></caption>
              <tr>
                <td width="216">Subject Name</td>
                <td width="358"><input type="text" name="subject" id="subject" /></td>
              </tr>              
              <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="btnAddSub" id="btnAddSub" value="Add Subject" /></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" align="center" style="color:red;font-weight:bold">
                	<?php
						if(isset($_POST['btnAddSub']))
						{
							$rs=add_subject($_POST['subject']);
							
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
		  		if(isset($_GET['subid'])){
					remove_subject($_GET['subid']);
				}
		  ?>
          
          <table width="416" border="0" cellpadding="5" cellspacing="5" align="center">
           	<caption><h4>&nbsp;</h4></caption>
              <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>&nbsp;</th>
            </tr> 
              <?php 
			  	$rs=get_subjects();
			  	while(($row=mysqli_fetch_assoc($rs))!=null)
				{
			  		echo '
						  <tr>
							<td align="center">'.$row["subid"].'</td>
							<td align="center">'.$row["subname"].'</td>
							<td align="center"> <a href="?subid='.$row["subid"].'">Delete</a></td>
						  </tr> 
			 		   '; 
				}
			  ?>
                           
          </table>
          <div class="cleaner"></div>
        </div>                    
<?php include_once('footer.php') ?>