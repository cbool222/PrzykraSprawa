<?php

    session_start();

    require_once "admin/db_connect.php";




?>

<?php
                  try
                  {
                      $connection = @new mysqli($host,$db_login,$db_password,$db_name);
                      if($connection->connect_errno!=0)
                      {
                          throw new Exception(mysqli_connect_errno());
               
                      }
                      else
                      {

                        if(isset($_GET['a']))
                        {
                          $ID = $_GET['a'];
                           $db_player = $connection->query("SELECT * FROM audio WHERE file_ID = '$ID'");
                        }                   
                      
                            
                        
                          //echo $db_categories->num_rows;
                      }
                      $connection->close();
                  }
                  catch(Exception $e)
                  {
              
                  }

          ?> 


<html>
  <head>
    
  <title>Przykra sprawa</title>
  <meta charset="utf-8" />
    
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134909822-1"></script>
    
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());    
    gtag('config', 'UA-134909822-1');
  </script>

  <?php
  $theme = 6;
  if($theme == 1)
  {
    echo "<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet'>";
    echo "<link rel='stylesheet' href='./css/bootstrap.css' />";
    echo "<link rel='stylesheet' href='./css/przykra.css' />";
    echo "<link rel='stylesheet' href='./css/custom.css'/>";
    echo "<script src='./js/jquery-3.3.1.min.js'></script>";    
    echo "<script src='https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js'></script>";
    echo "<script src='./js/bootstrap.js'></script>";
    echo "<script src='./egg/egg.js'></script>";
  }
  elseif($theme == 2)
  {
    echo "<link rel='stylesheet' href='https://bootswatch.com/4/cyborg/bootstrap.min.css' />";
    echo "<link rel='stylesheet' href='./css/przykra.css' />";
    echo "<link rel='stylesheet' href='./css/test.css'/>";
    echo "<script src='https://bootswatch.com/_vendor/jquery/dist/jquery.min.js'></script>";
    echo "<script src='https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js'></script>";
    echo "<script src='https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js'></script>";
  }
  elseif($theme == 3)
  {
    echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>";
    echo "<link rel='stylesheet' href='./css/test.css'/>";
    echo "<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>";
    echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>";
    echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>";
  
  }
  elseif($theme == 4)
  {
    echo "<link rel='stylesheet' href='https://bootswatch.com/3/cyborg/bootstrap.css'>";
    echo "<script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>";
    echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>";
    echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>";
  }
  elseif($theme == 5)
  {
    echo "<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet'>";
    echo "<link rel='stylesheet' href='https://bootswatch.com/4/cyborg/bootstrap.css'>";
    echo "<link rel='stylesheet' href='./css/przykra.css' />";
    echo "<link rel='stylesheet' href='./css/custom.css'/>";
    
    echo "<script src='https://bootswatch.com/_vendor/jquery/dist/jquery.min.js'></script>";
    echo "<script src='https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js'></script>";
    echo "<script src='https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js'></script>";

  }
    elseif($theme == 6)
  {
    echo "<link rel='stylesheet' href='./css/custom.css'/>";
    echo "<script src='./js/jquery-3.3.1.min.js'></script>";    

  }
  ?>

  <link rel="shortcut icon" href="images/favicon-przykra.png">

  
</head>
  
<body style="overflow:hidden;background-color: #171717; margin:0;">


                    <?php

                      if(!isset($_GET['a']))
                      {
                        echo "<audio preload='auto' id='player' autoplay>";
                        echo   "<source id='mp3' src='audio/Wonziu - Przykra sprawa.mp3' type='audio/mpeg'>";
                        //echo   "<source id='mp3' src='audio/gnomed.mp3' type='audio/mpeg'>";
                        echo "</audio>";
                        echo "<div class='button-container' style='margin-top: -7px; margin-left: -6px; background-color: #171717; width: auto; margin-bottom:0;'>";
                        echo   "<div class='circle large-button-background-sm '></div>";
                        echo   "<div class='large-button-sm button-pancernik-sm '></div>";
                        echo   "<div class='large-button-shadow-sm '></div>";
                        echo "</div>";
                      }
                      else
                      {
                        $user_count = $db_player->num_rows;
                        while($row3 = mysqli_fetch_assoc($db_player)) 
                          {
                            $name = $row3['name'];
                            $desc = $row3['description'];
                            $author = $row3['author'];
                            $source = $row3['source'];
                            $full_file_name = $row3["file_name"];
                            echo "<audio preload='auto' id='player' autoplay>";
                            echo   "<source id='mp3' src='audio/$full_file_name' type='audio/mpeg'>";
                            echo "</audio>";
                            echo "<div class='button-container' style='margin-top: -7px; margin-left: -6px; background-color: #171717; width: auto; margin-bottom:0;'>";
                            echo   "<div class='circle large-button-background-sm '></div>";
                            echo   "<div class='large-button-sm button-pancernik-sm '></div>";
                            echo   "<div class='large-button-shadow-sm '></div>";
                            echo "</div>";                                             
                          }
                            if($user_count == 0){
                              echo "<audio preload='auto' id='player' autoplay>";
                              echo   "<source id='mp3' src='audio/Rick Astley - Never Gonna Give You Up.mp3' type='audio/mpeg'>";
                              echo "</audio>";
                              echo "<div class='button-container' style='margin-top: -7px; margin-left: -6px; background-color: #171717; width: auto; margin-bottom:0;'>";
                              echo   "<div class='circle large-button-background-sm '></div>";
                              echo   "<div class='large-button-sm button-pancernik-sm '></div>";
                              echo   "<div class='large-button-shadow-sm '></div>";
                              echo "</div>";
      
      }
                        
                      }

                    ?>


                    <script type="text/javascript">
                      var param = getUrlVars()["a"];

                      $('.large-button-sm').click(function() {
                        playsound();                                                
                      });
                      
                      $('#player').on('ended', function() {
                        $('.large-button-sm').removeClass('playing');                        
                      });
  


                      function playsound() {
                        var player = document.getElementById('player');
                        player.play();
                        $.ajax({
                            url: 'update.php',
                            type: 'POST',
                            data: { IDS: param },
                            success: function(data){
                            }
                        }); 
                        $('.large-button-sm').addClass('playing');
                      }
 
                      function getUrlVars()
                      {
                          var vars = [], hash;
                          var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                          for(var i = 0; i < hashes.length; i++)
                          {
                              hash = hashes[i].split('=');
                              vars.push(hash[0]);
                              vars[hash[0]] = hash[1];
                          }
                          return vars;
                      }
                      
                      function stopsound() {
                        var player = document.getElementById('player');
                        player.pause();
                        player.currentTime = 0;
                        looped = 0;
                        $('.large-button-sm').removeClass('playing');
                      }

                      $(document).keyup(function(e) {
                          if (e.key === "Escape") { // escape key maps to keycode `27`
                            stopsound();
                          }
                      });
                      

                    </script>

                    




  

      
  
</body>

  
</html>