            <div class="col-md-12 content_presentation" id="content_presentation">
                <div class="box">
                    <h2><?php if(!empty($_COOKIE['Prenom'])){echo $_COOKIE['Prenom'];} else{ echo "Rencontrez Edgar"; } ?></h2>
                    <?php if (!empty($_COOKIE['Prenom'])) { ?>
                        <p>Ravi de vous revoir !</p>
                    <?php } else{ ?>
                    <p>Ravi de faire votre connaissance !</p>
                    <?php } ?>
                    <p>Je suis Edgar, votre majordome personnel. Je suis l'outil intelligent qui prend en charge à votre place, vos démarches et corvées du quotidien. Je viens chez vous pour effectuer les tâches ménagères que vous n'avez ni le goût, ni le temps de faire vous-même (rangement, vaisselle, courses, pressing, Poste...).</p>
                    <p>Imaginez déjà tout ce que vous pourrez faire avec le temps que je vais vous faire gagner : quelques instants de plus en amoureux, quelques pages de plus de votre roman préféré, quelques kilomètres de plus pour votre jogging.</p>
                </div>
            </div>

            <div class="container">
                <div class="col-md-12" id="content_heading">

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="heading-block topmargin">
                            <h1>VOTRE MAJORDOME PERSONNEL.</h1>
                        </div>  
                        <p class="lead">Envoyez-moi un mail ou un texto avec ce que vous souhaitez que je fasse et retrouvez votre sweet home avec bonheur.</p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <img class="fade_in_homepage" src="images/Testrendu.png" alt="Carte de visite">
                    </div>
                </div>
            </div>

                <div class="clearfix_pricing" id="pricing">
                    <img src="images/icons/reduction.png" class="badge_reduction">
                    <div class="container pricing bottommargin clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="pricing-box">
                                <?php if ($row_cookie->formule == "home"){
                                    $light = "light";
                                } elseif ($row_cookie->formule == "sweet_home"){
                                    $light_sweet = "light";
                                } elseif ($row_cookie->formule == "sweet_home_plus"){
                                    $light_plus = "light";
                                } else{
                                    $light = "";
                                    $light_sweet = "";
                                    $light_plus = "";
                                }?>
                                <div class="pricing-title" id="<?php echo $light ?>" >
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
                                        <li>Remise en ordre du logement</li>
                                        <li>Cuisine propre</li>
                                        <li>Vaisselle faite</li>
                                        <li>Ordures ménagères sorties</li>
                                        <li>Lits faits</li>
                                        <li>Logement ventilé</li>
                                        <li>Litière changée le cas échéant</li>
                                    </ul>
                                </div>
                                <div class="pricing-action-default">
                                    <a href=<?php echo "php/redirect_master.php?inscription&offre=home"; ?> class="btn btn-danger btn-block btn-lg">Commencer</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                             <div class="pricing-box">
                                <div class="pricing-title" id="<?php echo $light_sweet ?>">
                                    <h3>Formule Sweet Home</h3>
                                </div>
                                <div class="pricing-price">
                                    25<span class="price-unit">&euro;</span><span class="price-tenure">/semaine</span>
                                    <p>Soit 12,50€ après réduction au crédit d'impôt</p>
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <h5>1 VISITE / SEMAINE</h5>
                                        <h5>Cette offre contient les services de la formule <strong>Home</strong>, et :</h5>
                                        <li>Courses élémentaires (10 articles max)</li>
                                        <li>Blanchisserie</li>
                                        <li>Pressing</li>
                                        <li>Prise de rendez-vous</li>
                                        <li>Expédition de courrier à la Poste</li>
                                        <li>Réparation de chaussures (cordonnerie)</li>
                                        <li>Pharmacie</li>
                                        <li>Envoi de fleurs</li>
                                        <li>Et bien d'autres !</li>
                                    </ul>
                                </div>
                                <div class="pricing-action-default">
                                    <a href=<?php echo "php/redirect_master.php?inscription&offre=sweet_home"; ?> class="btn btn-danger btn-block btn-lg" name="sweet_home">Commencer</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                            <div class="pricing-box">
                                <div class="pricing-title" id="<?php echo $light_plus ?>">
                                    <h3>Formule Sweet Home +</h3>
                                </div>
                                <div class="pricing-price">
                                    45<span class="price-unit">&euro;</span><span class="price-tenure">/semaine</span>
                                    <p>Soit 22,50€ après réduction au crédit d'impôt</p>
                                </div>
                                <div class="pricing-features">
                                    <ul>
                                        <h5>2 VISITES / SEMAINE</h5>
                                        <h5>Cette offre contient les services de la formule <strong>Sweet Home</strong>, et :</h5>
                                        <li>Courses 2 fois par semaine</li>
                                        <li>Linge retourné la même semaine</li>
                                    </ul>
                                </div>
                                <div class="pricing-action-default">
                                    <a href=<?php echo "php/redirect_master.php?inscription&offre=sweet_home_plus"; ?> class="btn btn-danger btn-block btn-lg">Commencer</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <p class="questions">Des questions sur le fonctionnement ? Trouvez vos réponses <a href="index.php?faq">ici</a></p>
                </div>

                <div class="col-md-12 col-sm-12 section_edgar_carte">
                    <h3>Edgar à la carte</h3>
                    <div class="col-md-6 col-md-offset-3">
                    <p>Besoin de faire garder vos enfants, de réserver une place de théâtre, une table au restaurant, de faire envoyer des fleurs ? Quelque soit votre demande, je me plierai en quatre pour vous donner satisfaction.</p>
                    </div>
                    <a href=<?php echo "php/redirect_master.php?inscription&offre=vip_card"; ?>>
                    <button class="btn btn-danger btn-lg col-md-2 col-md-offset-5">Demander</button>
                    </a>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 section_edgar_services" id="services">
                        <h3>Edgar s'en occupe</h3>
                        <h4>Edgar vous facilite le quotidien</h4>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><img src="images/icons/condiments.png">
                        <h5>Courses</h5>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><img src="images/icons/laundry.png">
                        <h5>Lavage</h5>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><img src="images/icons/dry_cleaning.png">
                        <h5>Repassage</h5>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><img src="images/icons/home_cleaning.png">
                        <h5>Nettoyage intérieur</h5>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><img src="images/icons/tailoring.png">
                        <h5>Couturier</h5>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><img src="images/icons/packages.png">
                        <h5>Poste</h5>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><img src="images/icons/pharmacy.png">
                        <h5>Pharmacie</h5>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3"><img src="images/icons/special_request.png">
                        <h5>Requêtes spéciales</h5>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <p>Plus vous utilisez Edgar, plus il vous connaît. Edgar va anticiper vos besoins, apprendre vos habitudes pour être le majordome que vous aviez toujours rêvé d'avoir.</p>
                        <a href="index.php?inscription">
                        <button class="btn btn-danger btn-lg">Commencer</button></a>
                    </div>
                </div>