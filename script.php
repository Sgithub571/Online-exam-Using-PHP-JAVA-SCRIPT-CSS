<?php
	ob_start();
	session_start();
	
	function connect(){
		
		//$con=mysqli_connect('localhost','techbenc_exadmin','admin@123','techbenc_examdb');
		$con=mysqli_connect('localhost','root','','examdb');
		return $con;
	}
	
	function add_subject($subname){
		$con=connect();		
		$sql="insert into subject(subname) values('$subname')";
		
		$rs=mysqli_query($con,$sql);
		
		return $rs;
	}
	
	function remove_subject($subid){
		$con=connect();		
		$sql="delete from subject where subid='$subid'";
		
		$rs=mysqli_query($con,$sql);
		
		return $rs;
	}
	
	function add_question($data){
		$con=connect();		
		$sql="insert into question(question,opt1,opt2,opt3,answer,subid) values(
					'{$data['question']}',
					'{$data['opt1']}',
					'{$data['opt2']}',
					'{$data['opt3']}',
					'{$data['answer']}',
					'{$data['subid']}'					
			)";
		$rs=mysqli_query($con,$sql);
		
		return $rs;
	}
	
	function remove_question($qid){
		$con=connect();		
		$sql="delete from question where quesid='$qid'";
		
		$rs=mysqli_query($con,$sql);
		
		return $rs;
	}
	
	function add_student($data){
		$con=connect();
		
		$sql="insert into student(rollno,name,college) values(
				'{$data['rollno']}',
				'{$data['name']}',
				'{$data['college']}'
		)";
		
		$rs=mysqli_query($con,$sql);
		
		return $rs;
	}
	
	function remove_student($rollno){
		$con=connect();		
		$sql="delete from student where rollno='$rollno'";
		
		$rs=mysqli_query($con,$sql);
		
		return $rs;
	}
	
	function set_marks($rollno,$total,$obt){
		$con=connect();
		$sql="update student set total_marks='$total', obt_marks='$obt' where rollno='$rollno'";
		$rs=mysqli_query($con,$sql);
		
		return $rs;
	}
	
	function get_students(){
		$con=connect();
		$sql="select * from student";
		
		$rs=mysqli_query($con,$sql);
		return $rs;
	}
	
	function get_questions($subid){
		$con=connect();
		$sql="select * from question where subid='$subid'";
		
		$rs=mysqli_query($con,$sql);
		return $rs;
	}
	
	function get_subjects(){
		$con=connect();
		$sql="select * from subject";
		
		$rs=mysqli_query($con,$sql);
		return $rs;
	}
	
	function get_student($rollno)
	{
		$con=connect();
		$sql="select * from student where  rollno='$rollno'";		
		$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
		
		if(mysqli_num_rows($rs)>0)
		{
			return mysqli_fetch_assoc($rs);
		}
		
		return false;
	}
	
	function stud_login($rollno,$password){
		$con=connect();
		$sql="select * from exam where activated='1' and password='$password'";		
		$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
		$count=mysqli_num_rows($rs);
		$exam=mysqli_fetch_assoc($rs);
		
		if($count>0)
		{
			if(get_student($rollno)!=false)
			{			
				$_SESSION['studlog']=$rollno;
				
				if(!isset($_SESSION['exam']))
				{
					$rsqtn=get_questions($exam['subid']);
					
					$qtnarr=array();
					while(($row=mysqli_fetch_assoc($rsqtn))!=null)
					{
						array_push($qtnarr,$row);
					}
					
					shuffle($qtnarr);
			
					$exam['questions']=$qtnarr;
					$_SESSION['exam']=$exam;
				}
				
				header('location:exam_home.php');
			}
			else{
				echo 'Unknown rollno';
			}
		}else{
			echo 'Invalid password...';
		}
		
		return $rs;	
	}
	
	function admin_login($adminid,$password){
		if($adminid=='admin' && $password='1234'){
			$_SESSION['adminlog']=$adminid;
			
			header('location:admin_home.php');
		}else{
			echo 'Invalid AdminID / Password...';
		}
	}
	
	function add_exam($data){
		$con=connect();
		$sql="insert into exam(exam_date,duration,no_qtn,password,subid) values(
				'{$data['examdate']}',
				'{$data['duration']}',
				'{$data['noqtn']}',
				'{$data['password']}',
				'{$data['subid']}'
		)";
		
		$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
		return $rs;
	}
	
	function get_exams(){
		$con=connect();
		$sql="select * from exam e, subject s where e.subid=s.subid";
		
		$rs=mysqli_query($con,$sql);
		return $rs;
	}
	
	function can_i_activate($examid)
	{
		$con=connect();
		$sql="select * from exam where exam_date >= curdate() and examID='$examid'";
		
		$rs=mysqli_query($con,$sql);
		
		$count=mysqli_num_rows($rs);
		
		return $count>0;
	}
	
	function activate_exam($examid,$act){
		$con=connect();
		$sql="update exam set activated=0 where activated=1";
		$rs=mysqli_query($con,$sql);
		
		$sql="update exam set activated='$act' where examID='$examid'";
		$rs=mysqli_query($con,$sql);
		
		return $rs;		
	}
	
	function remove_exam($exid){
		$con=connect();
		$sql="delete from exam where examID='$exid'";
		
		$rs=mysqli_query($con,$sql);
		return $rs;
	}
	
	function logincheck($type){
		if($type=='admin'){
			if(!isset($_SESSION['adminlog'])){
				header('location:admin_login.php');
			}
		}else if($type=='stud'){
			if(!isset($_SESSION['studlog'])){
				header('location:index.php');
			}
		}
	}
	
	function calcMarks()
	{
		$exam=$_SESSION['exam'];
		
		$answers=$_SESSION['answer'];
		
		$con=connect();
		$marks=0;
		$totalMarks=count($_SESSION['exam']['questions']);
		
		
		
		//var_dump($answers);
		
		foreach($answers as $qno=>$ans)
		{
			$sql="select * from question where quesid='$qno' and answer='$ans'";
			
			$rs=mysqli_query($con,$sql);
			
			$count=mysqli_num_rows($rs);
			
			if($count>0){
				$marks++;
			}
		}				
		
		$sql="insert into exam_result(rollno,examID,total_marks,obt_marks) values(
					'{$_SESSION['studlog']}',
					'{$exam['examID']}',
					'$totalMarks',
					'$marks'
			 )";
			 
		$rs=mysqli_query($con,$sql) or die(mysqli_error($con));
		
		//echo 'You got '.$marks.' out of '.$totalMarks;		
		echo 'Thank You.';
	}
	
	function result_by_exam($examid)
	{
		$con=connect();
		$sql="select * from exam_result er,student s,subject sub,exam ex where er.examID='$examid' and er.rollno=s.rollno and er.examID=ex.examID and ex.subid=sub.subid";
	
		$rs=mysqli_query($con,$sql);
		
		return $rs;	
	}
	
	
?>