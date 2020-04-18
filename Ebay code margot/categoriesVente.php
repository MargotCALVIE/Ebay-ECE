

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8"/>
    <title> Categories Ebay ECE </title>
    <link href="categories.css" rel="stylesheet" type="text/css"/>
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
                <li> <a href="categories.html" class="Categorie"> Catégories </a></li>
                <li> <a href="achat.html"> Achat </a></li>
                <li> <a href="vendre.html"> Vendre </a></li>
                <li> <a href="votrecompte.html"> Votre Compte </a></li>
                <li> <a href="panier.html"> Panier </a></li>
                <li> <a href="admin.html"> Admin </a></li>
                </ul>
            </nav>      
        </header>
        
        <section>

 <?php

if ($_POST["ValiderVente"])
{
        if($_POST['select_box_vente']=="directe")
        {
                echo '<p class="titreVente"> Vente directe </p>'; 
        }
        if($_POST['select_box_vente']=="encheres")
        {
                echo '<p class="titreVente"> Vente par encheres </p>'; 
        }
        if($_POST['select_box_vente']=="negociation")
        {
                echo '<p class="titreVente"> Vente par negociation </p>'; 
        }
   
}

//identifier BDD
$database = "projet" ;

//connexion BDD
$db_handle= mysqli_connect('localhost', 'root', '') ;
$db_found= mysqli_select_db($db_handle, $database);

if($db_found)
{
 $sql = "SELECT photo FROM marche WHERE type_achat = '0'";
 $res = mysqli_query($db_handle, $sql);
 while ($data = mysqli_fetch_assoc($res)) {
 echo $data['prix'] ;
}
}
    

//fermer la connexion
mysqli_close($db_handle);

?>
         </section>
        
        
        <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>

