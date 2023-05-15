<?php

session_start();

require_once '../core/auth.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

if (!function_exists($action)) {
    require_once '../view/404.php';
    exit;
} else {
    $action();
}

function index()
{
    require_once '../view/index.php';
    exit;
}
