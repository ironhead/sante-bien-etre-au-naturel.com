<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-fr" lang="fr-fr">

<head>
	<title>Merci d'avoir utiliser le questionnaire en ligne</title>
	<?php include 'meta.inc' ?>
</head>

<body>
	<?php include 'entete.inc' ?>
  <div id="content">
	<?php
	$corpsDuMessage = "Questionnaire envoyé depuis le site\n" ;
	$corpsDuMessage .= "Nom =".$_POST['nom']."\n";
	$corpsDuMessage .= "Prenom =".$_POST['prenom']."\n";
	$corpsDuMessage .= "@email =".$_POST['email']."\n";
	$corpsDuMessage .= "âge =".$_POST['age']."\n";
	$corpsDuMessage .= "Poids =".$_POST['poids']."\n";
	if(isset($_POST["allergie"])){
		$corpsDuMessage .= "Allergique\n";
		};
	if(isset($_POST["epileptie"])){	
		$corpsDuMessage .= "Epileptique\n";
		};
	if(isset($_POST["vege"])){
		$corpsDuMessage .= "Vegetarien ou Vegetalien\n";
		};
		/* on explicite les Ids */
	include 'dbconfig.inc' ;
	$NomMal = mysql_result(mysql_query("SELECT `nom` from `maux` WHERE `id`=".$_POST['maux']." "),0,0);
	$corpsDuMessage .= "Mal =".$NomMal."\n";
	if(isset($_POST["ss-maux"]) && $_POST["ss-maux"] >0){
		$NomSsMal = mysql_result(mysql_query("SELECT `nom` from `ss-maux` WHERE `id`=".$_POST['ss-maux']." "),0,0);
		$corpsDuMessage .= "Ss-mal =".$NomSsMal."\n";
		};
	$corpsDuMessage .= "Message Complémentaire = \n".$_POST['message']."\n";
	$corpsDuMessage .= "Fin";
	mail("contact@sante-bien-etre-au-naturel.com", "Subject: Message de la part de ".$_POST['email']." ","formulaire@sante-bien-etre-au-naturel.com\n \n$corpsDuMessage", "From: $email" );
	?>
	<p>Merci d'avoir utiliser le questionnaire en ligne.</p>
	<p>La E-consultation est en cours, je vous recontacterais trés rapidement.</p>
  </div>

<?php include 'pieddepage.inc' ?>
<?php include 'g-analytics.inc'?>

</body>
</html>





