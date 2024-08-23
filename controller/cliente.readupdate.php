<?php

include_once "../model/cliente.php";

$id = $_GET["id"];
$clienteM = new \modelo\Cliente;
$clienteM->setId($id);
$response = $clienteM->readUpdate();
echo json_encode($response);

unset($clienteM);
unset($response);
