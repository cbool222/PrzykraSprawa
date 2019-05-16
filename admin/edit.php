<?php
    session_start();

    require_once "db_connect.php";

    if(!isset($_SESSION['already_log_in']))
    {
        header('Location: ../index.php');
        exit();
    }
    
    $q_string = $_GET['a'];
    //echo $q_string;

    try
    {
        $connection = @new mysqli($host,$db_login,$db_password,$db_name);
        if($connection->connect_errno!=0)
        {
            throw new Exception(mysqli_connect_errno());
 
        }
        else
        {
            $result = $connection->query("SELECT * FROM audio WHERE file_ID = '$q_string'");
            $db_edit = $result->fetch_assoc();

            
        }
        $connection->close();

    }
    catch(Exception $e)
    {   
        
    }

    $edit_ID = $db_edit['ID'];
    $edit_name = $db_edit['name'];
    $edit_desc = $db_edit['description'];
    $edit_cat = $db_edit['category'];
    $edit_author = $db_edit['author'];
    $edit_source = $db_edit['source'];
    $edit_file_name = $db_edit['file_name'];
    $edit_fileID = $db_edit['file_ID'];
    $edit_order_by = $db_edit['order_by'];



    $edit_cat = str_replace('_',' ',$edit_cat);
    $edit_cat = str_replace('–',',',$edit_cat);

    
?>

<html>
    <head>

        <title>Przykra sprawa - Panel administracyjny</title>
        <meta charset="utf-8" />

        <link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/przykra.css" />
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.js"></script>

        <link rel="icon" type="image/png" href="../img/favicon.png">

    </head>
    
    <body style='font-family:"Roboto Condensed", sans-serif;'>
        <h2 class="display-5 text-center text-danger" style="margin-top:5vh">Przykra Sprawa</h2>
        <p><img src="../images/8x.png" class="mx-auto d-block im5" alt="Logo"></p> 
        <h3 class="display-6 text-center text-danger">Panel administracyjny - edycja</h3>     

    <form id="form1" action="edit_element.php" method="POST" enctype="multipart/form-data">
        <section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">                
                    <div class="col-md-12">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="container">
                                    <div class="form-group row">
                                        <div class="col-1">
                                            <label for="name">ID:</label>
                                            <input class="form-control" name="ID" id="ID" type="text" readonly="" value="<?php echo $edit_ID; ?>">
                                        </div>
                                        <div class="col-4">
                                            <label for="description">Nazwa:</label>
                                            <input class="form-control" autocomplete="off" id="name" name="name" type="text" value="<?php echo $edit_name; ?>">
                                        </div> 
                                        <div class="col-7">
                                            <label for="description">Opis:</label>
                                            <input class="form-control" autocomplete="off" id="description" name="description" type="text" value="<?php echo $edit_desc; ?>">
                                        </div>                                   
                                    </div>
                                    <div class="form-group row">  
                                        <div class="col-lg-4">
                                            <label for="author">Kategoria:</label>
                                            <div class="input-group">
                                                <input type="text" id="category" autocomplete="off" list="exampleList" name="category" class="form-control" aria-label="Text input with dropdown button" value="<?php echo $edit_cat; ?>">
                                            </div>
                                        </div>


                                        <div class="col-4">
                                            <label for="author">Autor:</label>
                                            <input class="form-control" id="author" name="author" type="text" value="<?php echo $edit_author; ?>">
                                        </div>
                                        <div class="col-4">
                                            <label for="source">Źródło:</label>
                                            <input class="form-control" id="source" name="source" type="text" value="<?php echo $edit_source; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row">  
                                        <div class="col-lg-4">
                                            <label for="audioID">Audio ID:</label>
                                            <div class="input-group">
                                                <input type="text" id="audioID" name="audioID" autocomplete="off" class="form-control" aria-label="Text input with dropdown button" value="<?php echo $edit_fileID; ?>">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="author">Nazwa pliku:</label>
                                            <input class="form-control" id="filename" name="filename" type="text" value="<?php echo $edit_file_name; ?>">
                                        </div>
                                        <div class="col-4">
                                            <label for="source">Kolejność:</label>
                                            <input class="form-control" id="order_by" name="order_by" type="text" value="<?php echo $edit_order_by ; ?>">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <a href="admin.php" id="back" name="back" class="btn btn-primary">Cofnij</a>
                                        <button type="submit" id="editdata" name="editdata" class="btn btn-success" formaction="edit_element.php">Wyślij</button> 
                                        <div class="text-left">
                                        <button type="submit" id="deletedata" name="deletedata" class="btn btn-danger" formaction="delete_element.php">USUŃ</button>                         
                                    </div>                         
                                    </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        </section>
    </form>

 <script type="text/javascript">
  function submitForm(action) {
    var form = document.getElementById('form1');
    form.action = action;
    form.submit();
  }
</script>


    </body>


</html>