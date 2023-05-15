<?php

require_once '../config.php';

function getConnection()
{
    $dbConfig = getConfig()['db'];
    return mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['password'], $dbConfig['db']);
}
