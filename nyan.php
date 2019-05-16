<!DOCTYPE html>
<html>
<head>
<title>Nyancernik</title>
<link rel="shortcut icon" href="egg/nyancernik.gif">

<meta http-equiv="refresh" name="viewport" content="width=device-width">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="egg/egg.js" type="text/javascript"></script>
<style>
body {

   background-color: black;
}


h1 {
  text-align: center; 
  font-size: calc(2em + 5vw);
  animation: textAnimate 5s linear infinite alternate;
  background: linear-gradient( 92deg, #95d7e3, #eb76ff );
  background: -webkit-linear-gradient( 92deg, #95d7e3, #eb76ff );
  background-size:600vw 600vw;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
 
&::after {

    content: attr(data-text);
    box-shadow: 2px 4px 2px rgba(0,0,0,0.50);
    z-index: -1;
  }
}

@keyframes textAnimate {
  from {
    filter: hue-rotate(0deg);
    background-position-x: 0%;
    
  }
  to {
    filter: hue-rotate(360deg);
    background-position-x: 600vw;
    
  }
}

}
</style>
</head>
<body onclick="playAudio()" onload="playAudio()">
 


<div class="container">
 <div class="row">
 <div class="col-sm-12 text-center align-self-start" style="padding-top: 10%;padding-bottom: 10%;">
   <h1>NYANCERNIK</h1>
  </div>
  <div class=" col-sm-12 align-self-center text-center">
  <p><h3 id="mute" >Kliknij gdziekolwiek aby odtworzyć dźwięk.</h3></p>
</div>
  <div class="col-sm-12 align-self-center text-center" style="padding-top: 10%;">
   <img src="egg/nyancernik.gif" alt="" />
  </div>
 </div>
</div>


<audio id="nyan" loop>
  <source src="egg/nyancernik.ogg" type="audio/ogg">
  <source src="egg/nyancernik.mp3" type="audio/mpeg">
  Stara przeglądarka detected!
</audio>
    
<script>
function playAudio() { 
    var x = document.getElementById("nyan");
    var y = document.getElementById("mute");
    x.play(); 
    y.style.display = 'none';
} 
 
    $(function(){
        $(window).jKonamicode(function(){
            window.location = 'gandalf.php';
        });
    });
      $(function(){
        $(window).jKonamicode2(function(){
            window.location = 'trojan.php';
        });
    });

</script>

</body>
</html>