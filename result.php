<?php include_once('script.php'); logincheck('stud'); ?>
<?php include_once('header.php') ?>       
       <div class="col_w900">
       		<br/><br/><br/><br/><br/>
       		<h2 style="text-align:center">
				<?php
                    calcMarks();
                ?>	
            </h2>
    		<div class="cleaner"></div>
       </div>
<?php include_once('footer.php') ?>