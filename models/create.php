<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

        // Genera el hash de la contraseña una vez al registrar al usuario
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $mysqli->prepare("INSERT INTO usuarios (email, contraseña) VALUES (?, ?)");
        $stmt->bind_param('ss', $email, $hash);

        if ($stmt->execute()) {
            $stmt->close();

            $response = $mysqli->query("SELECT * FROM usuarios where email ='$email'");
            $data = $response->fetch_all(MYSQLI_ASSOC);

            session_start();
            $_SESSION["user"] = $data;
            header("Location: /views/dashboard.php");
        } else {
            header("Location: /views/register.php");
        }
    } else {
        echo "Ingresa todos los campos requeridos.";
    }
} else {
    echo "Ingresa desde POST";
}
?>



