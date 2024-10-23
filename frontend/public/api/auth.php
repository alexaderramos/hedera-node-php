<?php
session_start();
include('../../api.php');

$action = $_GET['action'] ?? '';

/**
 * Register a new user
 */
if ($action === 'register') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $response = callAPI('POST', '/auth/register', [
        'username' => $username,
        'password' => $password
    ]);
    if (isset($response->token)) {
        $_SESSION['token'] = $response->token;
        header('Location: /dashboard.php');
        exit();
    } else {
        header('Location: /register.php');
        exit();
    }
}


/**
 * Login the user
 */
if ($action === 'login') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $response = callAPI('POST', '/auth/login', [
        'username' => $username,
        'password' => $password
    ]);
    if (isset($response->token)) {
        $_SESSION['token'] = $response->token;
        header('Location: /dashboard.php');
        exit();
    } else {
        header('Location: /login.php');
        exit();
    }
}
