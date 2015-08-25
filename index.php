<!DOCTYPE html>

<html lang="fr">
<?php require "include/connexion.php"; 

if (isset($_GET['inscription'])) {

 $description = "Inscription chez Edar, votre majordome personnel";
 $title = "Inscription à Edgar"; include "include/header.php";

 $query = $link->query("SELECT * FROM Inscription WHERE id=61");
 $row = $query->fetch_object();


    ?>

<!-- Page d'inscription -->
<body id="head">
  
    <section id="inscription">

        <?php include "include/section_inscription.php"; ?>

    </section>


<?php } elseif (isset($_GET) && isset($_GET['validation_inscription']) && !empty($_GET['validation_inscription'])) {

    echo "<script>alert(\"Merci de votre inscription\")</script>";

    $title = "Validation inscription"; include "include/header.php";

    $query = $link->query("SELECT * FROM Inscription WHERE id_crypt='$_GET[validation_inscription]'");
    $row = $query->fetch_object();

    switch ($row->formule) {
    case 'home':
      $dossier = "/var/www/html/PHP/Edgar/profilClient/Formule/Home/$row->id - $row->prenom - $row->email";
      $formule = "Home";
      break;
    case 'sweet_home':
      $dossier = "/var/www/html/PHP/Edgar/profilClient/Formule/Sweet Home/$row->id - $row->prenom - $row->email";
      $formule = "Sweet Home";
      break;
    case 'sweet_home_plus':
      $dossier = "/var/www/html/PHP/Edgar/profilClient/Formule/Sweet Home Plus/$row->id - $row->prenom - $row->email";
      $formule = "Sweet Home Plus";
      break;
    case 'vip_card':
      $dossier = "/var/www/html/PHP/Edgar/profilClient/Formule/A la carte/$row->id - $row->prenom - $row->email";
      $formule = "A la carte";
      $request = "\n - Requête: $row->request";
      break;
    default:
      $dossier = "/var/www/html/PHP/Edgar/profilClient/Erreur/$row->prenom - $row->email";
      break;
    }


    // Insertion d'un fichier client permettant de voir les inscrits + création dossier perso du client lors de son inscription

    mkdir("$dossier", 0777, true);
    touch("$dossier/Informations.txt", 0777, true);

    $open = file_get_contents("$dossier/Informations.txt");
    $open = file_get_contents("profilClient/Main.txt");

    $open .= "Identifiant $row->id\n
    - Offre choisie: $row->formule\n
    - Nom: $row->nom\n
    - Prenom: $row->prenom\n
    - Email: $row->email\n
    - téléphone: $row->telephone\n
    - Ville: $row->city\n
    - Code postal: $row->zip_code\n
    - Adresse: $row->adresse\n
    - Date d'inscription: $row->date\n
    - ID crypté: $row->id_crypt\n
    - ID crypté 1: $row->id_crypt_1\n
    - IP : $_SERVER[REMOTE_ADDR] $request\n\n\n\n\n\n";

    file_put_contents("$dossier/Informations.txt", $open);
    file_put_contents("/var/www/html/PHP/Edgar/profilClient/Main.txt", $open);

    chmod("/var/www/html/PHP/Edgar/profilClient", 0777);
    chmod("/var/www/html/PHP/Edgar/profilClient/Formule", 0777);
    chmod("/var/www/html/PHP/Edgar/profilClient/Formule/$row->formule", 0777);
    chmod("$dossier", 0777);
    chmod("$dossier/Informations.txt", 0777);

    ucfirst($row->prenom);
    setcookie("Prenom", "$row->prenom", time()+2592000);

    if ($row) {

      switch ($row->formule) {
        case 'home':
          $formule = "Home";
          break;
        case 'sweet_home':
          $formule = "Sweet Home";
          break;
        case 'sweet_home_plus':
          $formule = "Sweet Home +";
          break;
        case 'vip_card':
          $formule = "A la carte";
          $requete = "- Votre requête : $row->request <br />";
          break;
        default:
          $formule = "Erreur";
          $requete = "";
          break;
      }


      // Envoi des mails
    
      require "PHPMailer/class.phpmailer.php";

      // Envoi à l'utilisateur
      $mail = new phpmailer();
      $mail->IsHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->FromName = 'Edgar Club - Votre inscription ';
      $mail->Subject = "$row->email";

      $mail->Body = "<body style='color: #6D6E72'>
      <div style='padding: 5%; font-family: caviar; background-color: #E7E7E7; color: #6d6e72'>
        <div style='background-color: white; padding: 4%'>
          <h1 style='color: #ff0000; text-align: center; margin: 0% ; font-family: Verdana; font-size: 4vw'>Edgar Club</h1>
          <h2 style='color: #000; text-align: center; margin: 0% ; font-family: Verdana; font-size: 2vw'>Votre inscription</h2>
          <p style='text-align: justify ;color: #6D6E72; Margin-top: 7%; font-family: -webkit-body; font-size: 1.3vw'><strong>Merci à vous d'avoir rejoint notre communauté, vous trouverez ci dessous les informations saisies lors de votre inscription :</strong></p>
          <div style='text-align: justify; padding: 2%; Margin-top: 4%; color: #6d6e72; font-size: 1.3vw'>- Nom : $row->nom <br />
          - Prénom : $row->prenom <br />
          - Email : $row->email <br />
          - Téléphone : $row->telephone <br />
          - Ville : $row->city <br />
          - Code postal : $row->zip_code <br />
          - Adresse : $row->adresse <br />
          - Date d'inscription : $row->date <br />
          - Formule choisie : $formule <br />
          $requete</div>
        </div>
      </div>
      </body>";
      $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
      $mail->AltBody = $txt; 

      $mail->AddAddress("$row->email");
      $mail->Send();


      // Envoi à l'Admin
      $mail = new phpmailer();
      $mail->IsHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->From = str_shuffle(0123456789);
      $mail->FromName = 'Nouvel Inscrit / Edgar';
      $mail->Subject = "$row->email";

      $mail->Body = "<body style='color: #6D6E72'>
      <div style='padding: 5%; font-family: caviar; background-color: #E7E7E7; color: #6d6e72'>
        <div style='background-color: white; padding: 4%'>
          <h1 style='color: #ff0000; text-align: center; margin: 0% ; font-family: Verdana; font-size: 4vw'>Edgar Club</h1>
          <h2 style='color: #000; text-align: center; margin: 0% ; font-family: Verdana; font-size: 2vw'>Nouvel inscrit</h2>
          <p style='text-align: justify ;color: #6D6E72; Margin-top: 7%; font-family: -webkit-body; font-size: 1.3vw'><strong>Un nouvel inscrit à rejoint votre communauté, vous trouverez ci dessous ses informations.</strong></p>
  
          <div style='text-align: justify; padding: 2%; Margin-top: 4%; color: #6d6e72; font-size: 1.3vw'>- Nom : $row->nom <br />
          - Prénom : $row->prenom <br />
          - Email : $row->email <br />
          - Téléphone : $row->telephone <br />
          - Ville : $row->city <br />
          - Code postal : $row->zip_code <br />
          - Adresse : $row->adresse <br />
          - Date d'inscription : $row->date <br />
          - Formule choisie : $formule <br /></div>

          <p style='padding: 2%; border: 1px #C5C5C5 solid; Box-shadow: 0 0 10px 1px #C5C5C5; Margin-top: 3%; color: #6d6e72; font-size: 1.3vw'>Accès Admin :<br /><a href='' style='font-size: 1vw'>http://www.edgarclub.com/index.php?token_access=8cs7tae2amt14c9m6oavlnu035&identifiant=Guillaume</a></p>
        </div>
      </div>
      </body>";

      $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
      $mail->AltBody = $txt; 
      $mail->AddAddress("pixofheaven@gmail.com");
      $mail->Send();
      
?>

<a href="index.php">
<button class="btn btn-accueil" type="submit">Accueil</button>
</a>

<div class="container">
  <div class="col-md-8 col-md-offset-2" id="validation_inscription">
    <h1>Merci d'avoir rejoint Edgar Club</h1>
    <p>Bonjour <span><?php echo $row->prenom; ?></span> ! L'équipe de Edgar Club vous souhaite la bienvenue !</p><p>Notre service client va prendre contact avec vous dans les meilleurs délais mais si vous êtes impatient de nous contacter, vous pouvez nous envoyer un mail à l'adresse <span>hello@edgarclub.com</span> ou bien en nous envoyant un texto au <span>06 48 95 83 30</span></p>
    <p>PS : notre équipe est vraiment sympa.</p>
  </div>
</div>

<?php } else{
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
  }

}

