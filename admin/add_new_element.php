<?php
session_start();

function generateRandomString($length = 11) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

require_once "db_connect.php";

$name = $_POST['name'];
$desc = $_POST['description'];
$cat = $_POST['category'];
$author = $_POST['author'];
$source = $_POST['source'];
$audioID = $_POST['audioID'];
$file_name = $_FILES['audiofileinput'];
$full_file_name = $file_name["name"];
$order_by = $_POST['order_by'];


$cat = str_replace(' ','_',$cat);
$cat = str_replace(',','–',$cat);


if(!empty($audioID))
{
    //echo 'Audio ID: '.$audioID."\xA";
    $file_ID = $audioID;
}
else
{
    $file_ID = generateRandomString();
    //echo 'File ID: '.$file_ID."\xA";
}

//echo 'Name: '.$name."\xA";
//echo 'Description: '.$desc."\xA";
//echo 'Category: '.$cat."\xA";
//echo 'Author: '.$author."\xA";
//echo 'Source: '.$souce."\xA";
//echo 'File name: '.$file_name."\xA";
//echo 'File ID: '.$file_ID."\xA";



$audio_upload_path = "../audio/";
$target_file = $audio_upload_path . basename($file_name["name"]);
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;

//echo 'Path: '.$target_file."\xA";
//echo 'File type: '.$FileType."\xA";
//echo 'File error: '. $_FILES ["audiofileinput"] ["error"]."\xA";

if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $_SESSION['db_error']="file_exist";
    $uploadOk = 0;
    header('Location: admin.php');
}
if ($uploadOk == 1) {
    if (move_uploaded_file($file_name["tmp_name"], $target_file)) {
        //echo "The file ". basename( $file_name["name"]). " has been uploaded.";

        try
        {
        $connection = @new mysqli($host,$db_login,$db_password,$db_name);
            if($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());

            }
            else
            {
                if($connection->query("INSERT INTO audio VALUES (NULL, '$name','$desc','$cat','$author','$source','$full_file_name','$file_ID','$order_by',0)"))
                {
                    //echo "2";
                    $_SESSION['db_error']="success";
                    header('Location: admin.php');
                }
                else
                {
                    throw new Exception(mysqli_connect_errno());
 
                }

            }

        }
        catch(Exception $e)
        {   
            echo "3";
        }



        echo "4";
        $connection->close();
        header('Location: admin.php');

    } 
    else 
    {
       // echo "Sorry, there was an error uploading your file.";
       $_SESSION['db_error']="file_error";
       //echo "5";
    }
} 

?>

