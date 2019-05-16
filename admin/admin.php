<?php
    session_start();

    require_once "db_connect.php";

    if(!isset($_SESSION['already_log_in']))
    {
        header('Location: ../index.php');
        exit();
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
            $db_categories = $connection->query("SELECT DISTINCT category FROM audio");
            $db_data = $connection->query("SELECT ID, name, category, file_name, file_ID FROM audio");

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
    <title>Przykra sprawa - Panel administracyjny</title>
    <meta charset="utf-8" />    
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="icon" type="image/png" href="../img/favicon.png">  
</head>



<body style='font-family:"Roboto Condensed", sans-serif;'>

    <script src="../js/jquery-3.3.2.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

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
                <li class="nav-item">
                    <a href="logout.php" class="btn btn-outline-danger">Wyloguj</a>
                </li>
            </ul>
        </div>
    </nav>

    <div>
        <h1 class="display-3 text-center text-danger" style="margin-top:5vh">Przykra Sprawa</h1>
        <p><img src="../images/8x.png" class="mx-auto d-block im5" alt="Logo"></p>     
        <h3 class="display-6 text-center text-danger">Panel administracyjny</h3>
    </div>

    <form method="POST" action="add_new_element.php" enctype="multipart/form-data">
        <section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">                
                    <div class="col-md-12">

                    <?php
                        if(isset($_SESSION['db_error']))
                            {
                                if($_SESSION['db_error']=="file_exist")
                                {
                                    echo "<div class='alert alert-dismissible alert-warning'>";
                                    echo    "<button type='button' class='close' data-dismiss='alert'>X</button>";
                                    echo    "<strong>Ups!</strong> <a href='#' class='alert-link'>Plik o takiej nazwie już istnieje na serwerze.</a>";
                                    echo "</div>";
                                }
                                elseif($_SESSION['db_error']=="success")
                                {
                                    echo "<div class='alert alert-dismissible alert-success'>";
                                    echo    "<button type='button' class='close' data-dismiss='alert'>X</button>";
                                    echo    "<strong>Brawo!</strong> <a href='#' class='alert-link'>Nowy wpis dodany do bazy danych</a> powinien już być widoczny na stronie.";
                                    echo "</div>";
                                }
                                elseif($_SESSION['db_error']=="file_error")
                                {
                                    echo "<div class='alert alert-dismissible alert-danger'>";
                                    echo    "<button type='button' class='close' data-dismiss='alert'>X</button>";
                                    echo    "<strong>O kurka!</strong> <a href='#' class='alert-link'>Problem z wysyłaniem pliku</a> spróbuj ponownie pózniej.";
                                    echo "</div>";
                                }
                                elseif($_SESSION['db_error']=="file_edited")
                                {
                                    echo "<div class='alert alert-dismissible alert-success'>";
                                    echo    "<button type='button' class='close' data-dismiss='alert'>X</button>";
                                    echo    "<strong>Wybornie!</strong> <a href='#' class='alert-link'>Wpis zmodyfikowany.</a> Powinien już być widoczny na stronie.";
                                    echo "</div>";
                                }
                                elseif($_SESSION['db_error']=="file_deleted")
                                {
                                    echo "<div class='alert alert-dismissible alert-info'>";
                                    echo    "<button type='button' class='close' data-dismiss='alert'>X</button>";
                                    echo    "<strong>AHTUNG!!!</strong> <a href='#' class='alert-link'>Wpis usunięty z bazy danych</a>";
                                    echo "</div>";
                                }
                                elseif($_SESSION['db_error']=="edit_error")
                                {
                                    echo "<div class='alert alert-dismissible alert-danger'>";
                                    echo    "<button type='button' class='close' data-dismiss='alert'>X</button>";
                                    echo    "<strong>Oj!</strong> <a href='#' class='alert-link'>Błąd edycji wpisu</a> spróbuj ponownie pózniej.";
                                    echo "</div>";
                                }
                                elseif($_SESSION['db_error']=="delete_error")
                                {
                                    echo "<div class='alert alert-dismissible alert-danger'>";
                                    echo    "<button type='button' class='close' data-dismiss='alert'>X</button>";
                                    echo    "<strong>Huh?</strong> <a href='#' class='alert-link'>Błąd usuwania wpisu</a> spróbuj ponownie pózniej.";
                                    echo "</div>";
                                }
                                unset($_SESSION['db_error']);
                            }
                    ?>

                        <nav>
                            <div class="nav nav-tabs nav-fill " id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active active-info" id="nav-data-tab" data-toggle="tab" href="#nav-data" role="tab" aria-controls="nav-data" aria-selected="false">Edycja bazy danych</a>
                                <a class="nav-item nav-link" id="nav-add-tab" data-toggle="tab" href="#nav-add" role="tab" aria-controls="nav-add" aria-selected="true">Dodaj nowy przycisk</a>
                                <a class="nav-item nav-link" id="nav-settings-tab" data-toggle="tab" href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="false">Ustawienia WIP</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab">
                                <div class="container">
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="name">Nazwa:</label>
                                            <input class="form-control" name="name" id="name" type="text" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="description">Opis:</label>
                                            <input class="form-control" autocomplete="off" id="description" name="description" type="text" required>
                                        </div>                                   
                                    </div>
                                    <div class="form-group row">  
                                        <div class="col-lg-4">
                                            <label for="author">Kategoria:</label>
                                            <div class="input-group">
                                                <input type="text" id="category" autocomplete="off" list="exampleList" name="category" required class="form-control" aria-label="Text input with dropdown button">
                                                    <datalist id="exampleList">
                                                        <?php
                                                            while($row = mysqli_fetch_assoc($db_categories))
                                                            {
                                                                $cat = str_replace('_',' ',$row['category']);
                                                                $cat = str_replace('–',',',$cat);
                                                                echo "<option value='$cat'>";
                                                            }
                                                            
                                                        ?>
                                                    </datalist>
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <label for="author">Autor:</label>
                                            <input class="form-control" id="author" name="author" required type="text">
                                        </div>
                                        <div class="col-4">
                                            <label for="source">Źródło:</label>
                                            <input class="form-control" id="source" name="source" required type="text">
                                        </div>
                                    </div>

                                    <div class="form-group row">  
                                        <div class="col-lg-4">
                                            <label for="audioID">Audio ID (puste jeśli losowe):</label>
                                            <div class="input-group">
                                                <input type="text" id="audioID" name="audioID" autocomplete="off" class="form-control" aria-label="Text input with dropdown button">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="author">Kolejnoścć:</label>
                                            <input class="form-control" value="10" id="order_by" name="order_by" type="text">
                                        </div>
                                        <div class="col-4">
                                            <label for="source">WIP:</label>
                                            <input class="form-control" id="WIP2" name="WIP2" type="text" disabled="">
                                        </div>
                                    </div>
                                                                
                                <fieldset>
                                    <div class="form-group">    
                                        <label for="exampleInputFile">Plik dźwiękowy: </label>
                                        <input type="file" class="form-control-file" name="audiofileinput" required id="audiofileinput">
                                    </div>
                                </fieldset>
                                <input type="submit" id="senddata" name="senddata" class="btn btn-success float-right" value="Wyślij">
                                </div>
                                                        

                                </div>
                                <div class="tab-pane fade show active" id="nav-data" role="tabpanel" aria-labelledby="nav-data-tab">
                                <table class="table" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nazwa</th>
                                        <th>Kategoria</th>
                                        <th>Plik</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        while($row2 = mysqli_fetch_assoc($db_data))
                                        {   
                                            $cat = str_replace('_',' ',$row2['category']);
                                            $cat = str_replace('–',',',$cat);
                                            echo "<tr>";
                                            echo "<td>".$row2['ID']."</td>";
                                            echo "<td><a href=edit.php?a=".$row2['file_ID'].">".$row2['name']."</a></td>";
                                            echo "<td>$cat</td>";
                                            echo "<td>".$row2['file_name']."</td>";

                                            echo "</tr>";
                                        }


                                        
                                    ?>
                                </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        </section>
    </form>

</body>

  
</html>