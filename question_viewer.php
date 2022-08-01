<?php include_once('script.php') ?>
<?php include_once('header.php') ?>       
       <div class="col_w900">
          <form  method="post" enctype="multipart/form-data" name="form1" id="form1" action="question_viewer.php">
          		 <table width="550" border="0" cellpadding="10" align="center">
                      <tr>
                        <td width="216">Subject Name</td>
                        <td width="358"><select name="subid" id="subid" style="width:300px;">
                            <?php
                                $rs=get_subjects();
                                while(($row=mysqli_fetch_assoc($rs))!=null)
                                {
                                    echo '<option value="'.$row['subid'].'">'.$row['subname'].'</option>';
                                }
                            ?>
                        </select></td>
                        <td>
                        	<input name="btnSearch" type="submit" id="btnSearch" value="Search" />
                        </td>
                      </tr> 
                  </table>
          </form>            
               <?php 
			   	if(isset($_GET['qid']))
				{
					remove_question($_GET['qid']);
				}
				
			  	if(isset($_POST['btnSearch']))
				{					
					$rs=get_questions($_POST['subid']);
					
					if(mysqli_num_rows($rs)<=0){
						echo '<div class="col_w900 clientname" style="text-align:center">No records Found</div>';
					}
					else{
						echo '
							<table border="0" cellpadding="10" align="center" class="tab-style-1">
							<caption>
							<h2> Question Viewer</h2><hr/></caption>             
							  <tr>
							    <th width="50">QuestionID</th>
								<th width="102">Question</th>
								<th width="138">Option 1</th>
								<th width="138">Option 2</th>
								<th width="138">Option 3</th>
								<th width="50">Answer</th>
								<th width="37">&nbsp;</th>
							  </tr>
						';
					}
					
					while(($row=mysqli_fetch_assoc($rs))!=null)
					{
						echo '
							  <tr>
							    <td>'.$row['quesid'].'</td>
								<td>'.$row['question'].'</td>
								<td>'.$row['opt1'].'</td>
								<td>'.$row['opt2'].'</td>
								<td>'.$row['opt3'].'</td>
								<td>'.$row['answer'].'</td>
								<td><a href="?qid='.$row['quesid'].'">Delete</a></td>
							  </tr>      
							 ';
					}
				}
			  ?>						                      
            </table>
          <div class="cleaner"></div>
        </div>                    
<?php include_once('footer.php') ?>