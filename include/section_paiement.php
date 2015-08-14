<?php require_once('php/stripe/config.php'); ?>

<!-- Condition si l'offe est déja choisie' -->

<?php 

if (isset($_GET['offre'])) { ?>
<div class="col-md-12">


    <?php switch ($_GET['offre']) {
    case 'home': ?>
            <a href="">
<button class="btn btn-accueil button_switcher" type="submit">Accueil</button></a>
    <h1 class="h1_switcher">Edgar, pour vous servir</h1>
    <h2 class="h2_switcher">Je suis ravi de faire votre connaissance.</h2>
    <form action=<?php echo "php/redirect_master.php?finalisation_offre=$_GET[acces_paiement]&id=$_GET[string]"; ?> class="sign_up" id="inscription_form" method="POST">
        <div class="col-md-4 col-md-offset-4 offer_only">
            <div class="pricing-box">
                <div class="pricing-title">
                    <h3>Formule Home</h3>
                </div>
                <div class="pricing-price">
                    18<span class="price-unit">&euro;</span><span class="price-tenure">/semaine</span>
                    <p>Soit 9€ après réduction au crédit d'impôt</p>
                </div>
                <div class="pricing-features">
                    <ul>
                        <h5>1 VISITE / SEMAINE</h5>
                        <h5>Cette offre contient les services suivants :</h5>
                        <li>Lit fait</li>
                        <li>Poubelles sorties</li>
                        <li>Vaisselles propre</li>
                        <li>Cuisine nettoyée</li>
                        <li>Rangement</li>
                    </ul>
                </div>
                <input type="hidden" value="home" name="offre">
                <div class="btn-lg btn-danger btn_switcher_home">Commencer</div>     
            </div>
        </div>
        <?php include "section_explication.php"; ?>
        <div class="pricing-action" id="home">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" name="offre"
  data-key="<?php echo $stripe['publishable_key']; ?>" data-name="Edgar Club"
  data-amount="1800" data-panel-label="Payer" data-currency="eur" data-description="Formule Home" data-allow-remember-me="false"></script>
        </div>
    </form>
    <?php break;
    case 'sweet_home': ?>
            <a href="">
<button class="btn btn-accueil button_switcher" type="submit">Accueil</button></a>
    <h1 class="h1_switcher">Edgar, pour vous servir</h1>
    <h2 class="h2_switcher">Je suis ravi de faire votre connaissance.</h2>
    <form action=<?php echo "php/redirect_master.php?finalisation_offre=$_GET[acces_paiement]&id=$_GET[string]"; ?> class="sign_up" id="inscription_form" method="POST">
        <div class="col-md-4 col-md-offset-4 offer_only">
             <div class="pricing-box">
                <div class="pricing-title">
                    <h3>Formule Sweet Home</h3>
                </div>
                <div class="pricing-price">
                    25<span class="price-unit">&euro;</span><span class="price-tenure">/semaine</span>
                    <p>Soit 12,50€ après réduction au crédit d'impôt</p>
                </div>
                <div class="pricing-features">
                    <ul>
                        <h5>1 VISITE / SEMAINE</h5>
                        <h5>Cette offre contient les services de la formule <strong>Horizon</strong>, et :</h5>
                        <li>Courses dans votre frigo</li>
                        <li>Dépôt de linge au pressing</li>
                        <li>Démarches administratives</li>
                        <li>Prise de rendez-vous</li>
                        <li>Courrier à la Poste</li>
                        <li>Cordonnier</li>
                        <li>Pharmacie</li>
                        <li>Et bien d'autres...</li>
                    </ul>
                </div>
                <input type="hidden" value="sweet_home" name="offre">
                <div class="btn-lg btn-danger btn_switcher_sweethome">Commencer</div>     
            </div>
        </div>
        <?php include "section_explication.php"; ?>
        <div class="pricing-action" id="sweethome">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" name="offre"
  data-key="<?php echo $stripe['publishable_key']; ?>" data-name="Edgar Club"
  data-amount="2500" data-panel-label="Payer" data-currency="eur" data-description="Formule Sweet Home" data-allow-remember-me="false"></script>
        </div>
    </form>
    <?php break;
    case 'sweet_home_plus' : ?>
            <a href="">
<button class="btn btn-accueil button_switcher" type="submit">Accueil</button></a>
    <h1 class="h1_switcher">Edgar, pour vous servir</h1>
    <h2 class="h2_switcher">Je suis ravi de faire votre connaissance.</h2>
    <form action=<?php echo "php/redirect_master.php?finalisation_offre=$_GET[acces_paiement]&id=$_GET[string]"; ?> class="sign_up" id="inscription_form" method="POST">
        <div class="col-md-4 col-md-offset-4 offer_only">
            <div class="pricing-box">
                <div class="pricing-title">
                    <h3>Formule Sweet Home +</h3>
                </div>
                <div class="pricing-price">
                    45<span class="price-unit">&euro;</span><span class="price-tenure">/semaine</span>
                    <p>Soit 22,50€ après réduction au crédit d'impôt</p>
                </div>
                <div class="pricing-features">
                    <ul>
                        <h5>2 VISITES / SEMAINE</h5>
                        <h5>Cette offre contient les services de la formule <strong>Zenith</strong>, et :</h5>
                        <li>Courses 2 fois par semaine</li>
                        <li>Linge retourné la même semaine</li>
                        <li>Réapprovisionnement automatique des produits courants</li>
                    </ul>
                </div>
                <input type="hidden" value="sweet_home_plus" name="offre">
                <div class="btn-lg btn-danger btn_switcher_sweethomeplus">Commencer</div>     
            </div>
        </div>
        <?php include "section_explication.php"; ?>
        <div class="pricing-action" id="sweethomeplus">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" name="offre"
  data-key="<?php echo $stripe['publishable_key']; ?>" data-name="Edgar Club"
  data-amount="4500" data-panel-label="Payer" data-currency="eur" data-description="Formule Sweet Home Plus" data-allow-remember-me="false"></script>
        </div>
    </form>
    <?php break;
    case 'vip_card' : ?>
            <a href="">
<button class="btn btn-accueil button_switcher" type="submit">Accueil</button></a>
    <h1 class="h1_switcher">Edgar, pour vous servir</h1>
    <h2 class="h2_switcher">Que puis-je faire pour vous ?</h2>
    <p class="p_switcher">Dites-moi ce que je peux faire pour vous.<br> Notre service client vous rappelle au plus vite.</p>
    <form action=<?php echo "php/redirect_master.php?offre=$_GET[offre]&id=$_GET[string]"; ?> class="sign_up" id="inscription_form" method="POST">
        <textarea name="request" class="col-md-4 col-md-offset-4 col-sm-12 col-xs-12" placeholder="Ecrivez votre requête"></textarea>
   <button class="btn-submit col-md-2 col-md-offset-5 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">Valider</button>
    </form>
    <?php break;
    case 'vip_card_requete' : ?>
            <a href="">
<button class="btn btn-accueil button_switcher" type="submit">Accueil</button></a>
    <h1 class="h1_switcher">Edgar, pour vous servir</h1>
    <h2 class="h2_switcher">Je suis ravi de faire votre connaissance.</h2>
    <form action=<?php echo "php/redirect_master.php?finalisation_offre=$_GET[acces_paiement]&id=$_GET[string]&requete"; ?> class="sign_up" id="inscription_form" method="POST">
        <?php include "section_explication.php"; ?>
        <div class="col-md-4 col-md-offset-4 offer_only" style="margin-bottom: 4%">
            <div class="pricing-box">
                <div class="pricing-title">
                    <h3>Offre à la carte</h3>
                </div>
                <div class="pricing-features">
                    <ul>
                        <h5>Votre requête :</h5>
                        <?php $query = $link->query("SELECT * FROM Inscription WHERE id_crypt='$_GET[acces_paiement]' AND id_crypt_1='$_GET[string]'");
                            $row = $query->fetch_object();
                         ?>
                        <li><?php echo "$row->request"; ?></li>
                        <input type="tel" maxlength="16" placeholder="Numero de carte *" name="card_number" required>
                        <input type="tel" maxlength="7" placeholder="Date d'expiration *" name="expiration" required>
                        <input type="tel" maxlength="3" placeholder="Cryptogramme visuel *" name="cryptogramme" required>
                    </ul>
                </div>
                <input type="hidden" value="vip_card" name="offre">
                <button class="btn-lg btn-danger btn_switcher_vipcard">Commencer</button>     
        </div>
    </div>
    </form>
    <?php break;
    default:
        echo "false";
        break;
    }
}

