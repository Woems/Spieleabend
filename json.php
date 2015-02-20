<?php
  ini_set('display_errors', true);
  error_reporting(E_ALL);
  echo "RUNS";
  require_once("libs/liblogin.php");
  require_once("config/config.php");
  require_once("libs/libmails.php");

  $user = new Login($db);
  $mail = new Mails($db);

  $json=array();
  if (!$user->validate())
  {
    $json["Error"] = "Please Login";
  } else if (isset($_GET["folder"]))
  {
    $mail->setOwner($user->getID());
    $json["Mails"] = $mail-getMailsByFolder($_GET["folder"]);
  }
  else
  {
    $mail->setOwner($user->getID());
    $json["Mails"] = $mail->getMails();
  }
  echo json_encode($json);
?>
