<?php
include_once "../model/cliente.php";
$id = $_POST["id"];
$clienteM = new \modelo\Cliente;
$clienteM->setId($id);
$response = $clienteM->delete();

echo json_encode($response);

unset($response);
unset($clienteM);
