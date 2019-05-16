<?php

require_once "db_connect.php";
session_start();

$ID = $_POST['ID'];
$filename = $_POST['filename'];

$audio_upload_path = "../audio/";
$target_file = $audio_upload_path . $filename;
//echo $target_file;
unlink($target_file);




try
{
$connection = @new mysqli($host,$db_login,$db_password,$db_name);
    if($connection->connect_errno!=0)
    {
        throw new Exception(mysqli_connect_errno());

    }
    else
    {
        if($connection->query("DELETE FROM audio WHERE id = '$ID'"))
        {
            //echo "2";
            unlink($target_file);
            $_SESSION['db_error']="file_deleted";
            header('Location: admin.php');
        }
        else
        {
            $_SESSION['db_error']="delete_error";
            throw new Exception(mysqli_connect_errno());

        }

    }

}
catch(Exception $e)
{   
    echo "3";
}



//echo "4";
$connection->close();
header('Location: admin.php');


?>

