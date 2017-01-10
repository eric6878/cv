<?php require '../connexion/connexion.php'; 

if(isset($_POST['titre_xp'])){ // On vérife si on a creer une nouvelle compétence
    if($_POST['titre_xp']!= '' && $_POST['sous_titre_xp']!= ''  && $_POST['date']!= '' && $_POST['description']!= ''  && $_POST['id_competence']!= ''){//si compétence n'est pas vide
    $titre_xp = addslashes($_POST['titre_xp']);
       $sous_titre_xp = addslashes($_POST['sous_titre_xp']);
       $date = addslashes($_POST['date']);
    $description = addslashes($_POST['description']);
       $id_competence = addslashes($_POST['id_competence']);
    
    $pdoCV->exec(" INSERT INTO experiences VALUES (NULL,'$titre_xp', '$sous_titre_xp' , '$date', '$description', '$id_competence') ");
        header("location:../admin/experiences.php");
        exit();
    }// on ferle le if
}//on ferme le isset

if(isset($_GET['delete'])){
    $sql = 'DELETE FROM experiences WHERE id_xp = "' . $_GET['delete'] . '"';
    $resultat = $pdoCV -> query($sql);
    header('Location: experiences.php');
}
?>

<html lang="fr">
    <head>
   
    <?php 
    $sql = $pdoCV->query("SELECT * FROM utilisateurs");
    $resultat = $sql->fetch();
 	?>
   	<meta charset="UTF-8" />
    <title>CV expériences<?php echo $ligne['prenom'] .' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head>

    <body>
        <header id="headerXp">
        	<h1>Expériences</h1>
        </header>
         
        <section id="sectionXp">
          
           <?php //include("admin_menu.php"); ?><!-- FAUT CREER LA PAGE MENU -->

           <form action="experiences.php" method="POST" id="formXp">
           		<table id="tabXp">
           			<tr>
	                	<td>Titre XP :</td> 
	                    <td><input type="text" name="titre_xp" id="titreXp" size="50" /></td>
                    </tr>
                    
                    <tr>                        
	                    <td>Sous-Titre XP :</td> 
	                    <td><input type="text" name="sous_titre_xp" id="sousTitreXp" size="50" /></td>                        
                    </tr>
                   
                    <tr>
	                    <td>Date XP :</td> 
	                    <td><input type="text" name="dates" id="dateXp" size="50" /></td>                          
                    </tr>

                    <tr>
	                    <td>Description XP :</td> 
	                    <td><input type="text" name="description" id="descriptionXp" size="50" /></td>
                    </tr>
                   
                    <tr>
                    	<td> >>> </td>
           				<td><input type="submit" value="valider" /></td>
       				</tr>
       			</table>
            </form>

            <table border="2" width="500">
                <thead>
                    <th>Expériences</th><br>
                    <th>Suppression</th>
                </thead>
                <tr>
                <?php while($resultat = $sql->fetch()){ ?>
                    <td><?php echo $resultat['titre_xp']; ?></td>
                    <td><?php echo $resultat['sous_titre_xp']; ?></td>
                    <td><?php echo $resultat['date']; ?></td>
                    <td><?php echo $resultat['description']; ?></td>
                    <td><?php echo $resultat['id_competence']; ?></td>                  
                    <td><a href=""?delete=<?php echo $resultat['id_experience'];?>">">>>>>></a></td><!-- POUR SUPPRIMER LA LIGNE A FAIRE -->
                </tr>
           			<?php };?>
        	</table>

        </section>

       <footer id="footerXp">
           <!-- faire le include du footer -->
       </footer>
	</body>
</html>