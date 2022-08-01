<?php
	session_start();
	$option=$_POST['option'];
	
	switch($option){
		case 'storeAns':
			$ansParts=$_POST['answer'];
		
			$ansParts=explode('#',$ansParts);
			
			$ans=$ansParts[0];
			$qid=$ansParts[1];
			
			
			if(!isset($_SESSION['answer'])){
				$answers=array();
			}else{
				$answers=$_SESSION['answer'];
			}
						
			$answers[$qid]=$ans;
			
			$_SESSION['answer']=$answers;
			
			$json_answer=json_encode($answers);
			
			echo $json_answer;			
			break;
		case "examTime":
			$exam=$_SESSION['exam'];
			echo $exam['duration']*60;
			break;
	}
	

?>