<?php
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=diplome","root","");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	@$soliciteur = $_POST["soliciteur"];
	@$debut = $_POST["debut"];
	@$fin = $_POST["fin"];
	@$ajouter = $_POST["ajouter"];
	$erreur = "";
	if (isset($ajouter)){
		/*if (!preg_match('/^[a-z]{1,2}[0-9]{6}$/',$soliciteur))
			$erreur .= "CIN invalide: une ou deux lettres suivies de six chiffres <br />";*/
		$exist = $pdo->prepare("select ID from member where CIN = ?");
		$exist->execute(array($soliciteur));
		$tab = $exist->fetchAll();
		if (count($tab) == 0)
			$erreur .= "Ce CIN ne correspond à aucun membre";
		if(empty($erreur)){
			$select = $pdo->prepare("select ID from member where CIN = ?");
			$select->execute(array($soliciteur));
			$ID = $select->fetch();
			$insert = $pdo->prepare("insert into fiche (Solliciteur,campagne,dateDebut,dateFin) values (?,?,?,?)");
			$insert->execute(array($ID['ID'],2017,$debut,$fin));
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<form method = "post">
			<div>CIN du solliciteur:</div>
			<input name = "soliciteur" type = "text" value = "<?php echo $soliciteur ?>" />
			<div>Date de début:</div>
			<input name = "debut" type = "date" value = "<?php echo $debut ?>" />
			<div>Date de fin:</div>
			<input name = "fin" type = "date" value = "<?php echo $fin ?>" />
			<input type = "submit" name = "ajouter" value = "Ajouter fiche" />
		</form>
		<?php echo $erreur; ?>
	</body>
</html>
