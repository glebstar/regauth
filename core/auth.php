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
}
