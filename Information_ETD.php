<?php 
	require_once 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Formulaire</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    </head>
<body>
	<div class="container">
		<?php include_once 'header.php'; ?>
		<div class="Sous_container">
			<form method="" action="">
			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label"></label>
			  <input type="text" class="form-control" name="nom" id="exampleFormControlInput1" placeholder="votre nom">
			</div>
			<div id="show_info_etd">
				<?php
					require_once 'Get_info_etd.php';
				?> 
			</div>
			<div class="mb-3">
			  <label for="exampleFormControlInput2" class="form-label">Choose your level :</label>
				 <select name="level" id="level">
				  <option> votre level</option>
				  <option value="lp1">lp1</option>
				  <option value="lp2">lp2</option>
				  <option value="lp3">lp3</option>
				</select> 
			</div>
			<div id="show" style="margin: auto;">	
		<?php
			require_once 'liste_etd.php';
		?> 
			</div>
		</form>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
	 <script>
		$(document).ready(function()
		{
			$("#exampleFormControlInput1").keyup(function()
			{
				var nom = $(this).val();
				if (nom == "") 
				{
					$("#show_info_etd").fadeOut().html("");
					//$("#show").html("");
				}
				else
				{
					$.ajax ({
						url: "Get_info_etd.php",
						method: "POST",	
						data: {
							nom: nom
						},
						success: function(data)
						{	
							$("#show_info_etd").fadeIn().html(data);	
							//$("#show").html(data);
						}	
					});
				}
			});
		});
	</script>	
	 <script>
		$(document).ready(function()
		{
			$("#level").mouseleave(function()
			{
				var info_etd = $(this).val();
				if ( info_etd == " ") 
				{
					$("#show").fadeOut().html("");
					//$("#show").html("");
				}
				else
				{
					$.ajax ({
						url: "liste_etd.php",
						method: "POST",	
						data: {
							level : info_etd
						},
						success: function(data)
						{	
							$("#show").fadeIn().html(data);	
							//$("#show").html(data);
						}	
					});
				}
			});
		});
	</script>  
</body>
</html>