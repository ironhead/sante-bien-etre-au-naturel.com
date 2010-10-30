<?php
	if(isset($_POST["idmaux"])){
	include 'dbconfig.inc' ;
		if($_POST["idmaux"] > 0){
			$reponse = $bdd->query("SELECT `Is_ss-maux` FROM `maux` WHERE `id`=".$_POST["idmaux"]." ");
			$Is_ssmaux = $reponse->fetch();
			if($Is_ssmaux != 0){
				$reponse = $bdd->query("SELECT `id`,`nom` FROM `ss-maux` WHERE id_maux=".$_POST["idmaux"]." ORDER BY nom ASC");
				echo "<tr><td align='center'>Etape 3 <br />";
				echo "<select name='ss-maux' id='ss-maux_sel'>" ;
				echo "<option value='-1'>Choisir une précision</option>" ;
				while($row = $reponse->fetch()){
				echo "<option value='".$row["id"]."'>".$row["nom"]."</option>";
				}
			echo "</select>" ;
			echo "</td></tr>";
			}
		$reponse->closeCursor();
		}
	}
?>
