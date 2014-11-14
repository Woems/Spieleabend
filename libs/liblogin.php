<?php
  //ini_set('display_errors', true);
  //error_reporting(E_ALL);
  session_start();

  class Login
  {
    protected $db = null;
    protected $user = null;
    function __construct($pdo_db)
    {
      $this->db = $pdo_db;
      if (isset($_GET["logout"]))
      {
        $this->logout();
      }
    }
    function db($user, $pass)
    {
      $ret = $this->db->prepare("SELECT * FROM user WHERE username=? AND password=MD5(?)");
      $ret->execute(array($user, $pass));
      return $ret->fetchAll(PDO::FETCH_ASSOC);
    }
    function validateSession()
    {
      if (!isset($_SESSION['username']) || !isset($_SESSION["passwort"])) return false;
      $tmp = $this->db($_SESSION['username'], $_SESSION['passwort']);
      if (count($tmp)!=1) return false;
      $this->user=$tmp[0];
      return true;
    }
    function validatePost()
    {
      if (!isset($_POST["user"]) || !isset($_POST["passwort"])) return false;
      $tmp = $this->db($_POST["user"], $_POST["passwort"]);
      if (count($tmp)!=1) return false;
      $_SESSION['username']=$_POST["user"];
      $_SESSION['passwort']=$_POST["passwort"];
      $this->user=$tmp[0];
      return true;
    }
    function validate()
    {
      if ($this->validatePost()) return true;
      if ($this->validateSession()) return true;
      return false;
    }
    function logout()
    {
      $_SESSION['username']="";
      $_SESSION['passwort']="";
      $this->user=null;
      return $this;
    }
    function getName()
    {
      return $this->user["username"];
    }
    function getID()
    {
      return $this->user["id"];
    }
    function get()
    {
      return $this->user;
    }
  }  
?>
