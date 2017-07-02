<?php
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=diplome","root","");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	session_start();
	@$CIN = $_POST["CIN"];
	@$member = $_POST["member"];
	@$numero = $_POST["numero"];
	@$fiche = $_POST["fiche"];
	$erreur = "";
	if (isset($member)){
		$select = $pdo->prepare("select * from member where CIN = ?");
		$select->execute(array($CIN));
		$tab = $select->fetchAll();
		if (count($tab) == 0)
			$erreur .= "Ce CIN ne correspond à aucun membre";
		if (!preg_match('/^[a-z]{1,2}[0-9]{6}$/',$CIN))
			$erreur .= "CIN invalide: une ou deux lettres suivies de six chiffres <br />";
		if (empty($erreur)){
			$_SESSION["CIN"] = $CIN;
			header("location:member.php");
		}
	}
	if (isset($fiche)){
		$select = $pdo->prepare("select * from fiche where Numero = ?");
		$select->execute(array($numero));
		$tab = $select->fechtAll();
		if (!preg_match('/^[0-9]*$/',$CIN))
			$erreur .= "Entrez un entier <br />";
		if (count($tab) == 0)
			$erreur .= "Ce numero ne correspond à aucune fiche";
		if (empty($erreur)){
			$_SESSION["numero"] = $numero;
			header("location:fiche.php");
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		<form method = "post" >
		<input type = "text" name = "CIN" />
		<input type = "submit" name = "member" />
		<input type = "text" name = "numero" />
		<input type = "submit" name = "fiche" />
		</form>
		<?php echo $erreur ?>
	</body>
</html>