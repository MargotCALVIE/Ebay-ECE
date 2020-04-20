<?php 
session_start();	
	$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) { die('Database not found'); }
	$nvprix=$_POST['nvprix'];
	$id=$_GET['id'];
	$nvprixe=(int)$nvprix;
	$req_e="SELECT * FROM enchere WHERE ID = ".$id;
	echo "requete 1".$req_e;
	$res_e=mysqli_query($db_handle, $req_e);
	if (!$res_e)
	{
		echo 'Couldn\'t find table';
		return;
	}
	$info_e = $res_e->fetch_assoc();
	$prix_actuel=$info_e['prix_actuel'];
	echo $nvprixe .">".$prix_actuel;
	if($nvprixe>$prix_actuel){
		$req="UPDATE enchere SET prix_actuel=".$nvprixe. " WHERE ID =" . $id . ";";
		echo "requete 2".$req;
		$result=mysqli_query($db_handle, $req);
		if (!$result)
		{
			echo 'Couldn\'t find table2';
			return;
		}
		$req_m="UPDATE marche SET prix=".$nvprixe. " WHERE enchere =" . $id . ";";
		echo "requete 3".$req_m;
		$res_m=mysqli_query($db_handle, $req_m);
		if (!$res_m)
		{
			echo 'Couldn\'t find table3';
			return;
		}
	}
	else{
		echo "valeur en dessous du prix actuel";
	}
	header('Location: http://localhost/Homepage.html');
  exit();
	
?>