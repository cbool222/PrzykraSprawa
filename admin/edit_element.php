<?php
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
session_start();

$ID = $_POST['ID'];
$name = $_POST['name'];
$desc = $_POST['description'];
$cat = $_POST['category'];
$author = $_POST['author'];
$source = $_POST['source'];
$audioID = $_POST['audioID'];
$full_file_name = $_POST["filename"];
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


//echo 'Path: '.$target_file."\xA";
//echo 'File type: '.$FileType."\xA";
//echo 'File error: '. $_FILES ["audiofileinput"] ["error"]."\xA";


        try
        {
        $connection = @new mysqli($host,$db_login,$db_password,$db_name);
            if($connection->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());

            }
            else
            {
                if($connection->query("UPDATE audio SET name = '$name', description = '$desc', category = '$cat', author = '$author', source = '$source', file_name = '$full_file_name', file_ID = '$file_ID', order_by = '$order_by' WHERE id = '$ID'"))
                {
                    //echo "2";
                    $_SESSION['db_error']="file_edited";
                    header('Location: admin.php');
                }
                else
                {
                    $_SESSION['db_error']="edit_error";
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

