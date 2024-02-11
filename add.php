<?php

$host = "localhost";
$usr = "root";
$pass = "3399201";
$database = "mytodo";

$ser = new mysqli($host, $usr, $pass, $database);

if ($ser->connect_error) {
    echo $ser->connect_error;
}



function add($task){
        $qr = "INSERT INTO TODO  VALUES ('$task');";
        $ser->query($qr);
}


$mytask = $_POST["newTask"];
if($mytask){
    add($task);
}


?>
