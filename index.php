<?php
  if (!file_exists("config/config.php")) die("Konfigurationsdatei nicht vorhanden");
  //ini_set('display_errors', true);
  //error_reporting(E_ALL);
  require_once("config/config.php");
  require_once("libs/login.php");
  require_once("libs/template.php");
  require_once("libs/mail.php");

  $user=new Login($db);
  $t=new Template();
  $t->add("title", "Spieleabend");

  if (!$user->validate())
  {
    $t->header("header_login");
    $t->body("teaser");
  } else {
    $t->add("user", $user);
    $t->header("header_menu");
    if (!isset($_GET["Action"])) $_GET["Action"]="";
    switch ($_GET["Action"]) {
      case 'Profil':
        $t->add("iam",$user->get());
        $t->body("profil");
        break;
      case 'Inbox':
        $mail = new Mails($db,$user->getID());
        //$mail->sendMail($login->getID(), "Testmail", "Dies ist eine Testmail");
        $tmp = $mail->getMails();
        $mails = array("inbox"=>array(), "send"=>array());
        foreach ($tmp as $row)
        {
          if (!isset($mails[$row["folder"]])) $mails[$row["folder"]]=array();
          aŕray_push($mails[$row["folder"]], $row);
        }
        $t->add("mails",$mails);
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
