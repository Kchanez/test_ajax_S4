<?php 
	require_once 'config.php';
    $stmt = $db->prepare("SELECT * FROM etudiant");
    $stmt->execute(); 
    $users = $stmt->fetchall();              	 
            
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    </head>
    <style>
        .show
        {
            width:90%;
            margin:80px auto;
        }
    </style>
<body>
	<div class="container">
		<?php include_once 'header.php'; ?>   
        <div class="show"> 
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">GivenName</th>
                    <th scope="col">FamilyName</th>
                    <th scope="col">Email</th>
                    <th scope="col">PhoneValue</th>
                     <th scope="col">Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($users) 
                        {
                            for ($i=0; $i <count($users) ; $i++) 
                            {
                    ?>
                            <tr>
                            <td><?php echo $users[$i]['GivenName']; ?></td>
                            <td><?php echo $users[$i]['FamilyName']; ?></td>
                            <td><?php echo $users[$i]['Email'] ; ?></td>
                            <td><?php echo $users[$i]['PhoneValue']; ?></td>
                             <td><?php echo $users[$i]['Level']; ?></td>
                            </tr>
                    <?php
                            }
                    ?>  
                </tbody>
            </table>        
                <?php
                    }
                    else 
                    {
                    echo "<b class='text-danger'> Vous n'avez rien choisit </b>";
                    }
                ?>	
        </div>  
    </div>  
</body>
</html>