
<?php require '../connexion/connexion.php'; ?>

<?php

// pour se connecter :
session_start();

if(isset($_SESSION['connexion']) && $_SESSION['connexion'] == 'Vous êtes connecté !'){
  $id_utilisateur = $_SESSION['id_utilisateur'];
  $prenom = $_SESSION['prenom'];
  $nom = $_SESSION['nom'];
}
else{
  header('location: authentification.php');
}


// pour se deconnecter : 

if(isset($_GET['deconnexion'])){
  $_SESSION['connexion'] = '';
  $_SESSION['id_utilisateur'] = '';
  $_SESSION['prenom'] = '';
  $_SESSION['nom'] = '';

  unset($_SESSION['connexion']);
  session_destroy();
  header('location: ../index.php');
}

?>

<!-- MISE A JOUR D'UN CHAMP UTILISATEUR -->

<?php 

//mise à jour

if(isset($_POST['utilisateur'])){
	$id_utilisateur = $_POST['id_utilisateur'];
  $prenom_utilisateur = addslashes($_POST['prenom']);
  $nom_utilisateur = addslashes($_POST['nom']);
  $age_utilisateur = addslashes($_POST['age']);
  $adresse_utilisateur = addslashes($_POST['adresse']);
  $ville_utilisateur = addslashes($_POST['ville']);
  $telephone_utilisateur = addslashes($_POST['telephone']);
  $email_utilisateur = addslashes($_POST['email']);
	
	$pdoCV -> exec();

	header("location: utilisateur.php");
		exit();
}

//récupération
	$id_utilisateur = $_GET['id_utilisateur'];
	$sql = $pdoCV -> query("SELECT * FROM utilisateurs WHERE id_utilisateur = '$id_utilisateur' ");
	$resultat = $sql -> fetch(); 

?>
   
<html lang="fr"><!--  -->
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier utilisateur CV web <?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    </head>

    <body>
        <header>
        	<h1>Page de Modification Utilisateur</h1>

          <?php include 'navAdmin.php'; ?>
        </header>

        <?php echo $_GET['id_utilisateur']; ?>
         
        <section>
          <form action="updateUser.php" method="POST"><?php var_dump($resultat); ?>
            <table>
              
              <thead>
                <th colspan="7">Modification profil utilisateur :</th>
              </thead>
             
              <tbody>
                <tr>
                  <td></td>
                  <td>
                    <input type="text" name="utilisateur" value="<?php if (isset($_GET['id_utilisateur']) && !empty($_GET['id_utilisateur'])) { echo $_GET['id_utilisateur']; } ?>" />
                    <input type="hidden" value="<?= $resultat[0]['id_utilisateur']; ?>">
                  </td>
                </tr>
                
                <tr>
                  <td colspan="2">
                    <input type="submit" value="Mise à jour" />
                  </td>
                </tr>         
              </tbody>
           
            </table>
          </form>    
         
        </section>


       <footer id="footerXp">
           <!-- faire le include du footer -->
       </footer>
	</body>
</html>

