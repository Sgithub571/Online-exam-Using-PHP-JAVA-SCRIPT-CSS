<?php include_once('script.php') ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Exam</title>
<meta name="keywords" content="magic color, colorful theme, free CSS templates, CSS, HTML" />
<meta name="description" content="Magic Color Theme, Colorful Template, free website template by templatemo.com" />
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="js/countdown/jquery.countdown.css"/>
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/countdown/jquery.plugin.js"></script>
<script type="text/javascript" src="js/countdown/jquery.countdown.js"></script>
</head>
<body>

<div id="templatemo_body_wrapper">
	<div id="templatemo_wrapper">
    
		<div id="templatemo_header">
        	<div id="site_title"><h1><a href="#" target="_parent">Free CSS Templates</a></h1></div>
        </div>
        
        <div id="templatemo_menu">
            <ul>
            	<?php if(isset($_SESSION['adminlog'])) {?>
                		<li><a href="admin_home.php" class="current">Home</a></li>
                		<li><a href="add_subject.php">Add Sub</a></li>
                        <li><a href="add_question.php">Add Ques</a></li>
                        <li><a href="question_viewer.php">View Ques</a></li>
                        <li><a href="add_student.php">Add Student</a></li>
                        <li><a href="exam_settings.php">Exam Settings</a></li>
                        <li><a href="logout.php">Logout</a></li>
                <?php } else if(isset($_SESSION['studlog'])) {?>
                	                
				<?php }else{?>
                		<li><a href="index.php" class="current">Home</a></li>
                <?php }?>
	                	<li><a href="#">About Us</a></li>
            </ul>    	
        </div> <!-- end of templatemo_menu -->
        
        <div id="templatemo_main">