<div id="container">
  <div id="topimg">
    <h1>Sante Bien Etre au Naturel</h1>
  </div>
  <div id="navcontainer">
    <ul id="navlist">
    <?php
    $items = array(
          array("link"=>"/index.php", "label"=>"Accueil"),
          array("link"=>"/consultadom.php", "label"=>"Consultation &agrave; domicile"),
          array("link"=>"/econsult.php", "label"=>"E-consultation"),
          array("link"=>"/animaux.php", "label"=>"Pour nos 4 pattes"),
          array("link"=>"/contact.php", "label"=>"Contact"));
           
      $menu = '';
      foreach ($items as $val) {
          $menu .= '<li><a href="'.$val['link'].'"';
          if ($_SERVER['SCRIPT_NAME'] == $val['link'])
              $menu .= ' id="current"';
          $menu .= '>'.$val['label'].'</a></li>';
      }
      echo $menu;
    ?>
    </ul>
  </div>
  <div style="clear:both;" />
  <div id="sidebar">
    <h2>Description</h2>
    <div class="sidemenu">
      <ul>
      <?php
		$items = array(
          array("link"=>"/quisuisje.php", "label"=>"Qui suis-je ?"),
          array("link"=>"/cequejevouspropose.php", "label"=>"Ce que je vous propose"),
          );
           
      $menu = '';
      foreach ($items as $val) {
          $menu .= '<li><a href="'.$val['link'].'"';
          if ($_SERVER['SCRIPT_NAME'] == $val['link'])
              $menu .= ' id="current"';
          $menu .= '>'.$val['label'].'</a></li>';
      }
      echo $menu;
    ?>
      </ul>
    </div>
    <h2>De quoi s'agit-il ?</h2>
    <div class="sidemenu">
    <ul>
		<?php
		$items = array(
          array("link"=>"/phyto.php", "label"=>"Phytoth&eacute;rapie"),
          array("link"=>"/aroma.php", "label"=>"Aromath&eacute;rapie"),
          );
           
      $menu = '';
      foreach ($items as $val) {
          $menu .= '<li><a href="'.$val['link'].'"';
          if ($_SERVER['SCRIPT_NAME'] == $val['link'])
              $menu .= ' id="current"';
          $menu .= '>'.$val['label'].'</a></li>';
      }
      echo $menu;
    ?>
    </ul>
    </div>
    <h2>Sites utiles</h2>
    <div class="sidemenu">
      <ul>
        <li><a href="http://pharmacie.husson.pharmattitude.fr/pharmacie/index.html" target="_blank">Pharmacie Husson<br /> Nancy</a></li>
		<li><a href="http://www.lavieclaire.fr/ou-nous-trouver-resultat.php" target="_blank">Magasin<br />La Vie Claire<br /> Nancy</a></li>
        <li><a href="http://www.docteurvalnet.com/points-de-vente.html" target="_blank">Carte des revendeurs des produits<br /> du Docteur Valnet</a></li>
        <li><a href="http://www.bioetbienetre.fr/" title="Bio et bien être"><img style="border:0px" src="http://www.bioetbienetre.fr/images/bio_et_bien_etre.png" alt="Bio et bien être" /></a></li>
        <li><a href="http://bien-etre.bioetbienetre.fr/" title="Bien Être">Bien Être</a></li>
      </ul>
    </div> 
  </div>
</div>
