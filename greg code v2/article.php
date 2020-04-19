<?php 
session_start();	
	$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) { die('Database not found'); }
	$id=$_GET['var2'];
	
	$req="SELECT * FROM marche WHERE ID =" . $id . ";";
	
	$result=mysqli_query($db_handle, $req);
	if (!$result)
	{
		echo 'Couldn\'t find table';
		return;
	}
	$info = $result->fetch_assoc();
	
	$res_photo=preg_split('/\%/',$info["photo"]);
	
	$req2="SELECT * FROM compte WHERE ID =" . $_SESSION['sID'] . ";";
	$res_c=mysqli_query($db_handle, $req2);
	if (!$res_c)
	{
		echo 'Couldn\'t find table';
		return;
	}
	$compte = $res_c->fetch_assoc();
	

?>
<html>
<head>
	<title>Acheter <?php echo $info['nom']  ?></title>
	<meta charset="utf-8">
    <link href="http://localhost/categories.css" rel="stylesheet" type="text/css"/>
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
                <ul class="menu">
                <li> <a href="http://localhost/categories.html"> Cat√©gories </a></li>
                <li> <a href="http://localhost/achat.html"> Achat </a></li>
                <li> <a href="http://localhost/vendre.html"> Vendre </a></li>
                <li> <a href="http://localhost/login.html"> Votre Compte </a></li>
                <li> <a href="http://localhost/panier.php"> Panier </a></li>
                <li> <a href="http://localhost/admin.html"> Admin </a></li>
                </ul>
            </nav>      
        </header>
        
        <section>
<table>
	<tr>
		<?php
		$countphoto = count($res_photo);
		for($i=1;$i<$countphoto;$i++){
		?>
		<td><img src= <?php echo($res_photo[$i]);?> height="400"></td>
		<?php
		}
		?>
		
	</tr>
	<tr>
		<td><?php echo $info["description"]?></td>
		<td>
		<p>Le prix est de: <?php echo $info["prix"]?>euros </p>
		</td>
		<td><a href="http://localhost/login.php?pseudo=<?php echo($compte['pseudo'] . "&mail=" . $compte['mail']) ?>">Vendeur <?php echo $compte['prenom'].$compte['nom']?></a>
		</td>
	</tr>
	<?php
		if($info["video"]!="sans"){
	?>
	<tr>
		<td>
			<video controls src=<?php echo $info["video"]?>>
		</td>
	</tr>
	<?php
		}
	?>
</table>
<?php
if($_SESSION['sID']!=NULL){
	if($info['type_achat']==0)//direct
	{
?>
<form action="http://localhost/ajouter_direct.php?id=<?php echo($info['ID'])?>" method="post">
<input type="submit" id="direct "value="Acheter" />
</form>
<?php
	}
	if($info['type_achat']==1)//nego
	{
?>
<form action="http://localhost/ajouter_negocier.php" method="post">
	<input type="text" name="nvprix" id="nvprix" value="nouveau prix" required>
	<input type="submit" id="negocier" value="Negocier" />
</form>
<?php
	}
	if($info['type_achat']==2)//enchËre
	{
?>
<form action="http://localhost/ajouter_enchere.php" method="post">
	<input type="text" name="nvprix" id="nvprix" value="nouveau prix" required>
	<input type="submit" id="encherir" value="Encherir" />
</form>
<?php
	}
}else{
	echo"connectez en cliquant sur 'mon compte' vous pour pouvoir acheter";
}
?>
 </section>
        
        <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>
</body>
</html>