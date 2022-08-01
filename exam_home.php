<?php include_once('script.php') ?>
<?php include_once('header.php') ?>       
       <div class="col_w900 hr_divider">       
       		<h2>Welcome <?php 			
				$stud=get_student($_SESSION['studlog']);
				echo $stud['name'];
		 ?></h2>
             
        </div>
        <div class="testimonial"><span class="close"></span>
             <p>Donec dolor lectus, rutrum id facilisis eu, condimentum ut enim. Sed quis dapi bus nisi. Mauris at tortor tortor, sit amet porttitor velit. Cras viverra interdum ligula, quis cursus nulla sollicitudin vitae. Sed adipiscing sem ac erat pharetra ac eleifend tellus eleifend. Morbi tempus pharetra gravida.</p>                    
        </div>
       <div class="col_w900" align="center">       
       		<form action="" method="post">
            	<input type="submit" name="btnStartExam" value="Start Exam"/>
            </form>

            <?php
            	 if(isset($_POST['btnStartExam']))
				 {	
				 	$_SESSION['answer']=null;									
					header('location:exam.php');			
				 }
			?>
            
        </div>
        
<?php include_once('footer.php') ?>