<?php
session_start();
include('../../api.php');  // Incluir el archivo API

$action = $_GET['action'] ?? '';

/**
 * Create a new token
 */
if ($action === 'create') {
    $name = $_POST['name'];
    $symbol = $_POST['symbol'];
    $initialSupply = $_POST['initialSupply'];
    $response = callAPI('POST', '/tokens/create-token-hedera', [
        'name' => $name,
        'symbol' => $symbol,
        'initialSupply' => $initialSupply
    ]);
    if (isset($response->tokenId)) {
        header('Location: /dashboard.php');
    } else {
        echo "Error al crear el token: " . $response->error;
    }
}
