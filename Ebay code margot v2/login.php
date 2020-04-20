<?php
session_start();	
	$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) { die('Database not found'); }
	$pseudo = isset($_GET["pseudo"])? $_GET["pseudo"]:"";
	$mail = isset($_GET["mail"])? $_GET["mail"]:"";
	$req="SELECT * FROM compte WHERE pseudo = '" . $pseudo . "' AND mail = '" . $mail . "';";
	$result=mysqli_query($db_handle, $req);
	if (!$result)
	{
		echo 'Couldn\'t find table';
		return;
	}
	$info = $result->fetch_assoc();
	$_SESSION['sID']= $info['ID'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Votre Compte</title>
	<meta charset="utf-8"/>
	<link href="login.css" rel="stylesheet" type="text/css"/>
	<style>

	</style>
</head>
<body>
    <div id="main_wrapper">
<!-- Balise qui englobe tout le contenu permettant de fixer les dimensions de la page -->
        <header>
            <div id="titre_principal">
                <h1> EBAY ECE</h1>
                <div id="logo">
                 <img src="logoEbayECE.jpg" alt="Ebay ECE"  />
                </div>
            </div>
            <nav>
                <ul class="menu">
                <li> <a href="categories.html"> Catégories </a></li>
                <li> <a href="achat.html"> Achat </a></li>
                <li> <a href="vendre.html"> Vendre </a></li>
                <li> <a href="login.html"class="login"> Votre Compte </a></li>
                <li> <a href="panier.php"> Panier </a></li>
                <li> <a href="admin.php"> Admin </a></li>
                </ul>
            </nav>      
        </header>
<h2 class="TitreCompte">Votre Compte</h2>
<div id="log">
<table >
	<tr>
    <td><img src=<?php echo $info['photoprofil']?> height="200"/></td>	
	</tr>
	<tr>
	<td>Prenom :</td>
	<td><?php echo $info['prenom'] ?></td><br>
	</tr>
	<tr>
		<td> Nom :</td>
		<td><?php echo $info['nom']?></td><br>
	</tr>
     <tr>
		<td> Email :</td>
		<td><?php echo $info['mail'] ?></td>
	</tr>
	<tr>                
</td>
</tr>
</table>
</div>

		<footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>