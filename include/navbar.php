<?php if (isset($_GET['faq']) || isset($_GET['devenir_edgar']) || isset($_GET['conditions_generales']) || isset($_GET['mentions_legales'])) { ?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Edgar<?php if (!empty($_COOKIE["Prenom"])){ echo "<span>, bonjour $_COOKIE[Prenom]</span>"; } ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php#content_presentation">Rencontrez Edgar</a></li>
        <li><a href="index.php#services">Nos Services</a></li>
        <li><a href="index.php#pricing">Nos tarifs</a></li>
        <li><a href="php/redirect_master.php?inscription">Commencez</a></li>
        <li><a href="index.php?devenir_edgar">Devenir Edgar</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php } else{ ?>

  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        
      <a class="navbar-brand" href="index.php">Edgar<?php if (!empty($_COOKIE["Prenom"])){ echo "<span>, bonjour $_COOKIE[Prenom]</span>"; } ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#content_presentation">Rencontrez Edgar</a></li>
        <li><a href="#services">Nos Services</a></li>
        <li><a href="#pricing">Nos tarifs</a></li>
        <li><a href="php/redirect_master.php?inscription">Commencez</a></li>
        <li><a href="index.php?devenir_edgar">Devenir Edgar</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php } ?>