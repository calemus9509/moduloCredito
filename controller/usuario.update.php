<?php

include_once "../model/usuario.php";


$id = $_POST["id"];
$tipoDoc = $_POST["tipoDoc"];
$identificacion = $_POST["identificacion"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$password = $_POST["password"];

$ususarioM = new \modelo\usuario;
$ususarioM->setId($id);
$ususarioM->setTipoDoc($tipoDoc);
$ususarioM->setnumeroIdentificacion($identificacion);
$ususarioM->setNombre($nombre);
$ususarioM->setApellido($apellido);
$ususarioM->setCorreo($correo);
$ususarioM->setContrasena($password);

$response = $ususarioM->update();
echo json_encode($response);
unset($ususarioM);
unset($response);
