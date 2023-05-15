<?php

session_start();

require_once '../core/db.php';
require_once '../core/auth.php';
require_once '../core/common.php';

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

function reg()
{
    if (isset($_POST['username'])) {
        if (!$_POST['username']) {
            $_SESSION['error'] = 'Не указано имя пользователя!';
            require_once '../view/reg.php';
            exit;
        }
        $mysqli = getConnection();
        $stmt = $mysqli->prepare("SELECT id FROM users WHERE username=?");
        $stmt->bind_param("s", $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if (isset($row['id'])) {
            $_SESSION['error'] = 'Такое имя пользователя уже существует в базе данных!';
            require_once '../view/reg.php';
            exit;
        }

        $hash = getHash();
        $stmt = $mysqli->prepare("INSERT INTO `users` (`username`, `hash`) VALUES (?,?)");
        $stmt->bind_param("ss", $_POST['username'], $hash);
        $stmt->execute();

        $_SESSION['user_id'] = mysqli_insert_id($mysqli);
        $_SESSION['hash'] = $hash;

        jsRedirect('/');
    } else {
        require_once '../view/reg.php';
        exit;
    }
}

function login()
{
    if (isset($_POST['hash']) && $_POST['hash']) {
        if ($id = getUserId($_POST['hash'])) {
            $_SESSION['user_id'] = $id;
        } else {
            $_SESSION['error'] = 'Пользователь не найден!';
        }
    } else {
        $_SESSION['error'] = 'Не указан ключ!';
    }

    header('Location: /');
    exit;
}

function logout()
{
    unset($_SESSION['user_id']);
    header('Location: /');
    exit;
}
