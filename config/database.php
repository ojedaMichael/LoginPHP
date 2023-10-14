<?php
try {
    $host = "localhost";
    $username = "root";
    $contrasena = "";
    $database = "login_db";
    
    $mysqli = new mysqli($host, $username, $contrasena, $database);
} catch (mysqli_sql_exception $e) {
    "Error: " . $e->getMessage();
}