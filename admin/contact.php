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
if($_POST){ // On vérife si on a créer un nouveu contact
    if($_POST['nom_contact']!= '' && $_POST['prenom_contact']!= '' && $_POST['email_contact']!= '' && $_POST['telephone_contact']){//si contact n'est pas vide
     $nom_contact = addslashes($_POST['nom_contact']);
     $prenom_contact = addslashes($_POST['prenom_contact']);
     $email_contact = addslashes($_POST['email_contact']);
     $telephone_contact = addslashes($_POST['telephone_contact']);
    
    $pdoCV->exec(" INSERT INTO contacts VALUES (NULL, '$nom_contact', '$prenom_contact', '$email_contact', '$telephone_contact', '0') ");
        header("location: contact.php");
        exit();
    }
}

if(isset($_GET['id_contact'])){
    $sql = 'DELETE FROM contacts WHERE id_contact = "' . $_GET['id_contact'] . '"';
    $resultat = $pdoCV -> query($sql);
    header('Location: contact.php');
}
?>

<html lang="fr">
	<head> 
    <?php 
      $sql = $pdoCV->query("SELECT * FROM contacts");
      $resultat = $sql->fetch();
   	?>
   	<meta charset="UTF-8" />
    <title>Contact CV web <?php echo $resultat['prenom'] .' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
  	</head>

 	<body> 
    	<header>
      	<h1>Page Contacts</h1>
        
        <?php include 'navAdmin.php'; ?>
      	</header>
       
      	<section>   
		    <?php 
		    $sql = $pdoCV -> query("SELECT * FROM contacts");
		    $sql -> execute();
		    $nbr_contact = $sql -> rowCount(); ?>
    
      		<p>Il y a <?php echo $nbr_contact; ?> contact(s) dans votre BDD.</p>
		        <form action="" name="contact" method="POST">   
		       		<table>
		       			<tr>
			              	<td>Nom</td> 
			                <td><input type="text" name="nom_contact" size="50" required /></td>
		            	</tr>
 
			            <tr>
			                <td>Prénom</td> 
			                <td><input type="text" name="prenom_contact" size="50" required /></td>
			            </tr>

			            <tr>
			                <td>Email</td> 
			                <td>
				              	<input type="email" name="email_contact">
			              	</td>
		              	</tr>
		              	<tr>
			              	<td>Téléphone</td>
			              	<td>
				              	<input type="text" name="telephone_contact">
			              	</td>
			            </tr>
		           
			            <tr>
			            	<td></td>
		   				    <td><input type="submit" value="Insérer en BDD" /></td>
				        </tr>
	   			    </table>
	        	</form>

		        <p>Liste des Contacts<p>
		        <table>
		          <thead>
		            <th>Nom</th>
		            <th>Prénom</th>
		            <th>Email</th>
		            <th>Téléphone</th>
		          </thead>                                 
		            
		            <?php while($resultat = $sql->fetch(PDO::FETCH_ASSOC)){ ?>
		          <tr>
		            <td><?php echo $resultat['nom_contact']; ?></td>                                
		            <td><?php echo $resultat['prenom_contact']; ?></td>                
		            <td><?php echo $resultat['email_contact']; ?></td>                               
		            <td><?php echo $resultat['telephone_contact']; ?></td>                               
		            <td><a href="modif_contact.php?modifier_contact=<?= $resultat['id_contact']; ?>">Modifier</a></td> 
		            <td><a href="contact.php?supprimer_contact=<?= $resultat['id_contact']; ?>">Supprimer</a></td>
		          </tr>
		       			
		            <?php };?>
		        </table>
      </section>

     <footer>
         <!-- faire le include du footer -->
     </footer>
	</body>
</html>