<?php
	require_once('config.php');

 if (isset($_POST['level'])) 
	{	
		$level = $_POST['level'];
		$stmt = $db->prepare("SELECT * FROM etudiant WHERE TRIM(Level)=?");
		$stmt->execute([$level]); 
		$etd = $stmt->fetchall();
?>
		
	<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">GivenName</th>
	      <th scope="col">FamilyName</th>
	      <th scope="col">Email</th>
	      <th scope="col">PhoneValue</th>
	    </tr>
	  </thead>

	  <tbody>
		<?php
			if ($etd) 
			{
				for ($i=0; $i <count($etd) ; $i++) 
				{
		?>
			    <tr>
			      <td><?php echo $etd[$i]['GivenName']; ?></td>
			      <td><?php echo $etd[$i]['FamilyName']; ?></td>
			      <td><?php echo $etd[$i]['Email'] ; ?></td>
			      <td><?php echo $etd[$i]['PhoneValue']; ?></td>
			    </tr>
		<?php
				}
		?>  
	  </tbody>
	</table> 
				   	
<?php
		}
	}
	else 
	{
	   echo "<b class='text-danger'> Vous n'avez rien choisit </b>";
	}
?>	  


