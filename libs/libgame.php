<?php
  class Game
  {
    protected $db = null;
    function __construct($pdo_db)
    {
      $this->db = $pdo_db;
    }
    function byID($id)
    {
      $ret = $this->db->prepare("SELECT * FROM game WHERE id=? LIMIT 1");
      $ret->execute(array($id));
      return $ret->fetchAll(PDO::FETCH_ASSOC)[0];
    }
    function byName($name)
    {
      $ret = $this->db->prepare("SELECT * FROM game WHERE name LIKE ? ORDER BY name");
      $ret->execute(array($name));
      return $ret->fetchAll(PDO::FETCH_ASSOC);
    }
    function byUser($id)
    {
      $ret = $this->db->prepare("SELECT * FROM `have`, `game` WHERE have.gameId=game.id AND have.userid=? AND have.count!=0 ORDER BY name");
      $ret->execute(array($id));
      return $ret->fetchAll(PDO::FETCH_ASSOC);
    }
    function byUserName($id, $name)
    {
      $ret = $this->db->prepare("SELECT * FROM `have`, `game` WHERE have.gameId=game.id AND have.userid=? AND have.count!=0 AND name LIKE ? ORDER BY name");
      $ret->execute(array($id, $name));
      return $ret->fetchAll(PDO::FETCH_ASSOC);
    }
    function all()
    {
      $ret = $this->db->prepare("SELECT * FROM `game` ORDER BY name");
      $ret->execute(array());
      return $ret->fetchAll(PDO::FETCH_ASSOC);
    }
  }
?>
