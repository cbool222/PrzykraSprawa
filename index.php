<?php

  session_start();

  require_once "admin/db_connect.php";

  require_once "json.php";


?>

<html>
  <head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-5PZ948M');</script>
  <!-- End Google Tag Manager -->  

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
  $theme = 1;
  if($theme == 1)
  {
    echo "<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet'>";
    echo "<link rel='stylesheet' href='./css/bootstrap.css' />";
    //echo "<link rel='stylesheet' href='./css/przykra.css' />";
    echo "<link rel='stylesheet' href='./css/custom2.css'/>";
    echo "<script src='./js/jquery-3.3.1.min.js'></script>";    
    echo "<script src='https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js'></script>";
    echo "<script src='./js/bootstrap.js'></script>";
    echo "<script src='./egg/egg.js'></script>";
    echo "<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.2/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>";
    echo "<script src='./js/custom.js'></script>";
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
  ?>

  <link rel="shortcut icon" href="images/favicon-przykra.png">
  <?php
  if(!isset($_GET['a']))
  {
    $ID = 'przykra-sprawa';
  }
  else
  {
    $ID = $_GET['a'];
  }
  $data = $api['audio'][$ID];              
  if (!empty($data)) {
    $name = $data['name'];
    $description = $data['description']; 
    $category = $data['category']; 
    $category = str_replace('_',' ',$category);
    $category = str_replace('–',',',$category);
    $author = $data['author'];
    $source = $data['source'];
    $full_file_name = $data["file_name"];
    if(!isset($_GET['a']))
    {
      $url = "http://" . $_SERVER['SERVER_NAME'] . "/?a=przykra-sprawa";
    }
    else
    {
      $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }
    
  }
  else
  {
    $name = "Przykra Sprawa";
    $description = "Najsłynniejsze dwa słowa ze streamu z Xcoma."; 
    $author = "Wonziu";
    $category = "Wonziu";
    $source = "Stream Xcom";
    $full_file_name = "Rick Astley - Never Gonna Give You Up.mp3";
    $url = "http://" . $_SERVER['SERVER_NAME'] . "/?a=przykra-sprawa";
  }

  echo "<meta content='video' property='og:type'>";
  echo "<meta content='$url' property='og:url'>";
  echo "<meta content='$category - $name' property='og:title'>";
  echo "<meta content='images/og-button.png' property='og:image'>";
  //echo "<meta content='https://i.imgur.com/IJTUVlZ.gif' property='og:image'>";
  echo "<meta content='$description' property='og:description'>";
  echo "<meta content='Przykra Sprawa' property='og:site_name'>";
  echo "<meta content='https://przykrasprawa.pl/embed.php?a=$ID' property='og:video:url'>";
  echo "<meta content='https://przykrasprawa.pl/embed.php?a=$ID' property='og:video:secure_url'>";
  echo "<meta content='text/html' property='og:video:type'>";
  echo "<meta content='148' property='og:video:width'>";
  echo "<meta content='138' property='og:video:height'>";
  echo "<meta content='148' property='og:image:width'>";
  echo "<meta content='138' property='og:image:height'>";

 

  ?>
  
</head>
  
<body style="height:calc(100vh - 67px)" class="carousel-wrap" onload="prep()">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5PZ948M"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div class="container-fluid" style="height:calc(100vh - 67px)">
    <nav class="navbar navbar-expand-md navbar-dark" style="padding-left: 5px;">
      <div class="navbar-brand-przykra">
        <a href="/" class="navbar-brand">
          <span style="font-family: 'Open Sans', sans-serif; padding-bottom: 4px;padding-top: 14px;padding-left: 0px;"><img src="images/favicon-przykra.png" height="32" width="32"> Przykra Sprawa <img src="images/vol2.png"></span>
        </a>
      </div>
      <button class="navbar-toggler" style='padding-right:5px;' type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggler">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav mr-auto">
          <li class="navbar-brand-pancernik">
            <a href="https://pancernik.info/" class="navbar-brand ">
              <span style="font-family: 'Roboto Condensed', sans-serif; font-weight: 700;"><img src="images/logo-pancernikv3.png"></span>
            </a>
          </li>
          <li class="navbar-brand-jadisco">
            <a href="https://jadisco.pl/" class="navbar-brand">
              <img src="images/JDlogo.webp" height="64" width="155">
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="row">
      <div class="col-sm-2">
        <div class="container carousel-wrap">
          <ul class="list-group"style="cursor: pointer;">
            <?php
            foreach($api['category'] as $key => $val){
              $category = str_replace('_',' ',$key);
              $category = str_replace('–',',',$category);
              echo "<li class='list-group-item d-flex justify-content-between align-items-center' data-toggle='collapse' data-target='#$key'>";
              echo "<a class='text-white'><strong>$category</strong></a>";
              echo "<span class='glyphicon'>▼</span>";
              echo "</li>";
              echo "<div id='$key' class='collapse'>";
              foreach ($val as $key2 => $value2) {
                $fileID = $value2['file_ID'];
                //echo "<a class='list-group-item list-group-item-action custom-list-group'id='audiobutton' onclick='ChangeUrl('Przykra Sprawa', '?a=$fileID');'>";?>
                <a class='list-group-item list-group-item-action custom-list-group'id='audiobutton' data-id="<?php echo $fileID ?>" onclick="ChangeUrl('Przykra Sprawa','?a=<?php echo $fileID ?>');">
                <?php
                echo $value2['name'];
              }
              echo "</a>";
              echo "</div>";
            }

            ?>
          </ul>
        </div>
      </div>
      <div class="col-sm-10">
        <div class="container">
          <div class="row no-gutters">
          <div class="col-1 col-sm-1">
              <!--REKLAMA LUL-->
            </div>
          <div class="col-10 col-sm-10" id="audiodata">
            <?php
              if(!isset($_GET['a']))
              {
                $ID = 'przykra-sprawa';
              }
              else
              {
                $ID = $_GET['a'];
              }
              $data = $api['audio'][$ID];              
              if (!empty($data)) {
                $name = $data['name'];
                $description = $data['description']; 
                $author = $data['author'];
                $source = $data['source'];
                $full_file_name = $data["file_name"];
                $timesplayed = $data["times_played"];

                if(!isset($_GET['a']))
                {
                  $url = "http://" . $_SERVER['SERVER_NAME'] . "/?a=przykra-sprawa";
                }
                else
                {
                  $url = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                }
                
              }
              else
              {
                $name = "Przykra Sprawa";
                $description = "Najsłynniejsze dwa słowa ze streamu z Xcoma."; 
                $author = "Wonziu";
                $source = "Stream Xcom";
                $full_file_name = "Rick Astley - Never Gonna Give You Up.mp3";
                $url = "http://" . $_SERVER['SERVER_NAME'] . "/?a=przykra-sprawa";
                $timesplayed = 9001;
              }
              echo "<h1 id='name' class='display-5 text-center text-white' style='margin-top:3vh'>$name</h1>";
              echo "<h5 class='display-5 text-center text-white'>Autor:</h5>";
              echo "<h5 id='author' class='display-5 text-center text-white'>$author</h5>";
              echo "<audio preload='auto' id='player' ontimeupdate='updateTrackTime(this);' onload='updateTrackTime(this);' onhashchange='updateTrackTime(this);'>";
              echo   "<source id='mp3' src='audio/$full_file_name' type='audio/mpeg'>";
              echo "</audio>";
              echo "<div class='button-container d-flex justify-content-between'>";
              echo   "<div class='circle large-button-background '></div>";
              echo   "<div class='large-button button-pancernik '></div>";
              echo   "<div class='large-button-shadow '></div>";
              echo "</div>"; 
              echo "<div class='text-center' style='margin-top:-2vh;'>";
              echo "<h6 id='playertime' class='display-5 text-center text-white' style='display: inline;'>00:00/00:00</h6>";
              echo "<h6 class='display-5 text-center text-white' style='display: inline;'> </h6>";
              echo "<h6 class='text-center text-white' style='display: inline;'>Liczba odtworzeń: </h6>";
              echo "<h6 id='timesplayed' class='text-center text-white' style='display: inline;'>$timesplayed</h6>";
              echo "</div>";
              echo "<div class='text-center'>";
              echo "<input class='volumecontrol' id='volumecontrol' type='range' min='0' max='100' step='1' value='50' oninput='SetVolume(this.value)' onchange='SetVolume(this.value)'>";
              echo "</div>";
              echo "<div class='custom-control custom-switch text-center'>";
              echo "<input type='checkbox' class='custom-control-input' id='loop' onclick='setloop()'>";
              echo "<label class='custom-control-label' for='loop'>Odtwarzaj w pętli</label>";
              echo "</div>";                
              echo "<div class='text-center' style='margin-top:2vh'>";
              echo "<button type='button' class='btn btn-light' data-toggle='modal' data-target='#playerinfo'>O odtwarzaczu</button>";
              echo "</div>";                            
              echo "<h6 class='display-5 text-center text-white' style='margin-top:3vh'>Opis:</h6>";
              echo "<h6 id='desc' class='display-5 text-center text-white'>$desc</h6>";
              echo "<h6 id='source' class='display-5 text-center text-white' style='margin-top:1vh'>Źródło: $source</h6>";
              echo "<h6 class='display-5 text-center text-dark' style='margin-top:3vh'>Kliknij aby skopiować link.</h6>";
              echo "<div class='form-row justify-content-center'>";                         
              echo "<input type='text' class='form-control text-center' readonly value='$url' id='buttonURL' onclick='urlcopy() 'style='max-width: 500px;' data-toggle='tooltip' data-placement='top' data-trigger='focus' title='Skopiowano'>";
              echo "</div>";
              echo "<div class='custom-control custom-switch text-center' style='margin-top:1vh'>";
              echo "<input type='checkbox' class='custom-control-input' id='autoplay' >";
              echo "<label class='custom-control-label' for='autoplay'>Autoplay</label>";
              echo "</div>";
              echo "<div class='text-center'>";
              echo "<a role='button' id='downloadURL' class='btn btn-light' href='download.php?f=$ID' style='margin-top:1vh' >Pobierz MP3</a>";
              echo "</div>";   
              

            ?>
          
        </div>
        <div class="col-1 col-sm-1">
              <!--REKLAMA LUL-->
        </div>
          </div>
          </div>
          <footer class="page-footer font-small blue">        
<!-- Copyright -->
<div class="footer-copyright text-center py-4" style="padding-bottom: 0 !important;">WERSJA: Vol. 2.1<br>
  <button type="button" class="btn btn-link" data-toggle='modal' data-target='#changelog'>Changelog</button>
  <button type="button" class="btn btn-link" data-toggle='modal' data-target='#Info'>Info</button>
</div>
<p style="display:inline;color:red;">cbool222</p> <p style="display:inline">2019</p>
<!-- Copyright -->
</footer>
      </div>
 
    </div>
    
  </div>

  <div class="modal fade" id="playerinfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">O odtwarzaczu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Aby zatrzymać odtwarzanie pliku audio w dowolnym momencie wciśnij <kbd>Esc</kbd><br><br>  
        Rozpoczęcie odtwarzania i pauza możliwe po naciśnięciu <kbd>Spacja</kbd><br><br>
        Aby pobrać plik dźwiękowy kliknij w przycisk "Pobierz MP3"<br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
      </div>
    </div>
  </div>
</div>
  
    <div class="modal fade" id="Info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informacje</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Strona ma charakter satyryczny i wszystkie zawarte na niej dźwięki zostały wyjęte z kontekstu, więc proszę nie mieć <strong>bulu dupy</strong> o to, że jakiś fragment kogoś obraża bez obejrzenia/przesłuchania całej wypowiedzi.<br><br>
        Dziękuję za pomoc przy tworzeniu tej stony całej społeczności <a href="https://jadisco.pl/">Jadisco.pl</a> oraz <a href="https://pancernik.info/">Pancernik.info</a> w szczególności B4rt0, trasek oraz tr0lit <i class="fa fa-heart" aria-hidden="true" style="color: red; border-width:0;"></i><i class="fa fa-heart" aria-hidden="true" style="color: red; border-width:0;"></i><i class="fa fa-heart" aria-hidden="true" style="color: red; border-width:0;"></i><br><br>
        Ta strona używa ciasteczek (cookies), dzięki którym nasz serwis może działać lepiej. <a href="http://wszystkoociasteczkach.pl/" target="_blank">Dowiedz się więcej</a><br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
      </div>
    </div>
  </div>
</div>
  
  
  
  <div class="modal fade" id="changelog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Changelog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Vol. 2.1</h6>
        - Licznik odtworzeń<br><br>
        <h6>Vol. 2</h6>
        - Strona przepisana na nowo, a przynajmniej jej część<br>
        - Sidebar już sie nie zwija YAY<br><br>
        <h6>1.1.0.1</h6>
        - Dodano regulację głośności<br><br>
        <h6>1.1</h6>
        - Dodano odtwarzanie autoplay przez link.<br><br>
        <h6>1.0</h6>
        - Dodano obsługę Open Graph. Dzięki tr0lit <i class="fa fa-heart" aria-hidden="true" style="color: red; border-width:0;"></i><br><br>
        <h6>Beta 1.3</h6>
        - Dodano możliwość pobierania plików.<br>
        - Dodano możliwość loopowania dźwięku.<br><br>
        <h6>Beta 1.2</h6>
        - Dodano samokopiowalne pole tekstowe.<br>
        - Dodano możliwość pauzowania dźwięków.<br>
        - Dodano informacje o obsłudze odtwarzacza pod przyciskiem.<br><br>
        <h6>Beta 1.1</h6>
        - Dodano skrót klawiaturowy zatrzymujący odtwarzanie dźwięku.<br><br>
        <h6>Beta 1.0</h6>
        - Pierwsze wydanie.<br><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
      </div>
    </div>
  </div>
</div>
        
      </div> 
    </div>
  </div>
<script>
var api = <?php echo json_encode($api['audio']); ?>;
var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname + window.location.search + "?a=przykra-sprawa"
var timesplayed = 0; 
var file_ID = 'przykra-sprawa';
function ChangeUrl(title, url) {
    if (typeof (history.pushState) != "undefined") {
        var obj = { Title: title, Url: url };
        history.pushState(obj, obj.Title, obj.Url);
        UpdatePage();
        var durationDiv = document.getElementById('playertime'); 
          durationDiv.innerHTML = '00:00/00:00';
    }
    else {
        alert("Browser does not support HTML5.");
    }
}
function UpdatePage() {
  const urlParams = new URLSearchParams(window.location.search);
  newURL = window.location.protocol + "//" + window.location.host + window.location.pathname + window.location.search
  const myParam = urlParams.get('a');
  var data = document.getElementById('name');
  data.innerHTML = api[myParam].name;
  var data = document.getElementById('author');
  data.innerHTML = api[myParam].author;
  var data = document.getElementById('timesplayed');
  data.innerHTML = api[myParam].times_played;
  //data.innerHTML = "Soon";
  var data = document.getElementById('mp3');
  data.src = 'audio/'+api[myParam].file_name;
  var data = document.getElementById('player');
  data.load();
  updateTrackTime(data);
  var data = document.getElementById('desc');
  data.innerHTML = api[myParam].description;
  var data = document.getElementById('source');
  data.innerHTML = api[myParam].source;
  var data = document.getElementById('buttonURL');
  data.value = newURL;
  var data = document.getElementById('downloadURL');
  data.href = 'download.php?f='+api[myParam].file_ID;
  file_ID = api[myParam].file_ID;
  var durationDiv = document.getElementById('playertime'); 
  durationDiv.innerHTML = '00:00/00:00';
  $('.large-button').removeClass('playing');
  
}
var timeout_id = 0;
var looped = false

$('#player').on('ended', function() {
  var player = document.getElementById('player');
  player.currentTime = 0;
  $('.large-button').removeClass('playing');
  if(looped === true) playsound();
});

$('.large-button').click(function() {
  playsound();          
  ga("send", "event", "audio", "clicked", "test"); 
        
});

function setloop(){
looped = document.getElementById("loop").checked;
}




function playsound() {
  var player = document.getElementById('player');
  /*if(player.currentTime == 0)
  {
  var data = document.getElementById('timesplayed'); 
  var timeplayted = 0
  timeplayed = parseFloat(data.innerHTML) + 1;
  data.innerHTML = timeplayed.toString(); 
  updatedatabase();
  }*/
  player.play();
  $('.large-button').addClass('playing');
  $.ajax({
        url: 'update.php',
        type: 'POST',
        data: { IDS: file_ID },
        success: function(data){
        }
    });  
}

$("player").on("play", function() {
       ga("send", "event", "audio", "clicked", "test");
    });

function playINFsound() {
  var player = document.getElementById('player');
  player.play();
  $('.large-button').addClass('infinite');
}

function pausesound() {
  var player = document.getElementById('player');
  player.pause();
  $('.large-button').removeClass('playing');
}

function stopsound() {
  var player = document.getElementById('player');
  player.pause();
  player.currentTime = 0;
  looped = 0;
  $('.large-button').removeClass('playing');
  $('.large-button').removeClass('infinite');
}

$(document).keyup(function(e) {
    if (e.key === "Escape") { // escape key maps to keycode `27`
      stopsound();
    }
});

var audio = document.getElementById('player');
if (audio) {                        
  window.addEventListener('keydown', function (event) {                          
    var key = event.which || event.keyCode;                          
    if (key === 32) { // spacebar
      event.preventDefault();                            
      audio.paused ? playsound() : pausesound();                            
    }                          
  });
  
}  

function updateTrackTime(track){                        
  var durationDiv = document.getElementById('playertime');                        
  var currTime = Math.floor(track.currentTime).toString(); 
  var duration = Math.floor(track.duration).toString();                     
  if (isNaN(duration)){
    durationDiv.innerHTML = '00:00/'+formatSecondsAsTime(duration);
  } 
  else{
      durationDiv.innerHTML = formatSecondsAsTime(currTime)+'/'+formatSecondsAsTime(duration);   
  }
} 
function formatSecondsAsTime(secs, format) {
  var hr  = Math.floor(secs / 3600);
  var min = Math.floor((secs - (hr * 3600))/60);
  var sec = Math.floor(secs - (hr * 3600) -  (min * 60));
  
  if (min < 10){ 
    min = "0" + min; 
  }
  if (sec < 10){ 
    sec  = "0" + sec;
  }
  
  return min + ':' + sec;
}                        
$(function(){
      $(window).jKonamicode(function(){
        window.location = 'nyan.php';
      });
    });
$(function(){
      $(window).jKonamicode2(function(){
        window.location = 'trojan.php';
      });
    });

$('#autoplay').on('click', function () {
  if(this.checked) $('#buttonURL').val(newURL+'#ap');
  else $('#buttonURL').val(newURL);
});
if(window.location.hash == '#autoplay' || window.location.hash == '#ap') playsound();
$('#buttonURL').on('click', function () {
  $(this).select();
});

window.SetVolume = function(val)
  {
    var player = document.getElementById('player');
    player.volume = val / 100;
    setCookie('volume',val);
    
  }
function prep() {
  var volumebar = document.getElementById('volumecontrol');
  var volume = showCookie('volume')
  volumebar.value = volume;
  SetVolume(volume);                        
}

function urlcopy() {
  var copyText = document.getElementById("buttonURL");
  copyText.select();
  document.execCommand("copy");
}
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});             


