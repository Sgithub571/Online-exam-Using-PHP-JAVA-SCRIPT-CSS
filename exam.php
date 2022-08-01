<?php include_once('script.php'); logincheck('stud'); ?>
<?php include_once('header.php') ?>    
<script type="text/javascript">
	$(function(){
		var radio='input[name="ans"]';
		$(radio).click(function(){
			var answer=$('input[name="ans"]:checked',this.form).val();	
			
			$.post('ajax.php',{'answer':answer,'option':'storeAns'},function(data){
				//alert(data);	
			});			
		});	
		
		$.post('ajax.php',{option:'examTime'},function(data){
			var sec=parseInt(data);
			shortly = new Date(); 
			shortly.setSeconds(shortly.getSeconds() + (sec)); 
			$('#countdown').countdown({until: shortly,  
				onExpiry: liftOff}); 			
		});
	});

	function liftOff(){
		/*$.post('ajax.php',{option:'examTimeOut'},function(data){
				
		});*/
		location.href="result.php";
	}

</script>   
       <div class="col_w900 hr_divider">       
       		<h2>Welcome <?php 			
				$stud=get_student($_SESSION['studlog']);
				echo $stud['name'];
		 ?></h2>
         <div id="countdown" style="font-size:12pt;text-align:right;background-color:transparent;border:none;width:200px;float:right"></div>           
        </div>
       <div class="col_w900 hr_divider"> 
           	   
               <ol>
                  
                   <?php
				   			$qtns=$_SESSION['exam']['questions'];	
							
							foreach($qtns as $q)
							{						
								echo '
									<li>
									  <form action="" name="frm'.$q['quesid'].'">
										  <h3>'.$q['question'].'</h3>
										  <ol type="a" style="font-size:12pt">
											  <li><input type="radio" name="ans" value="a#'.$q['quesid'].'"/>'.$q['opt1'].'</li>
											  <li><input type="radio" name="ans" value="b#'.$q['quesid'].'"/>'.$q['opt2'].'</li>
											  <li><input type="radio" name="ans" value="c#'.$q['quesid'].'"/>'.$q['opt3'].'</li>
										  </ol>
									  </form>          
								   </li>							
								';
							}
				   ?>
           		  
               </ol>
           
       </div>
       
       <div align="center">
           <form name="exam" action="result.php">
                <input type="submit" name="submitExam" value="Submit Exam"/>
           </form>
       </div>
        
<?php include_once('footer.php') ?>