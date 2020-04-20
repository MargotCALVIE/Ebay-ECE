

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
                <li> <a href="login.html"> Votre Compte </a></li>
                <li> <a href="panier.php"> Panier </a></li>
                <li> <a href="admin.php"> Admin </a></li>
                </ul>
            </nav>      
        </header>
        
        <section>

<?php

session_start(); 

if ($_POST["envoie"])
{

        if($_POST['select_box_categories']=="Choix1")
        {
                echo '<p class="titreCategorie"> Catégorie : FERRAILLE OU TRESOR </p>';
                $_SESSION['categorie'] = 1;
                
        }
        if($_POST['select_box_categories']=="Choix2")
        {
                echo '<p class="titreCategorie"> Catégorie : BON POUR LE MUSEE </p>';
                $_SESSION['categorie'] = 2;
                
        }
        if($_POST['select_box_categories']=="Choix3")
        {
                echo '<p class="titreCategorie"> Catégorie : ACCESSOIRE VIP  </p>';
                $_SESSION['categorie'] = 3;
              
        }
   
}

?>
        
        <div class="ChoixVente">
                <form action="categoriesVente.php" method="post">
                    <table>
                        <tr>
                            <td> Choisir votre type de vente : </td>
                            <td> <select name="select_box_vente">
                            <option> ...Choisir ... </option>
                            <option value="directe"> Vente directe </option>
                            <option value="encheres"> Vente par encheres </option>
                            <option value="negociation"> Vente par negociation </option>
                            </select> </td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="ValiderVente" value="Valider"></td>
                        </tr>
                    </table>
                </form>
        </div>
         
                  

   
         </section>
        
        
        <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>
