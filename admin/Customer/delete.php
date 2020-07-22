<?php
	$serveur ="localhost";
	$dbname = "demo";
	$user = "root";
	$pass = "";
	
    $id = $_GET["id"];
    $username = $_GET["username"];
	
	try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$del = $dbco->prepare("
			DELETE FROM t_client WHERE id=".$id);
		$del->execute();
        header("Location: client.php?username=".$username);
        exit;
	}
	catch(PDOException $e) {
		echo 'Une erreur est arrivées. Erreur : '.$e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
 
<body>

<br />
<div class="container">
     

<br />
<div class="span10 offset1">

<br />
<div class="row">

<br />
<h3>Delete a user</h3>
<p>

</div>
<p>

                     
<br />
<form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      
Are you sure to delete ?

<br />
<div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="client.php">No</a>
</div>
<p>

                    </form>
<p>
</div>
<p>

                 
</div>
<p>
<!-- /container -->
  </body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>
 
<body>

<br />
<div class="container">
     

<br />
<div class="span10 offset1">

<br />
<div class="row">

<br />
<h3>Delete a user</h3>
<p>

</div>
<p>

                     
<br />
<form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      
Are you sure to delete ?

<br />
<div class="form-actions">
                          <button type="submit" class="btn btn-danger">Yes</button>
                          <a class="btn" href="client.php">No</a>
</div>
<p>

                    </form>
<p>
</div>
<p>

                 
</div>
<p>
<!-- /container -->
  </body>
</html>