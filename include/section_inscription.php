<?php 

require_once('php/stripe/config.php'); 

if (isset($_GET['error']) && !empty($_GET['error'])){
	echo "<script>alert(\"L'adresse e-mail ou le numero de téléphone est déja utilisé !\")</script>";
	if (isset($_GET['offre'])) {
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?inscription&offe=$_GET[offre]'>";
	}
	else{
	echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php?inscription'>";
	}
} 
	

// Si offre choisis
elseif (isset($_GET['inscription']) && isset($_GET['offre'])) {
	if (($_GET['offre']) == "home" || ($_GET['offre']) == "sweet_home" || ($_GET['offre']) == "sweet_home_plus") { ?>

<div id="home_switch">
	<img src="images/icons/closeButton.png">
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<form method="POST" action=<?php echo "php/redirect_master.php?offre=$_GET[offre]"; ?> class="col-md-8 col-md-offset-2 sign_up" id="inscription_form">
		<h1>Edgar, pour vous servir</h1>
		<p>Je suis ravi de faire votre connaissance.</p>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Nom *" name="nom" required>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Prénom *" name="prenom" required>
		<input class="input col-md-4 col-md-offset-1" type="email" placeholder="Adresse e-mail *" name="email" required>
		<input class="input col-md-4 col-md-offset-1" type="telephone" placeholder="Téléphone *" name="telephone" required>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Ville *" name="city" required>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Code postal *" name="zip_code" required>
		<input class="input col-md-9 col-md-offset-1" type="text" placeholder="Adresse postale *" name="adresse" required />
        <input type="hidden" value="">
        <button class="btn-submit col-md-4 col-md-offset-4 col-sm-12 col-xs-12">Valider</button>
    </form>
</div>

<div class="col-md-8 col-md-offset-2 home">
	<h4>Retourner à l'accueil ?</h4>
	<center>
	<a href="index.php">
	<button class="btn btn-accept">Oui</button></a>
	<a href="">
	<button class="btn btn-refuse home_switch">Non</button></a>
	</center>
</div>


<?php } }


// Si offre à la carte

	if (($_GET['offre']) == "vip_card") { ?>

<div id="home_switch">
	<img src="images/icons/closeButton.png">
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<form method="POST" action=<?php echo "php/redirect_master.php?offre=$_GET[offre]"; ?> class="col-md-8 col-md-offset-2 sign_up" id="inscription_form">
		<h1>Edgar, pour vous servir</h1>
		<p>Je suis ravi de faire votre connaissance.</p>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Nom *" name="nom" required>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Prénom *" name="prenom" required>
		<input class="input col-md-4 col-md-offset-1" type="email" placeholder="Adresse e-mail *" name="email" required>
		<input class="input col-md-4 col-md-offset-1" type="telephone" placeholder="Téléphone *" name="telephone" required>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Ville *" name="city" required>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Code postal *" name="zip_code" required>
		<input class="input col-md-9 col-md-offset-1" type="text" placeholder="Adresse postale *" name="adresse" required />
        <button class="btn-submit col-md-4 col-md-offset-4 col-sm-12 col-xs-12">Valider</button>
    </form>
</div>

<div class="col-md-8 col-md-offset-2 home">
	<h4>Retourner à l'accueil ?</h4>
	<center>
	<a href="index.php">
	<button class="btn btn-accept">Oui</button></a>
	<a href="">
	<button class="btn btn-refuse home_switch">Non</button></a>
	</center>
</div>

<?php }


// Si appuyer sur navbar

elseif (isset($_GET['inscription']) && !isset($_GET['offre'])) { ?>

<div id="home_switch">
	<img src="images/icons/closeButton.png">
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<form method="POST" action="php/redirect_master.php" class="col-md-8 col-md-offset-2 sign_up" id="inscription_form">
		<h1>Edgar, pour vous servir</h1>
		<p>Je suis ravi de faire votre connaissance.</p>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Nom *" name="nom" required>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Prénom *" name="prenom" required>
		<input class="input col-md-4 col-md-offset-1" type="email" placeholder="Adresse e-mail *" name="email" required>
		<input class="input col-md-4 col-md-offset-1" type="telephone" placeholder="Téléphone *" name="telephone" required>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Ville *" name="city" required>
		<input class="input col-md-4 col-md-offset-1" type="text" placeholder="Code postal *" name="zip_code" required>
		<input class="input col-md-9 col-md-offset-1" type="text" placeholder="Adresse postale *" name="adresse" required />
        <input type="hidden" value="">
        <button class="btn-submit col-md-4 col-md-offset-4 col-sm-12 col-xs-12">Valider</button>
    </form>
</div>

<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12 home">
	<h4>Retourner à l'accueil ?</h4>
	<center>
	<a href="index.php">
	<button class="btn btn-accept">Oui</button></a>
	<a href="">
	<button class="btn btn-refuse home_switch">Non</button></a>
	</center>
</div>


<?php } else{

}