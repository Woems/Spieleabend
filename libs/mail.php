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
      $ret = $this->db->prepare("SELECT * FROM mail WHERE owner=? ORDER BY date");
      $ret->execute(array($this->owner));
      return $ret->fetchAll(PDO::FETCH_ASSOC);
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
      return array(
        $this->insertMail($from,"Send",$from, $to, $subject, $body),
        $this->insertMail($to,"Inbox",$from, $to, $subject, $body)
      );
    }
    function insertMail($owner, $folder, $from, $to, $subject, $body)
    {
      $ret = $this->db->prepare("INSERT INTO mail(id, owner, folder, from, to, subject, body, date)
                                 VALUES (NUL,?,?,?,?,?,?,NOW())");
      $ret->execute(array($owner, $folder, $from, $to, $subject, $body));
      return $ret->lastInsertId();
    }
  }
?>
