<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-fr" lang="fr-fr">

<head>
	<title>Information et formulaire de Contact</title>
	<?php include 'meta.inc' ?>
</head>

<body>
	<?php include 'entete.inc' ?>
  <div id="content">
    <p>Pour me contacter, je vous propose de m'écrire à l'adresse suivante
    <a href="mailto:contact@sante-bien-etre-au-naturel.com">contact</a>
    <br />ou de me téléphoner au 06-17-18-28-24 .
    </p>
    
    <p>ou d'utiliser le formulaire ci dessous : </p>

    <?php
    function spamcheck($field)
  {
  //filter_var() sanitizes the e-mail
  //address using FILTER_SANITIZE_EMAIL
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);

  //filter_var() validates the e-mail
  //address using FILTER_VALIDATE_EMAIL
  if(filter_var($field, FILTER_VALIDATE_EMAIL))
    {
    return TRUE;
    }
  else
    {
    return FALSE;
    }
  }

if (isset($_REQUEST['email']))
  {//if "email" is filled out, proceed

  //check if the email address is invalid
  $mailcheck = spamcheck($_REQUEST['email']);
  if ($mailcheck==FALSE)
    {
    echo "Entré invalide";
    }
  else
    {//send email
    $email = $_REQUEST['email'] ;
    $subject = $_REQUEST['subject'] ;
    $message =  $_REQUEST['message'] ;
    mail("contact@sante-bien-etre-au-naturel.com", "Subject: $subject","formulaire@sante-bien-etre-au-naturel.com\nDe la part de $email\n \n$message", "From: $email" );
    echo "	<p><h1>Merci d'avoir utiliser notre formulaire !</h1></p>";
    }
  }
else
  {//if "email" is not filled out, display the form
  echo "
  <p>
    <form method='post' action='contact.php'> Votre adresse mail : <input name='email' type='text' /><br />
	Sujet du message: <input name='subject' type='text' /><br />  Message:<br />
	<textarea name='message' rows='15' cols='40'></textarea><br />
	<input type='submit' />
    </form>
   </p>";
  }
?>


  </div>

    <?php include 'pieddepage.inc' ?>
    <?php include 'g-analytics.inc' ?>
</body>
</html>
