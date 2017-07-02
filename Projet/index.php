<?php
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=diplome","root","");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	@$members = $_POST["members"];
	@$versement = $_POST["versement"];
	@$fiches = $_POST["fiches"];
	$elements = "member";
	$entete = 
	"<tr id = \"entete\" >
		<td>Nr</td><td>Nom</td><td>Prenom</td><td>Adresse de domicile</td><td>Adresse de travail</td><td>Membre</td>
		<td>CIN</td><td>Date de naissance</td>
	</tr>";
	if (isset($members)){
		$elements = "member";
		$entete = 
	"<tr id = \"entete\" >
		<td>Nr</td><td>Nom</td><td>Prenom</td><td>Adresse de domicile</td><td>Adresse de travail</td><td>Membre</td>
		<td>CIN</td><td>Date de naissance</td>
	</tr>";
	}
	if (isset($versement)){
		$elements = "versement";
		$entete = 
	"<tr id = \"entete\" >
		<td>Nr</td><td>Année</td><td>cautisation</td><td>Date</td><td>Montant</td><td>Nr de sollicitation</td>
	</tr>";
	}
	if (isset($fiches)){
		$elements = "fiche";
		$entete = 
	"<tr id = \"entete\" >
		<td>Nr</td><td>Nr du soliciteur</td><td>Dated de début</td><td>Date de fin</td>
	</tr>";
	}
	$select = $pdo->prepare("select * from {$elements}");
	$select->execute();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8" />
		<style>
			body{
				font-family : arial;
				text-align : center;
				margin : 0;
				background-color:linear-gradient(to bottom,#669999,#ffffff);
			}
			table{
				margin : auto;
			}
			a{
				font-size : 14pt;
				position : absolute;
				right : 0;
				color : orange;
				border-radius : 2px;
				text-align:right;
				margin-right: 20px;

			}
			header{
				height : 120px;
				color : white;
				padding-top : 50px;
				background-color : black;
				font-size : 32pt;
				text-align : center;
				text-transform : capitalize;
				border-radius: 6px;
			}
			#entete{
				color : #AAA;
			}
			tr{
				border : 0;
				background-color : #EEE;
			}
			#menu{
				background-color : red;
				position : absolute;
				left : 0;
				top : 210px;
			}
			.bouton{
				width : 250px;
				height : 80px;
				font-size : 18pt;
				border : 0;
				border-bottom : solid 1px white;
				background-color:;
			}
			#tableau{
				width : 933px;
				padding : 40px;
				border-radius : 20px;
				height : 400px;
				background-color : orange;
				position : absolute;
				left : 250px;
			}
			.bouton:focus{
				background-color : #999;
				outline : none;
			}
			
		</style>
	</head>
	<body>
		<header>
			Association des ancien diplomé d'ENSA marrakech<br>
			
			<a href = "inscription.php">inscription</a><br>
			<a href = "addfiche.php">ajouter fichier</a>
			
		</header>
		<div id = "menu">
			<form method = "post" >
				<input class = "bouton" type = "submit" name = "members" value = "Membres" /></br>
				<!--<input class = "bouton" type = "submit" name = "versement" value = "versement" /></br>-->
				<input class = "bouton" type = "submit" name = "fiches" value = "Fiches de sollicitation" />
			</form>
		</div>
		<div id = "tableau" >
			<table border='1'>
				<?php 
					echo $entete;
					while ($ligne = $select->fetch(PDO::FETCH_ASSOC)){ 
				?>
				<tr>
					<?php foreach ($ligne as $champ): ?>
						<td><?=$champ?></td>
					<?php endforeach; ?>
				</tr>
			<?php } ?>
			</table>
		</div>
	</body>
</html>