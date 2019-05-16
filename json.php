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
      $db_data = $connection->query("SELECT * FROM audio ORDER BY order_by");
          
      while ($row = mysqli_fetch_assoc($db_data))
      {
       $rawdata[] = $row;
      }
   
    }
    $connection->close();
  
  }
  catch(Exception $e)
  {
    
  } 
  
  function get_category_data($data,$filter){       
    $filterBy = $filter;
    $new = array_filter($data, function ($var) use ($filterBy) {
      return ($var['category'] == $filterBy);
    });
    $new=array_combine(range(0, count($new)-1), $new);        
    
    return $new;     
  }
  
  function merge_category_data($data){   
    $merged = array_unique(array_column($data, 'category'));    
    $merged =array_combine(range(0, count($merged)-1), $merged);
    $merged  = array_flip($merged);     
    foreach ( $merged as $key => $value ) {
      $merged[$key]= get_category_data($data,$key);       
    }     
    
    return $merged;     
  }
  
  function get_file_data($data,$filter){       
    $filterBy = $filter;
    $new = array_filter($data, function ($var) use ($filterBy) {
      return ($var['file_ID'] == $filterBy);
    });
    $new=array_combine(range(0, count($new)-1), $new);        
    $new2 = $new[0];

    return $new2;     
  }
  
  function merge_file_data($data){   
    $merged = array_unique(array_column($data, 'file_ID'));    
    $merged =array_combine(range(0, count($merged)-1), $merged);
    $merged  = array_flip($merged);     
    foreach ( $merged as $key => $value ) {
      $merged[$key] = get_file_data($data,$key);       
    }     
    
    return $merged;     
  }
  $category = merge_category_data($rawdata);
  $fileinfo = merge_file_data($rawdata);
  
  $api = array('category' => $category, 'audio' => $fileinfo);
      
?> 