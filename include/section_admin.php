<?php 
  
$query = $link->query("SELECT * FROM Inscription");

?>


<div class="container">
  <div class="col-md-12">
    <h1>Bienvenue <span><?php echo $user; ?></span></h1>
    <h2>Voici la liste des inscrits : </h2>
    <img class="loading" src="images/icons/loading.GIF">
<?php while ($row = $query->fetch_object()) {

    switch ($row->formule) {
        case 'home':
          $formule = "Home";
          $amount = 18;
          break;
        case 'sweet_home':
          $formule = "Sweet Home";
          $amount = 25;
          break;
        case 'sweet_home_plus':
          $formule = "Sweet Home +";
          $amount = 45;
          break;
        case 'vip_card':
          $formule = "A la carte";
          break;
        default:
          $formule = "Aucune offre :(";
            $amount = "";
          break;
      }

 ?>

    <ul class="box_admin col-md-4">
      <li><span>Identifiant : </span><?php echo $row->id; ?></li>
      <li><span>Paiement : </span><?php echo $row->paiement; ?></li>
      <?php if ($row->paiement == "Oui") { ?>
      <li><span>Somme : </span><?php echo $amount.' €'; ?></li>
      <?php } ?>
      <li><span>Nom : </span><?php echo $row->nom; ?></li>
      <li><span>Prénom : </span><?php echo $row->prenom; ?></li>
      <li><span>Email : </span><?php echo $row->email; ?></li>
      <li><span>Téléphone : </span><?php echo $row->telephone; ?></li>
      <li><span>Ville : </span><?php echo $row->city; ?></li>
      <li><span>Code postal : </span><?php echo $row->zip_code; ?></li>
      <li><span>Adresse : </span><?php echo $row->adresse; ?></li>
      <li><span>Formule choisie : </span><?php echo $formule; ?></li>
      <li><span>Inscrit le : </span><?php echo $row->date; ?></li>
    </ul>

<?php } ?>

  </div>
</div>