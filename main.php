<?php


$host = "localhost";
$usr = "root";
$pass = "3399201";
$database = "mytodo";

$ser = new mysqli($host, $usr, $pass, $database);

if ($ser->connect_error) {
    echo $ser->connect_error;
}

function loadAlltask()
{
    global $ser;
    $qr = "SELECT TASK FROM TODO;";
    $res = $ser->query($qr);

    if ($res->num_rows > 0) {
        while ($receive = $res->fetch_assoc()) {
            echo "<div class='todo' onclick='done(event)';>" . $receive['TASK'] . "</div>";
        }
    }
}





function dell($name)
{
    echo $name;
    global $ser;
    $name = $ser->real_escape_string($name);
    $qr = "DELETE FROM TODO WHERE TASK = '$name';";
    $res = $ser->query($qr);
    echo $name;
    if (!$res) {
        echo "Error executing query: " . $ser->error;
    }
    echo $name;
}



if (isset($_POST)) {
    $da = file_get_contents("php://input");
    $da = json_decode($da, true);



    if ($da !== null && isset($da["task"]) && $da["task"] !== null) {
        dell($da["task"]);

      
    }

}


?>
