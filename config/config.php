<?php
  $CONFIG=array(
   "DBSERVER" => "localhost",
   "DBDATABASE" => "wSpieleabend",
   "DBUSER" => "wSpieleabend",
   "DBPASSWORD" => "NZeQb9UWZZYqH6K4",
  );
  $db = new PDO('mysql:host='.$CONFIG["DBSERVER"].';dbname='.$CONFIG["DBDATABASE"].';charset=utf8', $CONFIG["DBUSER"], $CONFIG["DBPASSWORD"]);
?>