if (isset($_GET['acces_paiement']) && isset($_GET['string']) && !empty($_GET['acces_paiement']) && !empty($_GET['string']) && !isset($_GET['offre'])) { ?>

<div class="col-md-12">
    <a href="">
<button class="btn btn-accueil button_switcher" type="submit">Accueil</button></a>
    <h1 class="h1_switcher">Edgar, pour vous servir</h1>
    <h2 class="h2_switcher">Je suis ravi de faire votre connaissance.</h2>

<form action=<?php echo "php/redirect_master.php?finalisation_offre=$_GET[acces_paiement]&id=$_GET[string]"; ?> class="sign_up" id="inscription_form" method="POST">
        <?php include "offre_home.php"; ?>
        <?php include "section_explication.php"; ?>
        <div class="pricing-action" id="home">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" name="offre"
  data-key="<?php echo $stripe['publishable_key']; ?>" data-name="Edgar Club"
  data-amount="1800" data-panel-label="Payer" data-currency="eur" data-description="Formule Home" data-allow-remember-me="false"></script>
        </div>
</form>

<form action=<?php echo "php/redirect_master.php?finalisation_offre=$_GET[acces_paiement]&id=$_GET[string]"; ?> class="sign_up" id="inscription_form" method="POST">
    <?php include "offre_sweethome.php"; ?>
    <?php include "section_explication.php"; ?>
    <div class="pricing-action" id="sweethome">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
  data-key="<?php echo $stripe['publishable_key']; ?>" data-name="Edgar Club"
  data-amount="2500" data-panel-label="Payer" data-currency="eur" data-description="Formule Sweet Home" data-allow-remember-me="false"></script>
    </div>
</form>
<form action=<?php echo "php/redirect_master.php?finalisation_offre=$_GET[acces_paiement]&id=$_GET[string]"; ?> class="sign_up" id="inscription_form" method="POST">
    <?php include "offre_sweethomeplus.php"; ?>
    <?php include "section_explication.php"; ?>
    <div class="pricing-action" id="sweethomeplus">
                <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
  data-key="<?php echo $stripe['publishable_key']; ?>" data-name="Edgar Club"
  data-amount="4500" data-panel-label="Payer" data-currency="eur" data-description="Formule Sweet Home +" data-allow-remember-me="false"></script>
    </div>
</form>
<form action=<?php echo "php/redirect_master.php?offre=vip_card"; ?> class="sign_up" id="inscription_form" method="POST">
    <div class="col-md-3" id="price-switcher">
        <div class="pricing-box">
            <div class="pricing-title">
                <h3>Formule à la carte</h3>
            </div>
            <div class="pricing-price">
                <span class="price-unit sur_demande">Sur demande</span>
            </div>
            <div class="pricing-features">
                <ul>
                    <h5 class="card_description">Besoin de faire garder vos enfants, de réserver une place de théâtre, une table au restaurant, de faire envoyer des fleurs ? Quelque soit votre demande, je me plierai en quatre pour vous donner satisfaction.</h5>
                </ul>
            </div>
            <input type="hidden" value="vip_card" name="offre">
            <?php $query = $link->query("SELECT * FROM Inscription WHERE id_crypt='$_GET[acces_paiement]' AND id_crypt_1='$_GET[string]'");
            $row = $query->fetch_object(); ?>
            <a href="<?php echo "index.php?acces_paiement=$row->id_crypt&string=$row->id_crypt_1&offre=vip_card"; ?>"><div class="btn-lg btn-danger">Commencer</div></a>
        </div>
    </div>
    <?php include "section_explication.php"; ?>
</form>
</div>

<?php } ?>