<?php

$mysql_host='';
$mysql_port=3306;
$mysql_user='gtpadmin';
$mysql_pass='gtpRDSpassword2023';
$mysql_db='gtp';
$redis_host='';
$redis_port=6379;

$pdo = new PDO("mysql:host=" . $mysql_host . ":" . $mysql_port . ";dbname=" . $mysql_db . ", " . $mysql_user . ", " . $mysql_pass);
$now = $pdo->query('SHOW VARIABLES LIKE "%version%"')->fetchColumn();

echo "=====MYSQL=======";
echo $now;
echo "=========";

echo "====PHP=======";
phpinfo(INFO_MODULES);
echo "==========";

echo "====Redis=====";
$redis = new Redis(); 
$redis->connect($redis_host, $redis_port); 
echo "Connection to server sucessfully"; 
echo "Server is running: ".$redis->ping(); 

$redis->set("tutorial-name", "Redis tutorial");
echo "Stored string in redis:: " .$redis→get("tutorial-name"); 
echo "=======";
?>
