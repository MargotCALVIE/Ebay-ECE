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
	echo $req;
	$result=mysqli_query($db_handle, $req);
	if (!$result)
	{
		echo 'Couldn\'t find table';
		return;
	}
	$info = $result->fetch_assoc();
	echo " ID: " . $info['ID'];
	$_SESSION['sID']= $info['ID'];
?>
<html>
<head>
<title>cree artcile</title>
<meta charset="utf-8">
</head>
<body>
<h2>cree artcile</h2>
<form action="http://localhost/cree_article.php" method="post" enctype="multipart/form-data">
<table>
	<tr>
		<td>Nom :</td>
		<td><input type="text" name="nom" id="nom" required></td>
	</tr>
	<tr>
		<td>description :</td>
		<td><input type="text" name="description" id="description" required></td>
	</tr>
	<tr>
		<td>prix:</td>
		<td><input type="text" name="prix" id="prix" required></td>
	</tr>
	<tr>
		<td>Categorie :</td>
		<td>
			<input type="radio" value="FetT" name="cat">
			<label for="FetT">Ferraille & trésor</label><br>
			<input type="radio" value="BpM" name="cat">
			<label for="BpM">Bon pour le marché</label><br>
			<input type="radio" value="VIP" name="cat">
			<label for="VIP">Accessoir VIP</label>
		</td>
	</tr>
	<tr>
		<td>Methode de payement :</td>
		<td>
			<input type="radio" value="En" name="pay">
			<label for="En">Enchères</label><br>
			<input type="radio" value="Mo" name="pay">
			<label for="Mo">meilleur offre</label><br>
			<input type="radio" value="Ad" name="pay">
			<label for="Ad">Achat direct</label><br>
			<input type="radio" value="Ad_En" name="pay">
			<label for="Ad_En">Achat direct et enchères</label><br>
			<input type="radio" value="Ad_Mo" name="pay">
			<label for="Ad_Mo">Achat direct et meilleur offre</label>
		</td>
	</tr>
	<tr>
		<td>Photo :</td>
		<td>
			<input type="file" name="PhotoUpload[]" id="PhotoUpload" multiple  accept=".png, .jpeg , .jpg, .gif"><br>
		</td>
	</tr>
	<tr>
		<td>Video :</td>
		<td>
			<input type="file" name="VideoUpload" id="VideoUpload" accept=".mp4">
		</td>
	</tr>
</table>
	<button type="submit" name="submit">Cree</button>
</form>
</body>
</html>