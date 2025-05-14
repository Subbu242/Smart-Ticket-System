<?php
            session_start();
            // connect to the database
            include('includes/config.php');
            $email=$_SESSION['login'];
            //echo ($email);
            $sql ="DELETE FROM USER WHERE user_email=:email";
            $query= $dbh -> prepare($sql);
            $query-> bindParam(':email', $email, PDO::PARAM_STR);
            $query-> execute();
              
            header('location: logout.php');

            

        ?>