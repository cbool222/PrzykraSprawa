<?php
    session_start();

    if((isset($_SESSION['already_log_in'])) && ($_SESSION['already_log_in']==true))
    {
        header('Location: admin.php');
        exit();
    }


?>





<html>
	<head>
		
	<title>Przykra sprawa - Panel administracyjny</title>
	<meta charset="utf-8" />

    <link rel="stylesheet" href="../css/bootstrap.css" />
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <link rel="icon" type="image/png" href="../img/favicon.png">
	
	</head>
  
    <body style='font-family:"Roboto Condensed", sans-serif;'>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border:0">
    <div class="d-flex flex-grow-1">
        <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>

        <div class="w-100 text-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
        <ul class="navbar-nav ml-auto flex-nowrap">
            <li class="nav-item invisible">
                <a href="logout.php" class="btn btn-danger">Wyloguj</a>
            </li>
        </ul>
    </div>
</nav>


    <h1 class="display-3 text-center text-danger" style="margin-top:5vh">Przykra Sprawa</h1>
    <p><img src="../images/8x.png" class="mx-auto d-block im5" alt="Logo"></p>     

    <h3 class="display-6 text-center text-danger">Panel administracyjny</h3>
    <h5 class="display-6 text-center text-danger">Logowanie</h5>
 
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:30vh">
            <div class="col-5">
                <div class="card bg-light mb-3">
                    <?php
                    /*
                    if(isset($_SESSION['login_err']))
                    {
                        echo "<div id='pass_err' class='alert alert-danger' style='display:hidden'>
                        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                        <strong>Error!</strong> A problem has been occurred while submitting your data.
                        </div>";
                    }
                    else
                    {
                        echo "<div id='pass_err' class='alert alert-danger' style='display:hidden'>
                        <a href='#' class='close' data-dismiss='alert'>&times;</a>
                        <strong>Error!</strong> A problem has been occurred while submitting your data.
                        </div>";
                    }
                    */
                    ?>
                    <div class="card-body">
                        <form action="login_form.php" autocomplete="on" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="user" placeholder="Użytkownik">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Hasło">
                            </div>
                            <input type="submit" id="sendlogin" class="btn btn-success float-right" value="Zaloguj">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>

  
</html>