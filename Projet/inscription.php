<?php
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=diplome","root","");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}

	@$nom = $_POST["nom"];
	@$prenom = $_POST["prenom"];
	@$CIN = $_POST["CIN"];
	@$dateNaissance = $_POST["dateNaissance"];
	@$adresseDomicile = $_POST["adresseDomicile"];
	@$adresseTravail = $_POST["adresseTravail"];
	@$membre = $_POST["membre"];
	@$telephone = $_POST["telephone"];
	@$type = $_POST["type"];
	@$dateObt = $_POST["dateObt"];
	@$departement = $_POST["departement"];
	@$valider = $_POST["valider"];
	$erreur = "";
	
	if (isset($valider)){
		$check = $pdo->prepare("select ID from member where CIN = ? limit 1");
		$check->execute(array($CIN));
		$tab = $check->fetchAll();
		if (!preg_match('/^[a-z A-Z]*$/',$nom))
			$erreur = "Nom invalide: ne doit contenir que des lettres de l'alphabet <br />";
		if (!preg_match('/^[a-z A-Z]*$/',$prenom))
			$erreur .= "Prenom invalide: ne doit contenir que des lettres de l'alphabet <br />";
		/* if (!preg_match('/^[a-z]{1,2}[0-9]{6}$/',$CIN))
			$erreur .= "CIN invalide: une ou deux lettres suivies de six chiffres <br />";
		if (count($tab) > 0)
			$erreur .= "CIN déja existant";
		if (!preg_match('/^[0][56][0-9]{8}$/',$telephone))
			$erreur .= "Numéro de telephone invalide: \"05\" ou \"06\" suivi de six chiffres"; */
		echo ''.$erreur;
		if (empty($erreur)){
			$insert = $pdo->prepare("insert into member (Nom,Prenom,adresseDomicile,adresseTravail,Membre,CIN,dateNaissance)
			values (?,?,?,?,?,?,?)");
			$insert->execute(array($nom,$prenom,$adresseDomicile,$adresseTravail,$membre,$CIN,$dateNaissance));
			echo '=>';
			$select = $pdo->prepare("select ID from member where CIN = ?");
			$select->execute(array($CIN));
			$ID = $select->fetch();
			$tel = $pdo->prepare("insert into telephone (Numero,membre) values (?,?)");
			$tel->execute(array($telephone,$ID['ID']));
			$diplome = $pdo->prepare("insert into diplome (Type,Annee,Faculte,Departement,loreat) values (?,?,?,?,?)");
			$diplome->execute(array($type,$dateObt,"ENSA Marrakech",$departement,$ID['ID']));
			header("location:index.php");
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8" />
		<style>
			textarea{
				width : 300px;
				height : 100px;
			}
			text{

			}
		</style>
	</head>
	<body>
		<form method = "post" >
			<div class = "label">Nom:</div>
			<input type = "text" name = "nom" required value = "<?php echo $nom ?>" autofocus />
			<div class = "label">Prenom:</div>
			<input type = "text" name = "prenom" required value = "<?php echo $prenom ?>" />
			<div class = "label">CIN:</div>
			<input type = "text" name = "CIN" required value = "<?php echo $CIN ?>" />
			<div class = "label">Date de naissance:</div>
			<input type = "date" name = "dateNaissance" required value = "<?php echo $dateNaissance ?>" />
			<div class = "label">Numero de telephone:</div>
			<input type = "text" name = "telephone" required value = "<?php echo $telephone ?>" />
			<div class = "label">Adresse de domicile:</div>
			<textarea name = "adresseDomicile" cols = "100" rows = "10" required ></textarea>
			<div class = "label">Adresse de travail:</div>
			<textarea name = "adresseTravail" cols = "100" rows = "10" /></textarea>
			<div class = "label">Diplome de l'ENSA de Marrakech:</div>
			<div>
				type:
				<select name = "type">
					<option>ingenieur</option>
					<option>master</option>
				</select>
				date d'optention:<input name = "dateObt" type = "date" />
				département:
				<select name = "departement">
					<option>Genie informatique</option>
					<option>Genie éléctrique</option>
					<option>Genie réseau et télécom.</option>
					<option>Genie industriel et logistique</option>
				</select>
			</div>
			<div class = "label">Membre:</div>
			<select name = "membre">
				<option>CA</option>
				<option>executif</option>
			</select>
			<input type = "submit" name = "valider" value = "enregister" />
		</form>
		<?php echo $erreur; ?>
	</body>
</html>