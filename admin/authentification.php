<?php require '../connexion/connexion.php'; ?>

<?php

session_start();

if(isset($_POST['connexion'])){

	$email = addslashes($_POST['email']);
	$mdp = addslashes($_POST['mdp']);

	$sql = $pdoCV -> prepare(" SELECT * FROM utilisateurs WHERE email = '$email' AND mdp = '$mdp' ");
	$sql -> execute();
	$utilisateur = $sql -> rowcount();

	if($utilisateur == 0){
		$msg_connexion_err = "Erreur d'authentification !";
	}
	else{
		$ligne = $sql -> fetch();
		$_SESSION['connexion'] = 'Vous êtes connecté !';
		$_SESSION['id_utilisateur'] = $ligne['id_utilisateur'];
		$_SESSION['prenom'] = $ligne['prenom'];
		$_SESSION['nom'] = $ligne['nom'];

		header('location: index.php');

	}
}

?>

<html lang="fr">
    <head>  
   	<meta charset="UTF-8" />
    <title>Connexion au site CV <?php echo $resultat['prenom'] . ' ' . $resultat['nom']; ?></title>
    <link rel="stylesheet" type="text/css" href="../cssAdmin/myfrontstyle.css" />
    </head>

    <body>
        <header>
	    	<!-- include admin_menu.php -->
	    	<h1>Page de Connexion Admin</h1>
        </header>

        <section>
        	<form method="POST" action="authentification.php">
        		<table>
        			<thead>
        				<th colspan="3">Formulaire de connexion</th>
        			</thead>
    				
    				<tr>
    					<td>
    						<label for="email">Email</label>
    					</td>

    					<td>
							<input type="email" name="email" required />
    					</td>
    				</tr>

    				<tr>
    					<td>
    						<label for="mdp">Mot de passe</label>
    					</td>

    					<td>
							<input type="password" name="mdp" required />
    					</td>
                    <tr>
                        <td colspan="2"><input name="connexion" type="submit" value="Connexion" /></tr>			
    				</tr>
				</table>
        	</form>
        	<p><a href="#">Mot de passe oublié</a> ?</p>
        </section>
        <!-- include footer.php -->
