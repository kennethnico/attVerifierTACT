<?php
$server = "172.19.202.77";
$user = "registros";
$password = "R3g1xtr0s!";
//$password = "Pjcdmx@22!";
$dbName = "registros";
try {
    $conexion = new PDO("mysql:host=$server;dbname=$dbName", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión realizada satisfactoriamente";
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>