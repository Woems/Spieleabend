<?php
  //ini_set('display_errors', true);
  //error_reporting(E_ALL);
  require("libs/login.php");
  if (!isset($user["name"]) || $user["name"]=="")
  {
    $title="Spieleabend";
    require("templates/header_login.php");
    require("templates/body_teaser.php");
    require("templates/footer.php");
    exit();
  }
  $title="Spieleabend";
  require("templates/header_menu.php");
  require("templates/body.php");
  require("templates/footer.php");
  echo "lol";
?>
