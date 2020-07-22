<?php
	$id = $_GET['id'];
?>

<?php 
		$bdd = new PDO('mysql:host=localhost;dbname=demo;charset=utf8', 'root', '');
		$articles = $bdd->query("select * from t_bonlivraison WHERE bl_id='$id'");
		foreach ($articles as $article): 
?>
<html>

<head>
	<meta charset="utf-8">
	<title>Connexion - Fraicheur de Bourbon</title>
	<link rel="stylesheet" href="style.css" media="screen" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<?php echo $article['bl_id']; ?>
<?php echo $article['bl_commercial']; ?>
<?php echo $article['bl_client']; ?>
<?php echo $article['bl_date']; ?>
<?php echo $article['bl_produit']; ?>
<?php echo $article['bl_quantite']; ?>
<?php endforeach ?>