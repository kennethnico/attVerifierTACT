<?php
$server = "172.19.202.77";
$user = "registros";
$password = "R3g1xtr0s!";
$dbName = "registros";
$dbTable = "attVerifierTACT";
//$name = html_entity_decode($_POST['nnn'], ENT_QUOTES | ENT_HTML401, "UTF-8");
$name = utf8_decode($_POST['nnn']);
$loc = $_POST['loca'];
$email = $_POST['eee'];
$adsc = $_POST['ads'];
/**setlocale (LC_TIME, "es_MX");*/
date_default_timezone_set('America/Mexico_City');
$dater = date('Y-m-d H:i:s');
try {
    $conexion = new PDO("mysql:host=$server;dbname=$dbName", $user, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión realizada satisfactoriamente";
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
function validaExistencia($canal,$email,$table){
    $sql = "SELECT * FROM ".$table." WHERE email='".$email."'";
    $query = $canal->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        return false;
    }
    else{
        return true;
    }
}
function insertaValor($conn,$nom,$mail,$ads,$dater,$loc,$table){
    if(validaExistencia($conn,$mail,$table)){
        ////////////// Insertar a la tabla la información generada /////////
        $sql="insert into ".$table."(nombre,email,adscripcion,fecha,location) values(:nombre,:email,:adscrip,:fecha,:location)";
        $sql = $conn->prepare($sql);
        $sql->bindParam(':nombre', $nom);
        $sql->bindParam(':email', $mail);
        $sql->bindParam(':adscrip', $ads);
        $sql->bindParam(':fecha', $dater);
        $sql->bindParam(':location', $loc);
        $sql->execute();
        echo '<div class="img-form">
                    <img src="./assets/logos/right_img.png" alt="IMG">
               </div>
               <span class="login100-form-title">Se ha registrado su asistencia con éxito.</span>';

    }else{
        echo '<div class="img-form">
                    <img src="./assets/logos/right_img.png" alt="IMG">
               </div>
               <span class="login100-form-title">Tu asistencia ha sido registrada con anterioridad. Gracias.</span>';
    }
}
insertaValor($conexion,$name,$email,$adsc,$dater,$loc,$dbTable);
?>