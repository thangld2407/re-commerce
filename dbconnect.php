<?php
$host_name = "localhost";
$db_port = 3306;
$username = "root";
$password = "";
$db_name = "clothes";
$connection = new mysqli($host_name, $username, $password, $db_name,$db_port);


function qryrun($qry){
    global $connection;
    $result = $connection->query($qry);
    if(!$result){
        die($connection->error);
    }

    return $result;
}
