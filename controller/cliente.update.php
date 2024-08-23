<?php

include_once "../model/cliente.php";

$id = $_POST["id"];
$tipoDoc = $_POST["tipoDoc"];
$identificacion = $_POST["identificacion"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];

$clienteM = new \modelo\Cliente;
$clienteM->setId($id);
$clienteM->setTipoDoc($tipoDoc);
$clienteM->setnumeroIdentificacion($identificacion);
$clienteM->setNombre($nombre);
$clienteM->setApellido($apellido);
$clienteM->setCorreo($correo);
$clienteM->setDireccion($direccion);
$clienteM->setTelefono($telefono);

$response = $clienteM->update();
echo json_encode($response);
unset($clienteM);
unset($response);
