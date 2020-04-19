<?php 
session_start();
?>
<html>
<head>
	<title>Cree un compte</title>
	<meta charset="utf-8">
	<link href="ebayece.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="main_wrapper">
<!-- Balise qui englobe tout le contenu permettant de fixer les dimensions de la page -->
        <header>
            <div id="titre_principal">
                <h1> EBAY ECE</h1>
                <div id="logo">
                 <img src="http://localhost/logoEbayECE.jpg" alt="Ebay ECE"  />
                </div>
            </div>
            <nav>
                <ul>
                <li> <a href="http://localhost/categories.html"> Catégories </a></li>
                <li> <a href="http://localhost/achat.html"> Achat </a></li>
                <li> <a href="http://localhost/vendre.html"> Vendre </a></li>
                <li> <a href="http://localhost/login.html"class="login"> Votre Compte </a></li>
                <li> <a href="http://localhost/panier.html"> Panier </a></li>
                <li> <a href="http://localhost/admin.html"> Admin </a></li>
                </ul>
            </nav>      
        </header>
<h2>test BDD</h2>
<form action="http://localhost/cree_compte2.php" method="post"  enctype="multipart/form-data">
<table id="log">
	<tr>
		<td>Nom :</td>
		<td><input type="text" name="nom" id="nom" required></td>
	</tr>
	<tr>
		<td>Prenom :</td>
		<td><input type="text" name="prenom" id="prenom" required></td>
	</tr>
	<tr>
		<td>Pseudo :</td>
		<td><input type="text" name="pseudo" id="pseudo" required></td>
	</tr>
	<tr>
		<td>Mail :</td>
		<td><input type="text" name="mail" id="mail" required></td>
	</tr>
	<tr>
		<td>Photo de profil :</td>
		<td><input type="file" name="photoprofil" id="photoprofil" required></td>
	</tr>
	<tr>
		<td>Image de fond :</td>
		<td><input type="file" name="imagefond" id="imagefond" required></td>
	</tr>
	<tr>
		<td></td>
		<td><button type="submit" name="cree" >Cree</button></td>
	</tr>
</table>
</form>
</div>
</body>
</html>