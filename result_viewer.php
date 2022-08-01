<?php include_once('script.php') ?>
<?php include_once('header.php') ?>       
       <div class="col_w900">                      
               <?php 
					$rs=result_by_exam($_GET['exid']);
					
					if(mysqli_num_rows($rs)<=0){
						echo '<div class="col_w900 clientname" style="text-align:center">No records Found</div>';
					}
					else{
						echo '
							<table border="0" cellpadding="10" align="center" class="tab-style-1">
							<caption>
							<h2>Results</h2><hr/></caption>             
							  <tr>
							    <th>Roll No</th>
								<th>Name</th>
								<th>College</th>
								<th>Subject Name</th>
								<th>Total Marks</th>
								<th>Marks Obtained</th>
								<th>% Of Marks</th>
							  </tr>
						';
					}
					
					while(($row=mysqli_fetch_assoc($rs))!=null)
					{
						echo '
							  <tr>
							    <td>'.$row['rollno'].'</td>
								<td>'.$row['name'].'</td>
								<td>'.$row['college'].'</td>
								<td>'.$row['subname'].'</td>
								<td>'.$row['total_marks'].'</td>
								<td>'.$row['obt_marks'].'</td>
								<td>'.(round($row['obt_marks']/$row['total_marks']*100,2)).'</td>
							  </tr>      
							 ';
					}
			  ?>						                      
            </table>
          <div class="cleaner"></div>
        </div>                    
<?php include_once('footer.php') ?>