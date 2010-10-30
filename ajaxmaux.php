<?php
		if(isset($_POST["idgroupes"])){
		include 'dbconfig.inc' ;
		$reponse = $bdd->query("SELECT `id`,`nom` FROM `maux` WHERE grp_maux=".$_POST["idgroupes"]." ORDER BY nom ASC");
		echo "<select name='maux' id='maux_sel' onchange='charge_ssmaux()'>" ;
		echo "<option value='-1'>Choisir un mal</option>" ;
		while($row = $reponse->fetch()){
		echo "<option value='".$row["id"]."'>".$row["nom"]."</option>";
		}
		echo "</select>";
	}
?>
