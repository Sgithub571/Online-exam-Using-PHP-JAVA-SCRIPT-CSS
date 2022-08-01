<?php ob_start(); ?>
<html>
    <head>
    	
    </head>
    <body>
        <?php 
            include_once('script.php'); 
            
            session_destroy();
            
            header('location:index.php');
        ?>
    </body>
</html>