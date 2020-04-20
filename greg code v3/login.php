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
	<title>login</title>
	<meta charset="utf-8"/>
	<link href="http://localhost/ebayece.css" rel="stylesheet" type="text/css"/>
	<style>
		body{
		background-image:url(<?php echo $info['imagefond']?>);
		}
	</style>
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
                <li> <a href="http://localhost/panier.php"> Panier </a></li>
                <li> <a href="http://localhost/admin.html"> Admin </a></li>
                </ul>
            </nav>      
        </header>
<h2 id="titre_principal">login</h2>
<div id="log">
<table id="log">
	<tr>
		<td><img src=<?php echo $info['photoprofil']?> height="200"/></td>
		<td>pseudo :</td>
		<td><?php echo $info['prenom']."	".$info['nom']?></td>
	</tr>
</table>
<?php
if($info['type']=!0)
{	$split=preg_split('/\;/',$info['item']);
	$countitem = count($split);
	for($i=0;$i<$countitem-1;$i++){
		$req_c="SELECT * FROM marche WHERE ID = ".$split[$i] ."";
		//echo $req_c;
		$res_c=mysqli_query($db_handle, $req_c);
		if (!$res_c)
		{
			echo 'Couldn\'t find table';
			return;
		}
		$info_c = $res_c->fetch_assoc();


		if($info_c['type_achat']==1)//nego
		{//afficher le prix proposer
		echo $info_c['prix']."euro";
?>
<form action="http://localhost/accepter_negociation.php?id=<?php echo $info_c['ID']?>" method="post">
	<input type="submit" value="Accepter la negociation" />
</form>
<?php
		}
		if($info_c['type_achat']==2)//enchère
		{//afficher le prix actuel
		$req_e="SELECT * FROM enchere WHERE ID = ".$info_c['enchere'] ."";
		//echo $req_e;
		$res_e=mysqli_query($db_handle, $req_e);
		if (!$res_e)
		{
			echo 'Couldn\'t find table';
			return;
		}
		$info_e = $res_e->fetch_assoc();
		echo $info_e['prix_actuel']."euro";
?>
<form action="http://localhost/accepter_enchere.php?id=<?php echo $info_c['enchere']?>" method="post">
	<input type="submit" value="Accepter l'enchere" />
</form>
<?php
		}
	}
}
?>
</div>

		<footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>