<?php
	session_start();
	try{
		$pdo=new PDO("mysql:host=localhost;dbname=projet","root","");
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
	$CIN = $_SESSION["CIN"];
	$select = $pdo->prepare("select * from telephone,member where telephone.membre = ID and CIN = ?");
	$select->execute(array($CIN));
	$member = $select->fetch();
	$select2 = $pdo->prepare("select Type,Annee,Faculte,Departement from diplome,member where loreat = ID and CIN = ?");
	$select2->execute(array($CIN));
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8" />  
	</head>
	<body>
		<div id = "information" >
			<div>No dimplomé: <?php echo $member['ID']; ?></div>
			<div>Nom, Prénom: <?php echo $member['Nom']." ".$member['Prenom']; ?></div>
			<div>Date de naissance: <?php echo $member['dateNaissance']; ?></div>
			<div>Adresse domicile: <?php echo $member['adresseDomicile']; ?></div>
			<div>Adresse travail: <?php echo $member['adresseTravail']; ?></div>
			<div>Numero(s) de téléphone: <?php echo $member['Numero'];
				while ($member = $select->fetch())
					echo " ".$member['Numero'];?></div>
		</div>
		Diplomes obtenus:
		<table>
			<tr>
				<td>Diplome</td>
				<td>Date obtention</td>
				<td>Faculté</td>
				<td>Département</td>
			</tr>
			<?php while ($diplomes = $select2->fetch(PDO::FETCH_ASSOC)){ ?>
			<tr>
				<?php foreach($diplomes as $diplome): ?>
				<td><?=$diplome?></td>
				<?php endforeach; ?>
			</tr>
			<?php } ?>
		</table>
	</body>
</html>