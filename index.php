<?php
  if (!file_exists("config/config.php")) die("Konfigurationsdatei nicht vorhanden");
  //ini_set('display_errors', true);
  //error_reporting(E_ALL);
  require("libs/login.php");
  require("libs/template.php");
  require_once("config/config.php");

  $user=new Login($db);
  $title="Spieleabend";
  $t=new Template();

  if (!$user->validate())
  {
    $t->header("header_login");
    $t->body("teaser");
  } else {
    $t->header("header_menu");
    if (!isset($_GET["Action"])) $_GET["Action"]="";
    switch ($_GET["Action"]) {
      case 'Profil':
      $t->add("iam",$user->get());
  		$t->body("profil");
  		break;
  	case 'Inbox':
  		$t->body("inbox");
  		break;
  	case 'Config':
  		$t->body("config");
  		break;
  	default:
  		$t->body("main");
  		break;
    }
  }
  $t->run();
?>