elseif (isset($_GET) && isset($_GET['faq'])) {


 $description = "EdgarCLub, la foire aux questions. Des intérogations sur le fonctionnement de notre site ? N'attendez plus, trouvez vos réponses dès maintenant à l'iade de notre FAQ";
 $title = "FAQ"; include "include/header.php"; ?>
<!-- Page d'inscription -->
<body id="head">

  <?php include_once "include/navbar.php"; ?>
  
    <section id="faq">

        <?php include "include/section_faq.php"; ?>

    </section>

    <?php include "include/footer.php"; ?>

<?php }

elseif (isset($_GET) && isset($_GET['devenir_edgar'])) {

 $description = "Edgar Club | Devenir Edgar. Venez rejoindre l'aventure et devenez une Edgar au sein de notre entreprise !";
 $title = "Devenir Edgar"; include "include/header.php"; ?>
<!-- Page d'inscription -->
<body id="head">

  <?php include_once "include/navbar.php"; ?>
  
    <section id="devenir_edgar">

        <?php include "include/section_devenir_edgar.php"; ?>

    </section>

    <?php include "include/footer.php"; ?>


<?php }

elseif (isset($_GET) && isset($_GET['mentions_legales'])) {


 $description = "Edgar Club | Mentions légales";
 $title = "Mentions légales"; include "include/header.php"; ?>
<!-- Page d'inscription -->
<body id="head">

  <?php include_once "include/navbar.php"; ?>
  
    <section id="mentions_legales">

        <?php include "include/section_mentions_legales.php"; ?>

    </section>

    <?php include "include/footer.php"; ?>


<?php }


