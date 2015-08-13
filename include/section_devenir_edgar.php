<div class="container">
  <div class="col-md-12">
    <h1>Devenir Edgar</h1>
    <h2>Donnez le sourire autour de vous</h2>

    <p>Edgar Club est le premier service de majordome personnel à domicile. Il offre un service haut de gamme de coordination des tâches et des démarches du quotidien. </p>

    <p>Vous avez le sens du service ? Des qualités relationnelles indéniables et savez gérer les situations avec responsabilité ? Rejoignez la communauté d'Edgar !</p>

    <p>Tous nos Edgar sont des salariés car nous voulons offrir le maximum de garanties et le maximum de sécurité à nos clients. </p>

    <p>Pour nous rejoindre, c'est très simple : il suffit de renseigner les champs ci-dessous. Notre équipe prendra alors contact avec vous dans les meilleurs délais pour s'entretenir avec vous et vous proposer une première rencontre.</p>

    <form action="" method="POST" class="col-md-8 col-md-offset-2">
      <input class="col-md-4" type="text" placeholder="Nom" name="nom" required>
      <input class="col-md-4" type="text" placeholder="Prénom" name="prenom" required>
      <input class="col-md-4" type="text" placeholder="Email" name="email" required>
      <input class="col-md-4" type="text" placeholder="Téléphone" name="telephone" required>
      <input class="col-md-4" type="text" placeholder="Ville de résidence" name="city" required>
        <select name="test" class="col-md-4">
          <option selected="true" disabled="disabled" id="default">Connu par</option>
          <option value="Annonce emploi">Annonce d'emploi</option>
          <option value="Amis/famille">Amis/famille</option>
          <option value="Publicité facebook">publicité Facebook</option>
          <option value="Ecole/Université">Ecole/université</option>
          <option value="Autre Edgar">Autre Edgar</option>
        </select>
      <input type="submit" class="col-md-4 btn btn-success" value="Envoyer">
    </form>
  </div>
</div>

<?php 

extract($_POST);

if (isset($_POST) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['telephone']) && isset($_POST['test']) && isset($_POST['city']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['telephone']) && !empty($_POST['test']) && !empty($_POST['city'])) {

  $day = date('d/m/Y');
  $hour = date("H:i:s");
  $date = "$hour le $day";

  $query = $link->query("SELECT * FROM Become_Edgar WHERE email='$_POST[email]' || telephone='$_POST[telephone]'");
  $row = $query->fetch_object();

  if ($row) {
  echo "<script>alert(\"l'adresse e-mail ou le numéro de téléphone est déja utilisée, veuillez ré-essayer\")</script>";
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?devenir_edgar'>";
  }

  else{

  $link->query("INSERT INTO Become_Edgar(nom,prenom,email,telephone,city,media) VALUES ('$nom','$prenom','$email','$telephone','$city','$test')")or die("Erreur SQL");

  echo "<script>alert(\"Merci à vous, votre demande sera traitée dans les plus brefs délais\")</script>";
  echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?devenir_edgar'>";

  require "PHPMailer/class.phpmailer.php";

      // Envoi à l'utilisateur
      $mail = new phpmailer();
      $mail->IsHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->FromName = 'Edgar Club - Votre inscription ';
      $mail->Subject = "$email";

      $mail->Body = "<body style='color: #6D6E72'>
        <div style='padding: 5%; font-family: caviar; background-color: #E7E7E7; color: #6d6e72'>
          <div style='background-color: white; padding: 4%'>
            <h1 style='color: #ff0000; text-align: center; margin: 0% ; font-family: Verdana; font-size: 4vw'>Edgar Club</h1>
            <h2 style='color: #000; text-align: center; margin: 0% ; font-family: Verdana; font-size: 2vw'>Votre inscription</h2>
            <p style='text-align: justify ;color: #6D6E72; Margin-top: 7%; font-family: -webkit-body; font-size: 1.3vw'><strong>Nous avons bien recu votre demande, et celle-ci sera traité dans les plus brefs délais. Voici les informations que vous nous avez laissées lors de votre inscription : </strong></p>
            <div style='text-align: justify; padding: 2%; Margin-top: 4%; color: #6d6e72; font-size: 1.3vw'>- Nom : $nom <br>
            - Prénom : $prenom <br>
            - Email : $email <br>
            - Téléphone : $telephone <br>
            - Ville : $city <br>
            - Vous avez connu le site par : $test <br>
            </div>
          </div>
        </div>
      </body>";
      $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
      $mail->AltBody = $txt; 

      $mail->AddAddress("$email");
      $mail->Send();


      // Envoi à l'Admin
      $mail = new phpmailer();
      $mail->IsHTML(true);
      $mail->CharSet = 'UTF-8';
      $mail->From = str_shuffle(0123456789);
      $mail->FromName = 'Devenir Edgar / Postulant';
      $mail->Subject = "$email";

      $mail->Body = "<body style='color: #6D6E72'>
      <div style='padding: 5%; font-family: caviar; background-color: #E7E7E7; color: #6d6e72'>
        <div style='background-color: white; padding: 4%'>
          <h1 style='color: #ff0000; text-align: center; margin: 0% ; font-family: Verdana; font-size: 4vw'>Edgar Club</h1>
          <h2 style='color: #000; text-align: center; margin: 0% ; font-family: Verdana; font-size: 2vw'>Devenir Edgar - Nouveau postulant</h2>
          <p style='text-align: justify ;color: #6D6E72; Margin-top: 7%; font-family: -webkit-body; font-size: 1.3vw'><strong>Une nouvelle personne souhaite devenir Edgar, vous trouverez ci dessous ses informations.</strong></p>
  
          <div style='text-align: justify; padding: 2%; Margin-top: 4%; color: #6d6e72; font-size: 1.3vw'>- Nom : $nom <br />
          - Prénom : $prenom <br />
          - Email : $email <br />
          - Téléphone : $telephone <br />
          - Ville : $city <br />
          - Connu le site par : $test <br /></div>

          <p style='text-align: center; padding: 2%; border: 1px #C5C5C5 solid; Box-shadow: 0 0 10px 1px #C5C5C5; Margin-top: 3%; color: #6d6e72; font-size: 1.3vw'>Guillaume :<br /><a href='' style='font-size: 1vw'>http://www.edgarclub.com/index.php?token_access=8cs7tae2amt14c9m6oavlnu035&identifiant=Guillaume</a></p>
          <p style='text-align: center; padding: 2%; border: 1px #C5C5C5 solid; Box-shadow: 0 0 10px 1px #C5C5C5; Margin-top: 3%; color: #6d6e72; font-size: 1.3vw'>Jean-carles :<br /><a href='' style='font-size: 1vw'>http://www.edgarclub.com/index.php?token_access=8cs7tae2amt14c9m6oavlnu035&identifiant=Jean-carles</a></p>
        </div>
      </div>
      </body>";

      $txt='This email was sent in HTML format. Please make sure your preferences allow you to view HTML emails.'; 
      $mail->AltBody = $txt; 

      $mail->AddAddress("pixofheaven@gmail.com");
      $mail->Send();
  }
 
}


 ?>