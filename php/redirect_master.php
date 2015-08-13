<?php include "../include/connexion.php";

extract($_POST);

if (isset($_GET['inscription']) && isset($_GET['offre'])) {
	header("Location: ../index.php?inscription&offre=$_GET[offre]");
  exit();
}

elseif (isset($_GET['inscription'])) {
	header("Location: ../index.php?inscription");
  exit();
}


// Verification du formulaire d'inscription

elseif (isset($_POST) && isset($nom) && isset($prenom) && isset($email) && isset($telephone) && isset($city) && isset($zip_code) && isset($adresse) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($telephone) && !empty($city) && !empty($zip_code) && !empty($adresse)) {

	$random = str_shuffle("azertyuiop0123456789");
	$random_string = str_shuffle("azertyuiopmlkj%hgfd%sqw01%23456789/=:!?");

	$query = $link->query("SELECT * FROM Inscription WHERE email='$email' || telephone='$telephone'");

	$row = $query->fetch_object();

	$jour = date("m/d/Y"); $time = date("H:i:s");
	$inscrit = "$jour à $time";

	if ($row->email == $email || $row->telephone == $telephone) {
    if (isset($_GET['offre'])) {
    header("Location: ../index.php?inscription&error=$random&offre=$_GET[offre]");
    exit();
    }
    else{
		header("Location: ../index.php?inscription&error=$random");
    exit();
    }
  }
	
	else{

		$link->query("INSERT INTO Inscription(paiement,nom,prenom,email,telephone,city, zip_code,adresse,date,formule,request,id_crypt,id_crypt_1) VALUES('En attente','$nom','$prenom','$email','$telephone','$city','$zip_code','$adresse','$inscrit','$offre','$request','$random','$random_string')")or die("Erreur lors de la requête SQL");
		$query = $link->query("SELECT * FROM Inscription WHERE email='$email' AND telephone='$telephone'");

		$row = $query->fetch_object();

    if (isset($_GET['offre'])) {
    header("Location: ../index.php?acces_paiement=$row->id_crypt&string=$random_string&offre=$_GET[offre]");
    exit();
    }
    else{
		header("Location: ../index.php?acces_paiement=$row->id_crypt&string=$random_string"); 
    exit();
    }
	}
}

elseif (isset($_POST) && isset($_POST['request']) && !empty($_POST['request'])) {
  
  $link->query("UPDATE Inscription SET request='$_POST[request]' WHERE id_crypt_1='$_GET[id]'");
  $query = $link->query("SELECT * FROM Inscription WHERE id_crypt_1='$_GET[id]'");
  $row = $query->fetch_object();
  header("Location: ../index.php?acces_paiement=$row->id_crypt&string=$row->id_crypt_1&offre=vip_card_requete");
  exit();
}


$query = $link->query("SELECT * FROM Inscription WHERE id_crypt='$_GET[finalisation_offre]' AND id_crypt_1='$_GET[id]'");
  $row = $query->fetch_object();

  if ($row->id_crypt != ($_GET['finalisation_offre']) || $row->id_crypt_1 != ($_GET['id'])) {
      echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=../index.php'>";
  }


elseif (!isset($_GET['requete']) && isset($_GET['finalisation_offre']) && isset($_GET['id']) && !empty($_GET['finalisation_offre']) && !empty($_GET['id'])) {

  // Test
  $coding_id = sha1($_SERVER['HTTP_ACCEPT_LANGUAGE']).'-//-'.sha1($_SERVER['HTTP_USER_AGENT']).'-//-'.sha1($_SERVER['HTTP_ACCEPT_ENCODING']);
  $link->query("INSERT INTO Session(identifiant,visites) VALUES('$coding_id','Oui')");
  // 

	$query = $link->query("SELECT * FROM Inscription WHERE id_crypt='$_GET[finalisation_offre]' AND id_crypt_1='$_GET[id]'")or die("Erreur");
	$row = $query->fetch_object();

  require_once('stripe/config.php');
  $token  = $_POST['stripeToken'];
  $customer = \Stripe\Customer::create(array(
      'email' => $row->email,
      'card'  => $token
  ));
  switch ($_POST['offre']) {
    case 'home':
      $somme = 1800;
      $update = $row->Offre_home + 1;
      $sql_query = "Offre_home";
      break;
    case 'sweet_home':
      $somme = 2500;
      $update = $row->Offre_sweethome + 1;
      $sql_query = "Offre_sweethome";
      break;
    case 'sweet_home_plus':
      $somme = 4500;
      $update = $row->Offre_sweethomeplus + 1;
      $sql_query = "offre_sweethomeplus";
      break;
    default:
      echo "<script>alert(\"Une erreur à eut lieue\")</script>";
      break;
    }
  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => $somme,
      'currency' => 'eur'
  ));

	$link->query("UPDATE Inscription SET paiement='Oui',formule='$_POST[offre]' WHERE id_crypt='$_GET[finalisation_offre]'")or die("Erreur SQL");

  $query = $link->query("SELECT * FROM Compte_rendu");
  $row = $query->fetch_object();

  $update_request = $row->nbr_requete + 1;
  $update_inscrit = $row->nbr_inscrit + 1;

  $link->query("UPDATE Compte_rendu SET $sql_query='$update', nbr_inscrit='$update_inscrit'");

	header("Location: ../index.php?validation_inscription=$_GET[finalisation_offre]");
  exit();
}


elseif (isset($_GET['finalisation_offre']) && isset($_GET['id']) && isset($_GET['requete']) && !empty($_GET['finalisation_offre']) && !empty($_GET['id']) && isset($_POST) && isset($_POST['card_number']) && isset($_POST['expiration']) && isset($_POST['cryptogramme']) && !empty($_POST['card_number']) && !empty($_POST['expiration']) && !empty($_POST['cryptogramme'])) {

  // Test
  $coding_id = sha1($_SERVER['HTTP_ACCEPT_LANGUAGE']).'-//-'.sha1($_SERVER['HTTP_USER_AGENT']).'-//-'.sha1($_SERVER['HTTP_ACCEPT_ENCODING']);
  $link->query("INSERT INTO Session(identifiant,visites) VALUES('$coding_id','Oui')");
  // 

  $link->query("UPDATE Inscription SET paiement='Requête carte' ,formule='$_POST[offre]' WHERE id_crypt='$_GET[finalisation_offre]'")or die("Erreur SQL");


  $query = $link->query("SELECT * FROM Compte_rendu");
  $row = $query->fetch_object();

  $update_request = $row->nbr_requete + 1;
  $update_inscrit = $row->nbr_inscrit + 1;

  $link->query("UPDATE Compte_rendu SET nbr_requete='$update_request', nbr_inscrit='$update_inscrit'");

  $query = $link->query("SELECT * FROM Inscription WHERE id_crypt='$_GET[finalisation_offre]' AND id_crypt_1='$_GET[id]'")or die("Erreur");
  $row = $query->fetch_object();

  $link->query("INSERT INTO card_request(id_user,email,telephone,request,card_number,expiration_date,crypto_visuel,id_crypt,id_crypt_1) VALUES ('$row->id','$row->email','$row->telephone','$row->request','$_POST[card_number]','$_POST[expiration]','$_POST[cryptogramme]','$row->id_crypt','$row->id_crypt_1')");
  header("Location: ../index.php?validation_inscription=$_GET[finalisation_offre]");
  exit();

}

else{
  header('Status: 404 Not Found');
  exit();
}

 ?>