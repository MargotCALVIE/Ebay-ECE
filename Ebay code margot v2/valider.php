
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <title> Ebay ECE </title>
    <link href="panier.css" rel="stylesheet" type="text/css"/>
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
                <ul>
                <li> <a href="categories.html"> Catégories </a></li>
                <li> <a href="achat.html"> Achat </a></li>
                <li> <a href="vendre.html"> Vendre </a></li>
                <li> <a href="login.html"> Votre Compte </a></li>
                <li> <a href="panier.php" class="panier"> Panier </a></li>
                <li> <a href="admin.html"> Admin </a></li>
                </ul>
            </nav>
            
        </header>
      <section>
        <?php 
session_start();
$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);
	
	$numero=$_POST['numero'];
	$secu=$_POST['secu'];
    if (!$db_found) { die('Database not found'); }
	$req="SELECT * FROM compte WHERE ID = " . $_SESSION['sID'] . ";";
	$result=mysqli_query($db_handle, $req);
	if (!$result)
	{
		echo 'Couldn\'t find table';
		return;
	}
	$info = $result->fetch_assoc();
	
	$req_p="SELECT * FROM marche WHERE ID = " . $info['item'] . ";";
	$res_p=mysqli_query($db_handle, $req_p);
	if (!$res_p)
	{
		echo 'Couldn\'t find table 2';
		return;
	}
	$info_p = $res_p->fetch_assoc();
	
	$req_b="SELECT * FROM banque WHERE numero_carte = " . $info['numero_carte'] . ";";
	$res_b=mysqli_query($db_handle, $req_b);
	if (!$res_b)
	{
		echo 'Couldn\'t find table 3';
		return;
	}
	$info_b = $res_b->fetch_assoc();
	$fond_carte=$info_b['tresorie'];
	$fond_nescesaire=$info_p['prix'];
	$secu_carte=$info_b['securite'];
	if(($fond_carte>=$fond_nescesaire)&&($secu==$secu_carte))
	{	///suppr le fond
		$fond_restant=(int)$fond_carte - (int)$fond_nescesaire;
		$req="UPDATE banque SET tresorie=".$fond_restant. " WHERE numero_carte =" . $numero . ";";
	
		$result=mysqli_query($db_handle, $req);
		if (!$result)
		{
			echo 'Couldn\'t find table4';
			return;
		}
		///suppr l'article de la liste du vendeur
		$req2="UPDATE compte SET item=NULL WHERE ID =" . $info_p['vendeur'] . ";";
		$result2=mysqli_query($db_handle, $req2);
		if (!$result2)
		{
			echo 'Couldn\'t find table 5';
			return;
		}
		///suppr l'article du panier
		$req2="UPDATE compte SET item=NULL WHERE ID =" . $_SESSION['sID'] . ";";
		$result2=mysqli_query($db_handle, $req2);
		if (!$result2)
		{
			echo 'Couldn\'t find table 6';
			return;
		}
		///suppr du marche
		$req3="DELETE FROM marche WHERE ID=".$info_p['ID'];
		$result3=mysqli_query($db_handle, $req3);
		if (!$result3)
		{
			echo 'Couldn\'t find table 7';
			return;
		}
	}
	else{
		echo "fond insuffisant";
	}
?>
      </section>
        
        <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>
