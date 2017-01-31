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

<?php
if(isset($_POST['titre_formation'])){ // On vérife si on a creer une nouvelle compétence
    if($_POST['titre_formation']!= '' && $_POST['date_formation']!= '' && $_POST['description_formation']!= ''){//si formation n'est pas vide
     $titre_formation = addslashes($_POST['titre_formation']);
     $date_formation = addslashes($_POST['date_formation']);
     $description_formation = addslashes($_POST['description_formation']);
    
    $pdoCV->exec(" INSERT INTO formations VALUES (NULL, '$titre_formation', '$date_formation', '$description_formation') ");
        header("location:../admin/formation.php");
        exit();
    }
}

if(isset($_GET['id_formation'])){
    $sql = 'DELETE FROM formations WHERE id_formation = "' . $_GET['id_formation'] . '"';
    $resultat = $pdoCV -> query($sql);
    header('Location: formation.php');
}
?>

<html lang="fr">
	<head> 
	    <?php 
	      $sql = $pdoCV->query("SELECT * FROM formations");
	      $resultat = $sql->fetch();
	   	?>
	   	<meta charset="UTF-8" />
	    <title>Formations CV web <?php echo $resultat['prenom'] .' ' . $resultat['nom']; ?></title>
	    <!-- Custom Fonts -->
		<link href="../cssfrontbootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   		<link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<!-- Mon Style CSS -->
	    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
  	</head>

 	<body> 
    	<header>
      	<h1>Page des Formations</h1>
        
        <?php include 'navAdmin.php'; ?>
      	</header>
       
      	<section>   
		    <?php 
		    $sql = $pdoCV -> query("SELECT * FROM formations");
		    $sql -> execute();
		    $nbr_formations = $sql -> rowCount(); ?>
    
      		<p>Il y a <?php echo $nbr_formations; ?> formation(s) dans votre BDD.</p>
		        <form method="POST">   
		       		<table>
			       		<thead>
			       			<th colspan="2">Insérer une nouvelle formation :</th>
			       		</thead>
			       		<tbody>
			       			<tr>
				              	<td>Titre</td> 
				                <td><input type="text" name="titre_formation" size="50" required /></td>
			            	</tr>
	 
				            <tr>
				                <td>Date</td> 
				                <td><input type="text" name="date_formation" size="50" required /></td>                          
				            </tr>

				            <tr>
				                <td>Description</td> 
				                <td>
					              	<textarea name="description_formation" cols="50" rows="10" required />Votre description...</textarea>
				              	</td>
				            </tr>
			           
				            <tr>
			   				    <td colspan="2"><input type="submit" value="Valider" /></td>
					        </tr>
				        </tbody>
	   			    </table>
	        	</form>

		        <p>Liste des formations<p>
		        <table>
		          <thead>
		            <th>Titre</th>
		            <th>Date</th>
		            <th>Description</th>
		            <th>Modification</th>
		            <th>Suppression</th>
		          </thead>                                 
		            
		            <?php while($resultat = $sql->fetch(PDO::FETCH_ASSOC)){ ?>
		          <tr>
		            <td><?php echo $resultat['titre_formation']; ?></td>                                
		            <td><?php echo $resultat['date_formation']; ?></td>                
		            <td><?php echo $resultat['description_formation']; ?></td>                               
		            <td><a href="modif_formation.php?id_formation=<?= $resultat['id_formation']; ?>"><i class="fa fa-pencil-square-o fa2"></i></a></td> 
		            <td><a href="formation.php?id_formation=<?= $resultat['id_formation']; ?>"><i class="fa fa-trash-o"></i></a></td>
		          </tr>
		       			
		            <?php }; ?>
		        </table>
      </section>

     <footer>
         <!-- faire le include du footer -->
     </footer>
	</body>
</html>