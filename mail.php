<?php
  //ini_set('display_errors', true);
  //error_reporting(E_ALL);
  require_once("libs/template.php");
  require_once("libs/login.php");
  require_once("config/config.php");
  //require_once("libs/mail.php");

  $user = new Login($db);
  $t = new Template();
  $t->add("title","Spieleabend");
  $t->add("user",$user);
  //$mail = new Mail($db);

  if (!$user->validate())
  {
    $t->header("header_login");
    $t->body("teaser");
  } else {
    $mail = new Mail($db,$login->getID());
    echo "SENDE MAIL";
    //$mail->sendMail($login->getID(), "Testmail", "Dies ist eine Testmail");
    echo "GESENDET";
    $tmp = $mail->getMails();
    $mails = array("inbox"->array(), "send"->array());
    foreach ($tmp as $row)
    {
      if (!isset($mails[$row["folder"]])) $mails[$row["folder"]]=array();
      aŕray_push($mails[$row["folder"]], $row);
    }
    $t->add("mails",$mails);
    $t->header("header_menu");
    $t->body("mail");
  }
  $t->run();
?>
