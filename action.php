<?php
$server = "172.19.202.77";
$user = "registros";
$password = "R3g1xtr0s!";
$dbName = "registros";
$dbTable = "attVerifierFFRD";
//$name = html_entity_decode($_POST['nnn'], ENT_QUOTES | ENT_HTML401, "UTF-8");
$name = utf8_decode($_POST['nnn']);
$loc = $_POST['loca'];
$email = $_POST['eee'];
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
function insertaValor($conn,$nom,$mail,$dater,$loc,$table){
    if(validaExistencia($conn,$mail)){
        ////////////// Insertar a la tabla la información generada /////////
        $sql="insert into ".$table."(nombre,email,fecha,location) values(:nombre,:email,:fecha,:location)";
        $sql = $conn->prepare($sql);
        $sql->bindParam(':nombre', $nom);
        $sql->bindParam(':email', $mail);
        $sql->bindParam(':fecha', $dater);
        $sql->bindParam(':location', $loc);
        $sql->execute();
        echo '<div class="img-form">
                    <img src="./assets/logos/imgFJD_1.png" alt="IMG">
               </div>
               <span class="login100-form-title">Se ha registrado su asistencia con éxito.</span>';

    }else{
        echo '<div class="img-form">
                    <img src="./assets/logos/imgFJD_1.png" alt="IMG">
                </div>
                <span class="login100-form-title">Bienvenido</span>
                <div style="justify-content: center; text-align: center; color: var(--primary-color);" class="m-b-20"><small style="justify-self: center;">Para registrar tu asistencia, proporciona los siguientes datos: </small></div>
                <div class="wrap-input100 validate-input" data-validate = "Valor requerido.">
                    <input class="input100" type="text" name="nom" placeholder="Nombre completo">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Es necesario un email válido: ex@abc.xyz">
                    <input class="input100" type="email" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" name="enviar" type="submit">
                        Enviar
                    </button>
                </div>
                <div style="justify-content: center; text-align: center; color: var(--primary-color);" class="m-b-20" id="resultado">
                <small style="justify-self: center;">Tu asistencia ya ha sido registrada. Gracias.</small>
                </div>';
    }
}
insertaValor($conexion,$name,$email,$dater,$loc,$dbTable);
?>