<?php
    session_start();

    require_once "admin/db_connect.php";
  try
  {
    $connection = @new mysqli($host,$db_login,$db_password,$db_name);
    if($connection->connect_errno!=0)
    {
      throw new Exception(mysqli_connect_errno());
      
    }
    else
    {
      if(isset($_GET['f']))
      {
        $ID = $_GET['f'];
        $db_file = $connection->query("SELECT file_name FROM audio WHERE file_ID = '$ID'"); 
        echo $ID;
      
      
          while($row = mysqli_fetch_assoc($db_file))                            
          { 
        $filepath = "audio/" . $row['file_name'];
            echo $filepath;
        
        // Process download
        if(file_exists($filepath)) {
          header('Content-Description: File Transfer');
          header('Content-Type: application/octet-stream');
          header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: public');
          header('Content-Length: ' . filesize($filepath));
          flush(); // Flush system output buffer
          readfile($filepath);
          exit;
          }
        }
        
      }
      //echo $db_categories->num_rows;
    }
    $connection->close();
  }
  catch(Exception $e)
  {
    
  }
?>