<?php

  session_start(); 

  if ((!isset($_POST['user'])) || (!isset($_POST['password'])))
  {
    header('Location: login.php');
    exit();
  }

  require_once "db_connect.php";

  mysqli_report(MYSQLI_REPORT_STRICT);

  try
  {
    $connection = @new mysqli($host,$db_login,$db_password,$db_name);
    if($connection->connect_errno!=0)
    {
      throw new Exception(mysqli_connect_errno());
    }
    else
    {
  
      $login = $_POST['user'];
      $password = $_POST['password'];
      
      $login = htmlentities($login,ENT_QUOTES,"UTF-8");
  
  
  
      if($result = @$connection->query(
        sprintf("SELECT * FROM admin WHERE user='%s'",
        mysqli_real_escape_string($connection,$login))))
      {
        $user_count = $result->num_rows;
        if($user_count>0)
        {
          $db_row = $result->fetch_assoc();
  
          if(password_verify($password,$db_row['password']))
          {
            $_SESSION['already_log_in'] = true;        
            $user = $db_row['user'];
  
            unset($_SESSION['login_err']);
            $result->free_result();
            header('Location: admin.php');
          }
          else
          {
            $_SESSION['login_err'] = 'login_error';
            header('Location: login.php');            
          }
        }
        else
        {
          $_SESSION['login_err'] = 'login_error';
          header('Location: login.php');
            
        }
      }
  
      $connection->close();
  
    }
  }
  catch(Exception $e)
  {
    echo '<span class="label label-danger">CO TU SIE ODJANIEPAWLIŁO </span>'; 
    //echo '<br /> Dev note: '.$e;
  }







?>