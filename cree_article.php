<?php 
session_start();	
	$host = 'localhost';
    $user = 'root';
    $password = ''; //To be completed if you have set a password to root
    $database = 'projet'; //To be completed to connect to a database. The database must exist.

    $db_handle = mysqli_connect($host, $user, $password);
    $db_found = mysqli_select_db($db_handle, $database);

    if (!$db_found) { die('Database not found'); }


	
	$vendeur=$_SESSION['sID'];
	$nom = isset($_POST["nom"])? $_POST["nom"]:"";
	$description = isset($_POST["description"])? $_POST["description"]:"";
	$prixstring = isset($_POST["prix"])? $_POST["prix"]:"";
	$prix=(int)$prixstring;
	$video ="sans";
	$type_achat = "";
	if (isset($_POST['pay']))
	{
		if ($_POST['pay'] == 'Ad'){
			$type_achat = 0;
		}
		else if ($_POST['pay'] == 'Mo'){
			$type_achat = 1;
		}
		else if ($_POST['pay'] == 'En'){
			$type_achat = 2;
		}
		else if ($_POST['pay'] == 'Ad_En'){
			$type_achat = 3;
		}
		else if ($_POST['pay'] == 'Ad_Mo'){
			$type_achat = 4;
		}
		
	}
	$categorie = "";
	if (isset($_POST['cat']))
	{
		if ($_POST['cat'] == 'FetT'){
			$categorie = 0;
		}
		else if ($_POST['cat'] == 'BpM'){
			$categorie = 1;
		}
		else if ($_POST['cat'] == 'VIP'){
			$categorie = 2;
		}
		
	}
	
	
	//////////////////////////////////////////////////////////////photo///////////////////////////////////
 $photo="";
 // Count total files
 $countfiles = count($_FILES['PhotoUpload']['name']);
 
 // Looping all files
 for($i=0;$i<$countfiles;$i++){
   $filename = $_FILES['PhotoUpload']['name'][$i];
   $photo=$photo."%http://localhost/photo_articles/".$filename;
   
   // Upload file
   move_uploaded_file($_FILES['PhotoUpload']['tmp_name'][$i],'photo_articles/'.$filename);
    
 }echo $photo;
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////////video///////////////////////////////////
 // Count total files
 $countfiles2 = count($_FILES['VideoUpload']['name']);
 
 // Looping all files
 for($i2=0;$i2<$countfiles2;$i2++){
   $filename2 = $_FILES['VideoUpload']['name'][$i2];
   $video"=http://localhost/video_articles/".$filename2;
   
   // Upload file
   move_uploaded_file($_FILES['VideoUpload']['tmp_name'][$i],'video_articles/'.$filename2);
    
 }echo $photo;
	//////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	$req="INSERT INTO marche( nom, description, categorie, prix, photo,video,type_achat,vendeur)VALUES('$nom', '$description', $categorie, $prix, '$photo', '$video', $type_achat,'$vendeur')";
	if (mysqli_query($db_handle, $req)) {
               echo "New record created successfully";
            } else {
               echo "Error: " . $req . "" . mysqli_error($db_handle);
            }
	/////////////////////////////////////////////////////////////////////////////////////////////////////
	
	


?>
