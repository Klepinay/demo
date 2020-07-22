<?php
    $username = $_GET['username'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Back - Office</title>
        <link rel="stylesheet" href="\Demo\style.css" type="text/css">
        <link rel="stylesheet" href="\Demo\css\bootstrap.css" type="text/css">
    </head>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">            
                <ul  class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="\Demo\Admin\backOffice.php?username=<?php echo $username ?>">Tableau de Bord</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Customer\client.php?username=<?php echo $username ?>">Clients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Devis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Commande</a>
                    </li>
                </ul> 
                <a href="\Demo\index.php?deconnection=true&username=<?php echo $username ?>" class="btn btn-danger"> Déconnection</a>  
                <div id="content">
                    <?php
                    session_start();
                    if(isset($_GET['deconnexion']))
                    { 
                    if($_GET['deconnexion']==true)
                    {  
                        session_unset();
                        header("location:index.php");
                    }
                    }
                    else if($_SESSION['username'] !== ""){
                        $user = $_SESSION['username'];
                    }
                    ?> 
                </div>                   
            </div>
        </nav>
    <div class="container">
        <div class="info">

        </div>
    </div>
    </body>
</html>