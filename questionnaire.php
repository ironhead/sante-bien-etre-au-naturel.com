<!DOCTYPE html PUBLIC "-//w3c//dtd xhtml 1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-fr" lang="fr-fr">

<head>
	<title>questionnaire</title>
	<script type='text/javascript'>
			function getXhr(){
                                var xhr = null; 
				if(window.XMLHttpRequest) // Firefox et autres
				   xhr = new XMLHttpRequest(); 
				else if(window.ActiveXObject){ // Internet Explorer 
				   try {
			                xhr = new ActiveXObject("Msxml2.XMLHTTP");
			            } catch (e) {
			                xhr = new ActiveXObject("Microsoft.XMLHTTP");
			            }
				}
				else { // XMLHttpRequest non supporté par le navigateur 
				   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
				   xhr = false; 
				} 
                                return xhr;
			}
			
			/**
			* Méthode qui sera appelée sur le click du bouton
			*/
			function charge_maux(){
				var maux_xhr = getXhr();
				// On défini ce qu'on va faire quand on aura la réponse
				maux_xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(maux_xhr.readyState == 4 && maux_xhr.status == 200){
						leselect = maux_xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste
						document.getElementById('maux_div').innerHTML = leselect;
					}
				}

				// Ici on va voir comment faire du post
				maux_xhr.open("POST","ajaxmaux.php",true);
				// ne pas oublier ça pour le post
				maux_xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id du groupe
				sel = document.getElementById('groupes_sel');
				idgroupes = sel.options[sel.selectedIndex].value;
				maux_xhr.send("idgroupes="+idgroupes);
			}
			
			function charge_ssmaux(){
				var ssmaux_xhr = getXhr();
				// On défini ce qu'on va faire quand on aura la réponse
				ssmaux_xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(ssmaux_xhr.readyState == 4 && ssmaux_xhr.status == 200){
						leselect = ssmaux_xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste
						document.getElementById('ss-maux_div').innerHTML = leselect;
					}
				}
				// Ici on va voir comment faire du post
				ssmaux_xhr.open("POST","ajax-ssmaux.php",true);
				// ne pas oublier ça pour le post
				ssmaux_xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id
				sel = document.getElementById('maux_sel');
				idmaux = sel.options[sel.selectedIndex].value;
				ssmaux_xhr.send("idmaux="+idmaux);
			}
		</script>

	<?php include 'meta.inc' ?>
</head>

<body>
	<?php include 'entete.inc' ?>
  <div id="content">
  
  <h1 style="text-align:center">de quoi souffrez-vous ?</h1>

   <h1 style="text-align:center">comment puis-je vous soulager ?</h1>
   <br />
   <form name="questio" action="questionnaire_action.php" method="post">
       <table>
       <tr>
       <td>votre nom :</td> 
       <td>votre pr&eacute;nom :</td> 
       <td>votre adresse email :</td>
       </tr>
       <tr>
       <td><input type="text" name="prenom" /></td>
       <td><input type="text" name="nom" /></td>
       <td><input type="text" name="email" /></td>
       <tr>
       <td>&acirc;ge :</td> 
       <td>poids :</td> 
       </tr>
       <tr>
       <td><input type="text" name="age" /></td>
       <td><input type="text" name="poids" /></td>
       </tr> 
       </table>
    <ul>
      <li><label for="allergie"> avez-vous des allergies ?</label> <input type="checkbox" name="allergie" id="allergie" /></li>
      <li><label for="epileptie"> avez-vous des antécédents épileptiques ?</label><input type="checkbox" name="epileptie" id="epileptie"/></li>
      <li><label for="vege"> suivez-vous un régime végétarien ou végétalien ?</label><input type="checkbox" name="vege" id="vege"/></li>
    </ul>
    <table align='center'>
    <tr>
    <td align='center' rowspan="2">
    Etape 1 <br />
    <select name="groupes" id="groupes_sel" size="9" onchange='charge_maux()'>
    <?php
	include 'dbconfig.inc' ;
	$res = mysql_query("SELECT `id`,`nom` FROM `Grp_maux` ORDER BY nom");
	echo "<option value='-1'>Choisir une famille</option>" ;
	while($row = mysql_fetch_assoc($res)){
	echo "<option value='".$row["id"]."'>".$row["nom"]."</option>";
	}
    ?>
    </select>
    </td>
    <td align='center' >
	Etape 2 <br />
	<div id='maux_div' style='display:inline'>
	<select name='maux' id='maux_sel' onchange='charge_ssmaux()'>
	    <option value='-1'>Choisir un mal</option>
	</select>
	</div>
    </td>
    </tr>
    <tr>
    <td align='center'>
    <div id='ss-maux_div' style='display:inline'>
    </div>
    </td>
    </tr>
    </table>
    <p style="text-align:center">--------------------------</p>
    <p>
    <textarea name="message" rows="8" cols="60" onclick="document.questio.message.value='';">
    Vous pouvez indiquer ici une description suppl&eacute;mentaire
    </textarea>
    </p>
    <p>
    <input type="submit" value="Valider" /><input type="reset" name="nom" value="Rétablir" />
    </p>
   </form>
  </div>

<?php include 'pieddepage.inc' ?>
<?php include 'g-analytics.inc'?>

</body>
</html>
