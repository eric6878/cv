
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

<!-- MISE A JOUR D'UNE COMPETENCE -->

<?php 

//mise à jour

if(isset($_POST['competence'])){
	$competence = addslashes($_POST['competence']);
	$id_competence = addslashes($_POST['id_competence']);
	$pdoCV -> exec(" UPDATE competences SET competence = '$competence' WHERE id_competence = '$id_competence' ");

	header("location: competence.php");
		exit();
}
//récupération
	$id_competence = $_GET['id_competence'];
	$sql = $pdoCV -> query("SELECT * FROM competences WHERE id_competence = '$id_competence' ");
	$ligne_competence = $sql -> fetch(); 

/* 	$sql = $pdoCV->query("SELECT * FROM utilisateurs");
	$resultat = $sql->fetch();*/
?>
   
<html lang="fr"><!--  -->
    <head>  
   	<meta charset="UTF-8" />
    <title>Modifier compétence CV web <?php /*echo $resultat['prenom'] . ' ' . $resultat['nom'];*/ ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>

    <body>
        <header id="headerXp">
        	<h1>Compétences : page de modification</h1>
        </header>
         
        <section>

        <form type="submit" action="modif_competence.php" method="POST">
        	<label>Compétence sélectionnée :</label>
   			<input type="text" name="competence" value="<?= $ligne_competence['competence']; ?>" />
   			<input hidden name="id_competence" value="<?= $ligne_competence['id_competence']; ?>" /> 			
   			<input type="submit" value="Mise à jour" />
        </form>
          
        <!-- include("admin_menu.php"); --> 

        </section>

       <footer id="footerXp">
           <!-- faire le include du footer -->
       </footer>
	</body>
</html>

