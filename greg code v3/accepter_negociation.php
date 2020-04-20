<?php 
session_start();
$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) { die('Database not found'); }
	$id=$_GET['id'];
	//changer dans compte item
	$req_ma="SELECT * FROM marche WHERE ID=".$id;
	$res_ma=mysqli_query($db_handle, $req_ma);
	if (!$res_ma)
	{
		echo 'Couldn\'t find table 2';
		return;
	}
	$info_m=$res_ma->fetch_assoc();
	$req_c="SELECT * FROM compte WHERE ID=".$info_m['vendeur'];
	$res_c=mysqli_query($db_handle, $req_c);
	if (!$res_ma)
	{
		echo 'Couldn\'t find table 2.5';
		return;
	}
	$info_c=$res_c->fetch_assoc();
	$split=preg_split('/\;/',$info_c['item']);
	$countitem=count($split);
	$item="";
	for($i=0;$i<$countitem-1;$i++){
		if($split[$i]!=$info_m['ID'])
		{
			$item=$item.$split[$i].";";
		}
	}
	$req_ma="UPDATE compte SET item='".$item."' WHERE ID=".$info_c['ID'];
	echo $req_ma;
	$res_ma=mysqli_query($db_handle, $req_ma);
	if (!$res_ma)
	{
		echo 'Couldn\'t find table 3';
		return;
	}
	//supprimer de marche
	$req_m="DELETE FROM marche WHERE enchere =".$id;
	$res_m=mysqli_query($db_handle, $req_m);
	if (!$res_m)
	{
		echo 'Couldn\'t find table 3';
		return;
	}
	header('Location: http://localhost/Homepage.html');
  exit();
	
?>