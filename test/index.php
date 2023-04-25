<?php

$redis_host ="";
$redis_port ="6379";
$mysql_host = "";
$mysql_user = "";
$mysql_pass = "";
$mysql_db = "gtp";

echo "<span><center>";
echo "\n=====MySQL=======\n";
echo "<br>";
try {
  $conn = new PDO("mysql:host=$mysql_host;dbname=$mysql_db", $mysql_user, $mysql_pass);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "\nMySQL Connected successfully";
  echo "<br>";
} catch(PDOException $e) {
  echo "\nConnection failed: " . $e->getMessage();
}
echo "\n==============\n";
echo "<br>";
echo "<br>";

echo "\n====Redis=====\n";
echo "<br>";
$redis = new Redis();
$redis->connect($redis_host, $redis_port);
echo "\nConnection to server sucessfully\n";
echo "<br>";
echo "\nServer is running: ".$redis->ping();
echo "<br>";
echo "\nTrying to set a key in Redis..";
$redis->set("my-project", "gtp");
echo "<br>";
echo "\nStored string in redis: " .$redis->get("my-project");
echo "<br>";
echo "\n=======\n";
echo "<br>";
echo "<br>";

echo "\n====PHP=======\n";
echo "<br>";
phpinfo(INFO_MODULES);
echo "<br>";
echo "\n==========\n";
echo "</center></span>";

?>
