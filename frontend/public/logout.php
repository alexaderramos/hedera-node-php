<?php
session_start();
include('../api.php');

/**
 * Logout the user
 */
$response = callAPI('POST', '/auth/logout');
session_destroy();
header('Location: /login.php');
