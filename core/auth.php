<?php

function isAuth() {
    if (isset($_SESSION['user_id'])) {
        return true;
    }

    return false;
}

function getUserName()
{
    if (!isAuth()) {
        return null;
    }

    $id = $_SESSION['user_id'];

    $mysqli = getConnection();
    $stmt = $mysqli->prepare("SELECT username FROM users WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['username'];
}

function getUserId($hash)
{
    $mysqli = getConnection();
    $stmt = $mysqli->prepare("SELECT id FROM users WHERE hash=?");
    $stmt->bind_param("s", $hash);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['id'];
}
