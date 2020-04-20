<?php 
session_start();
$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) { die('Database not found'); }
	///supprimer l'encher/le marche/item de compte du vendeur
	///enchere
	$id=$_GET['id'];
	$req="DELETE FROM enchere WHERE `ID` =".$id;
	$res=mysqli_query($db_handle, $req);
	if (!$res)
	{
		echo 'Couldn\'t find table';
		return;
	}
	
	$req_ma="SELECT * FROM marche WHERE enchere=".$id;
	$res_ma=mysqli_query($db_handle, $req_ma);
	if (!$res_i)
	{
		echo 'Couldn\'t find table 2';
		return;
	}
	$info=$res_ma->fetch_assoc();
	$split=preg_split($info['item'])
	echo "avant :".$split;
	$countitem=count($split);
	$item="";
	for($i=0;$i<$countitem-1;$i++){
		if(split[$i]!=$info['id'])
		{
			$item=$item.";".$split[$i];
		}
	}
	echo "apres :".$split;
	$req_ma="UPDATE marche SET item=".$item." WHERE enchere=".$id;
	$res_ma=mysqli_query($db_handle, $req_ma);
	if (!$res_i)
	{
		echo 'Couldn\'t find table 2';
		return;
	}
	
	$req_m="DELETE FROM marche WHERE enchere =".$id;
	$res_m=mysqli_query($db_handle, $req_m);
	if (!$res_m)
	{
		echo 'Couldn\'t find table 3';
		return;
	}
?>