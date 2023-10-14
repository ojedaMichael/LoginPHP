<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        require_once($_SERVER["DOCUMENT_ROOT"] . "/config/database.php");

        $stmt = $mysqli->prepare("SELECT email, contraseña FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($dbEmail, $hashedPassword);
        $stmt->fetch();
        $stmt->close();

        if (password_verify($password, $hashedPassword)) {
            $response = $mysqli->query("SELECT * FROM usuarios where email ='$dbEmail'");
            $data = $response->fetch_all(MYSQLI_ASSOC);

            session_start();
          
            $_SESSION["user"] = $data;
            header("Location: /views/dashboard.php");
        } else {
            echo "Las credenciales no coinciden.";
        }
    } else {
        echo "Ingresa todos los campos requeridos.";
    }
} else {
    echo "Ingresa desde POST";
}
?>
