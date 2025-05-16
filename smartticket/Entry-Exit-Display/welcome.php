<?php

#include('../includes/config.php');
$data=file_get_contents("D:\\Finay Year project\\Face_Recognition\\face_data.json");
$res=json_decode($data);
$recognized_id=$res->user_id;
$name=$res->user_name;

?>    
<!DOCTYPE html>
<html>

    <head>
        <!-- Meta -->
	<meta http-equiv="refresh" content="3;url=entry-display.php" />
        <meta charset="utf-8">
        <title>Smart Ticket</title>

         <link rel="stylesheet" href="greeet-style.css">
    </head>

    <body style=" background-color: #27ae60;">
    <bgsound src="welcome_message.wav">

        <br><br><br><br><br><br><br>    
        <div>
            <div>
                 <p>Welcome <br> <?php echo($name)?></p>                
            </div>
        </div>
        
    </body>

</html>


 <div id="main-page">
 <!--- Main Content Here -->
        </div>
            
        <div id="next-page">
 <!--- Next Page Content Here -->
        </div> 