<?php 

$link = new mysqli("edgarclutjgwen.mysql.db","edgarclutjgwen","Edgarclub01","edgarclutjgwen")or die("Erreur connexion"); 

$query_cookie = $link->query("SELECT * FROM Inscription WHERE prenom='$_COOKIE[Prenom]'");
$row_cookie = $query_cookie->fetch_object();

?>