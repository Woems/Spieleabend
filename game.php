<?php
  //ini_set('display_errors', true);
  //error_reporting(E_ALL);
  require_once("libs/libtemplate.php");
  require_once("libs/liblogin.php");
  require_once("config/config.php");
  require_once("libs/libgame.php");

  $user = new Login($db);
  $t = new Template();
  $t->add("title","Spieleabend");
  $t->add("user",$user);
  $games = new Game($db);

  if (!$user->validate())
  {
    $t->header("header_login");
    $t->body("teaser");
  } else if (isset($_GET['s'])) {
    if (isset($_GET['t']) && $_GET['t']=="own")
      $t->add("usergames",$games->byUserName($user->getID(), "%".$_GET['s']."%"));
    else
      $t->add("usergames",$games->byName("%".$_GET['s']."%"));
    $t->header("header_menu");
    $t->body("games");
  } else if (isset($_GET['id'])) {
    $t->add("game",$games->byID($_GET['id']));
    $t->header("header_menu");
    $t->body("game");
  } else if (isset($_GET['user'])) {
    $t->add("usergames",$games->byUser($_GET['user']));
    $t->header("header_menu");
    $t->body("games");    
  } else {
    $t->add("usergames",$games->all());
    $t->header("header_menu");
    $t->body("games");
  }
  $t->run();
?>
