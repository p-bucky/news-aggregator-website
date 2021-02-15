<?php
date_default_timezone_set('UTC');

try {
  $connection = new PDO("mysql:dbname=thegamingbuddy;host=localhost", "root", "");
  // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
  exit("Connection failed: " . $e->getMessage());
}

$lifetime = 6000;
setcookie(session_name(), session_id(), time() + $lifetime);

// try {
//     $connection = new PDO("mysql:dbname=id15744824_thegamingbuddy;host=localhost", "id15744824_tera__pra", "1@Software32ref");
//     // $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
//     $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
// } catch (PDOException $e) {
//     exit("Connection failed: " . $e->getMessage());
// }
