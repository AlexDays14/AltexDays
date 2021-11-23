<?php

$db = mysqli_connect('us-cdbr-east-04.cleardb.com', 'b15ddee6cf1f46', 'f52484b2', 'heroku_7df6957b57a967a');


if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
