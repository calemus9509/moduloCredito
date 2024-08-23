<?php
include_once "../model/cliente.php";
$clienteM = new \modelo\Cliente;
$response = $clienteM->read();

echo json_encode($response);
unset($clienteM);
unset($response);