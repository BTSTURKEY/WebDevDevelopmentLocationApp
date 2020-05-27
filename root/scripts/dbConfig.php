<?php
define('DB_SERVER', 'db:4172');
define('DB_USERNAME', 'turkey');
define('DB_PASSWORD', 'UuJe5*1FsnKP9fgM%XC#8Oi7#pqmCFAj');
define('DB_NAME', 'Turkey_db');

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($connection === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
