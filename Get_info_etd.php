<?php
	require_once('config.php');

	if(empty($_POST['nom']))
	{
		echo "<b class='text-danger'> votre champ est vide </b>";
	}

	else if (isset($_POST['nom'])) 
	{	
		$nom = $_POST['nom'];
		$stmt = $db->prepare("SELECT * FROM etudiant WHERE TRIM(GivenName)=?");
		$stmt->execute([$nom]); 
		$user = $stmt->fetch();
		if ($user) 
		{
		   echo '<b class="text-success"> Cet Etudiant existe déja </b>' . "<br>"; 
			echo "<div>";
			echo "	<p> Nom : " . $user['FamilyName'] . "</p>";
	        echo "	<p> Prenom : " . $user['GivenName'] . " </p>"; 
	        echo "	<p> Email : " . $user['Email'] . "</p>"; 
	        echo "	<p> PhoneNumber : " . $user['PhoneValue'] . "</p>";
	        echo "	<p> Level : " . $user['Level'] . "</p>";
	        echo "</div>";	    
		}
		else 
		{
		   echo "<b class='text-danger'> Cet Etudiant n'existe pas </b>";
		}    	
	}


?>