function setCookie(name, val, days, path, domain, secure) {
  if (navigator.cookieEnabled) { //czy ciasteczka są włączone
    const cookieName = encodeURIComponent(name);
    const cookieVal = encodeURIComponent(val);
    let cookieText = cookieName + "=" + cookieVal;
    
    if (typeof days === "number") {
      const data = new Date();
      data.setTime(data.getTime() + (days * 24*60*60*1000));
      cookieText += "; expires=" + data.toGMTString();
    }
    
    if (path) {
      cookieText += "; path=" + path;
    }
    if (domain) {
      cookieText += "; domain=" + domain;
    }
    if (secure) {
      cookieText += "; secure";
    }
    
    document.cookie = cookieText;
  }
}

function showCookie(name) {
  if (document.cookie !== "") {
    const cookies = document.cookie.split(/; */);
    
    for (let i=0; i<cookies.length; i++) {
      const cookieName = cookies[i].split("=")[0];
      const cookieVal = cookies[i].split("=")[1];
      if (cookieName === decodeURIComponent(name)) {
        return decodeURIComponent(cookieVal);
      }
    }
  }
}   


</script>


</body>

  
</html>
<?php
function updatedatabase() {
  if(!isset($_GET['a']))
    {
      $ID = 'przykra-sprawa';
    }
    else
    {
      $ID = $_GET['a'];
    }
    try
    {
    $connection = @new mysqli($host,$db_login,$db_password,$db_name);
        if($connection->connect_errno!=0)
        {
            throw new Exception(mysqli_connect_errno());
        }
        else
        {
            if($connection->query("UPDATE audio SET times_played=times_played+1  WHERE id = '$ID'"))
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
    $connection->close(); 
}

?>