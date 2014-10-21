<?php
  session_start();
  $user=array( name=>"", passwort=>"");
  if (isset($_GET["logout"]))
  {
    $user["name"] = "";
    $user["passwort"] = "";
    $_SESSION['name'] = "";
    $_SESSION['passwort'] = "";
  } else if (isset($_POST["user"]) && isset($_POST["passwort"]))
  {
    $user["name"]=$_POST["user"];
    $user["passwort"]=$_POST["passwort"];
    $_SESSION['name'] = $user["name"];
    $_SESSION['passwort'] = $user["passwort"];
  } else if (isset($_SESSION["name"]) && isset($_SESSION["passwort"]))
  {
    $user["name"] = $_SESSION['name'];
    $user["passwort"] = $_SESSION['passwort'];
  } else {
  }
?>