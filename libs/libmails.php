<?php
  class Mails
  {
    protected $db = null;
    protected $owner = null;
    function __construct($pdo_db, $owner=null)
    {
      $this->db = $pdo_db;
      $this->setOwner($owner);
    }
    function setOwner($owner)
    {
      $this->owner=$owner;
    }
    function getMail($id)
    {
      $ret = $this->db->prepare("SELECT * FROM mail WHERE id=? AND owner=? LIMIT 1");
      $ret->execute(array($id, $this->owner));
      return $ret->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    function getMails()
    {
      $ret = $this->db->prepare("SELECT mail.*,fu.username AS `fromuser`, tu.username AS `touser` FROM mail, user AS fu, user AS tu WHERE mail.owner=? AND fu.id=mail.`from` AND tu.id=mail.`to` ORDER BY folder, date");
      $ret->execute(array($this->owner));
      $tmp=$ret->fetchAll(PDO::FETCH_ASSOC);
      $mails = array("inbox"=>array(), "sent"=>array());
      foreach ($tmp as $row)
      {
        if (!isset($mails[$row["folder"]])) $mails[$row["folder"]]=array();
        $mails[$row["folder"]][]=$row;
      }
      return $mails;
    }
    function getMailsByFolder($folder)
    {
      $ret = $this->db->prepare("SELECT * FROM mail WHERE owner=? AND folder=? ORDER BY date");
      $ret->execute(array($this->owner, $folder));
      return $ret->fetchAll(PDO::FETCH_ASSOC);
    }
    function sendMail($to, $subject, $body)
    {
      $from=$this->owner;
      $this->insertMail($from,"send",$from, $to, $subject, $body);
      $this->insertMail($to,"inbox",$from, $to, $subject, $body);
      return true;
    }
    function insertMail($owner, $folder, $from, $to, $subject, $body)
    {
      echo $owner.$folder.$from.$to.$subject.$body;
      $ret = $this->db->prepare("INSERT INTO mail(id, owner, folder, from, to, subject, body, date)
                                 VALUES (NUL,?,?,?,?,?,?,NOW())");
      $ret->execute(array($owner, $folder, $from, $to, $subject, $body));
      return true; //$ret->lastInsertId();
    }
    function count($folder)
    {
      $ret = $this->db->prepare("SELECT count(*) AS count FROM mail WHERE folder=? AND owner=?");
      $ret->execute(array($folder, $this->owner));
      return $ret->fetch(PDO::FETCH_ASSOC)["count"];
    }
  }
?>