elseif (isset($_GET) && isset($_GET['conditions_generales'])) {

 $description = "Edgar Club | CGV. Cette page contient les conditions générales de vente rélatives à EdgarClub"; 
 $title = "Conditions générales de vente"; include "include/header.php"; ?>
<!-- Page d'inscription -->
<body id="head">

  <?php include_once "include/navbar.php"; ?>
  
    <section id="conditions_generales">

        <?php include "include/section_cgv.php"; ?>

    </section>

    <?php include "include/footer.php"; ?>


<?php }

elseif (isset($_GET['token_access']) && isset($_GET['identifiant']) && !empty($_GET['token_access']) && !empty($_GET['identifiant'])) {

      if (($_GET['token_access']) ==  "2ba928ccb63ec1646618ba5a6ba98fb4e143fd0a4b84b15bff6ee5796152495a230e45e3d7e947d9" && ($_GET['identifiant']) == "Guillaume" || ($_GET['token_access']) ==  "2ba928ccb63ec1646618ba5a6ba98fb4e143fd0a4b84b15bff6ee5796152495a230e45e3d7e947d9" && ($_GET['identifiant']) == "Jean-carles") {

      $user = $_GET['identifiant'];
      $title = "Bonjour $user"; 
      include "include/header.php";

?>

  <!-- Page Admin -->

<body id="head">
  
    <section id="section_admin">

      <?php include "include/section_admin.php"; ?>

    </section>

<?php }  else{
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";  
      }
}

elseif (isset($_GET['acces_paiement']) && isset($_GET['string']) && !empty($_GET['acces_paiement']) && !empty($_GET['string'])) {

  $query = $link->query("SELECT * FROM Inscription WHERE id_crypt='$_GET[acces_paiement]' AND id_crypt_1='$_GET[string]'");
  $row = $query->fetch_object();

  if ($row->id_crypt != ($_GET['acces_paiement']) || $row->id_crypt_1 != ($_GET['string'])) {
      echo "<script>alert(\"Erreur de procédure\")</script>";
      echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
  }

  $title = "Paiement offre $_GET[offre]"; 
      include "include/header.php"; ?>

<body id="head">
  
    <section id="section_paiement">

      <?php include "include/section_paiement.php"; ?>

    </section>


<?php } else{ 

// Si l'utilisateur quitte au moment de payer, dans ce cas on le supprime de la BDD
$link->query("DELETE FROM Inscription WHERE paiement='En attente'");

// Si l'utilisateur est supprimé, son cookie également
$query = $link->query("SELECT * FROM Inscription WHERE prenom='$_COOKIE[Prenom]'");
$row = $query->fetch_object();

if (empty($row)) {
  setcookie("Prenom","$_COOKIE[Prenom]",time() - 3600);
}

$query = $link->query("SELECT * FROM card_request");
$row = $query->fetch_object();

$query = $link->query("SELECT * FROM Inscription WHERE email='$row->email'");

if ($row == 0) {
  $link->query("DELETE FROM card_request WHERE email!='$row->email'");
}

?>

<!-- Page par défault -->
<?php 
$description = "Edgar Club | Page d'accueil. Bienvenur chez Edgar CLub !";
$title = "Enchanté, je suis Edgar"; include "include/header.php"; ?>

<body id="head">
        
        <?php include_once "include/navbar.php"; ?>

        <section>

            <div class="main text-center">
                <h1>ENCHANTÉ, JE SUIS EDGAR</h1>
                <h2>VOTRE MAJORDOME PERSONNEL.</h2>
                <div class="col-md-2 col-md-offset-5 switcher_header">
                  <a href="#content_presentation"><p>En savoir plus</p></a>
                  <a href="#content_presentation"><i class="fa fa-angle-down fa-3x"></i></a>
                </div>
            </div>

        </section>

        <!-- Content
        ============================================= -->
        <section>

        <?php require_once "include/section_index.php"; ?>

        </section>
        <a href="#head">
          <div id="gotoTop" class="fa fa-angle-up"></div>
        </a>
                
        <?php include "include/footer.php"; 

      }  ?>

  </body>
</html>