<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8"/>
    <title> Ebay ECE </title>
    <link href="admin.css" rel="stylesheet" type="text/css"/>
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
                <li> <a href="categories.html"> Catégories </a></li>
                <li> <a href="achat.html"> Achat </a></li>
                <li> <a href="vendre.html"> Vendre </a></li>
                <li> <a href="login.html"> Votre Compte </a></li>
                <li> <a href="panier.php"> Panier </a></li>
                <li> <a href="admin.php" class="admin"> Admin </a></li>
                </ul>
            </nav>      
        </header>
        <section>

            <h2 class="TitreAdmin"> Admin : </h2>

            <form action=Ajouter_admin.php method="post">
                <table>
                    <tr>
                        <td>
                            <input AjouterV type="submit" name="AjouterV" value="Ajouter un vendeur" >
                          
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="SupV" value="Supprimer un vendeur" >
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="AjouterI" value="Ajouter un item" >
                           
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input " type="submit" name="SupI" value="Supprimer un item" >
                         
                        </td>
                    </tr>
                </table>
            </form>

        </section>
        
      
        
        <footer>
            <p> Copyright &copy; 2020 EbayECE. All rights reserved </p>
        </footer>   
    </div>  
</body>
</html>
