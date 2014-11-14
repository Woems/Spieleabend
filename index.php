<?php
  if (!file_exists("config/config.php")) die("Konfigurationsdatei nicht vorhanden");
  //ini_set('display_errors', true);
  //error_reporting(E_ALL);
  require_once("config/config.php");
  require_once("libs/liblogin.php");
  require_once("libs/libtemplate.php");
  require_once("libs/libmails.php");

  $user=new Login($db);
  $t=new Template();
  $t->add("title", "Spieleabend");

  if (!$user->validate())
  {
    $t->header("header_login");
    $t->body("teaser");
  } else {
    $t->add("user", $user);
    $mail = new Mails($db,$user->getID());
    $t->add("inbox_count",$mail->count("inbox"));
    $t->header("header_menu");
    if (!isset($_GET["Action"])) $_GET["Action"]="";
    switch ($_GET["Action"]) {
      case 'Profil':
        $t->add("iam",$user->get());
        $t->body("profil");
        break;
      case 'Inbox':
        //$mail = new Mails($db,$user->getID());
        //$mail->sendMail($login->getID(), "Testmail", "Dies ist eine Testmail");
        $t->add("pretty",array("inbox" => "Posteingang", "sent"=>"Gesendet"));
        $t->add("mails",$mail->getMails());
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
