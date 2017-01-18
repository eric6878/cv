<?php require '../connexion/connexion.php'; ?>

<?php
if(isset($_POST['titre_formation'])){ // On vérife si on a creer une nouvelle compétence
    if($_POST['titre_formation']!= '' && $_POST['sous_titre_formation']!= ''  && $_POST['date_formation']!= '' && $_POST['description_formation']!= ''){//si formation n'est pas vide
     $titre_formation = addslashes($_POST['titre_formation']);
     $sous_titre_formation = addslashes($_POST['sous_titre_formation']);
     $date_formation = addslashes($_POST['date_formation']);
     $description_formation = addslashes($_POST['description_formation']);
     $id_formation = addslashes($_POST['id_formation']);
    
    $pdoCV->exec(" UPDATE formations VALUES (NULL,'$titre_formation', '$sous_titre_formation' , '$date_formation', '$description_formation') ");
        header("location:../admin/experience.php");
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
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <script src="../ckeditor/ckeditor.js"></script>
  	</head>

 	<body> 
    	<header>
      	<h1>Page : Formations</h1>
        <?php //include("admin_menu.php"); ?> <!-- FAUT CREER LA PAGE MENU -->
      	</header>
       
      	<section>   
		    <?php 
		    $sql = $pdoCV -> query("SELECT * FROM formations");
		    $sql -> execute();
		    $nbr_formations = $sql -> rowCount(); ?>
    
      		<p>Il y a <?php echo $nbr_formations; ?> formations dans votre BDD.</p>
		        <form action="formation.php" method="POST">   
		       		<table>
		       			<tr>
			              	<td>Titre :</td> 
			                <td><input type="text" name="titre_xp" size="50" required /></td>
		            	</tr>
		                
			            <tr>                        
			                <td>Sous-Titre :</td> 
			                <td><input type="text" name="sous_titre_xp" size="50" required /></td>                        
			            </tr>
			           
			            <tr>
			                <td>Date :</td> 
			                <td><input type="text" name="date" size="50" required /></td>                          
			            </tr>

			            <tr>
			                <td>Description :</td> 
			                <td>
				              	<textarea name="description" id="editor1" cols="50" rows="10" required /></textarea>
				                <script>
				                /* Replace the textarea id="editor1" with a CKeditor instance, using default configuration. */
				                  CKEDITOR.replace( 'editor1' );

				                </script>
			              	</td>
			            </tr>
		           
			            <tr>
		   				    <td><input type="submit" value="Insérer en BDD" /></td>
				        </tr>
	   			    </table>
	        	</form>

		        <caption id="captionXp">Liste des formations :</caption>
		        <table>
		          <thead>
		            <th>Titre xp</th>
		            <th>Sous-titre xp</th>
		            <th>Date xp</th>
		            <th>Description xp</th>
		            <th>Modification</th>
		            <th>Suppression</th>
		          </thead>                                 
		            
		            <?php while($resultat = $sql->fetch(PDO::FETCH_ASSOC)){ ?>
		          <tr>
		            <td><?php echo $resultat['titre_formation']; ?></td>                 
		            <td><?php echo $resultat['sous_titre_formation']; ?></td>                
		            <td><?php echo $resultat['date_formation']; ?></td>                
		            <td><?php echo $resultat['description_formation']; ?></td>                               
		            <td><a href="modif_experience.php?id_xp=<?= $resultat['id_xp']; ?>">Modifier</a></td> 
		            <td><a href="experience.php?id_xp=<?= $resultat['id_xp']; ?>">Supprimer</a></td>
		          </tr>
		       			
		            <?php };?>
		        </table>
      </section>

     <footer>
         <!-- faire le include du footer -->
     </footer>
	</body>
</html>