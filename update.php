<?php

require_once "admin/db_connect.php";
session_start();

$ID = $_POST['IDS'];
//$counter = $_POST['counter'];

        try
        {
        $connection = @new mysqli($host,$db_login,$db_password,$db_name);
            if($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                if($connection->query("UPDATE audio SET times_played=times_played+1  WHERE file_ID = '$ID'"))
                {

                }
                else
                {

                    throw new Exception(mysqli_connect_errno());
                    
                }

            }

        }
        catch(Exception $e)
        {   
           
        }



        //echo "4";
        $connection->close();


?>

