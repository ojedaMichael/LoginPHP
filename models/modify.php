<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_FILES["foto"]["name"];
    $tmp_name = $_FILES["foto"]["tmp_name"];
    $type = $_FILES["foto"]["type"];

    $data_img = addslashes(file_get_contents($tmp_name));
    
    require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

    extract($_POST);
    
    if (is_numeric($id)) {
        $fieldsToUpdate = array();
        
        if ($nombre !== "") {
            $fieldsToUpdate[] = "nombre = '$nombre'";
        }
        if ($bio !== "") {
            $fieldsToUpdate[] = "bio = '$bio'";
        }
        if ($email !== "") {
            $fieldsToUpdate[] = "email = '$email'";
        }
        if ($foto !== "") {
            $fieldsToUpdate[] = "foto = '$data_img'";
        } 

        if ($telefono !== "") {
            $fieldsToUpdate[] = "telefono = '$telefono'";
        }
        if ($contraseña !== "") {
            $hash = password_hash($contraseña, PASSWORD_DEFAULT);
            $fieldsToUpdate[] = "contraseña = '$hash'";
        }
        
        if (!empty($fieldsToUpdate)) {
            $updateFields = implode(', ', $fieldsToUpdate);
            $query = "UPDATE usuarios SET $updateFields WHERE id_usuario = $id";
            if ($mysqli->query($query)) {
                $response = $mysqli->query("SELECT * FROM usuarios WHERE id_usuario = $id");
                $data = $response->fetch_all(MYSQLI_ASSOC);

                session_start();
                $_SESSION["user"] = $data;
                header("Location: /views/dashboard.php");
            } else {
                echo "Error en la actualización de datos. Por favor, inténtalo de nuevo.";
            }
        } else {
            echo "No se proporcionaron campos para actualizar.";
        }
    } else {
        echo "ID de usuario no válido.";
    }
} else {
    echo "Error en la solicitud.";
}
