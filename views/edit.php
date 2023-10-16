<?php 

session_start();
$data = $_SESSION["user"];

foreach ($data as $usuarios) {
    extract($usuarios);
    $img = base64_encode($foto);
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <h1>Editar</h1>
    <form method="POST" action="../models/modify.php" enctype="multipart/form-data" >
<div class="divMain">
    <div class="divContainerInfo">
        <h2>Change info</h2>
        <p>Changes will be reflected to every services</p>
        <label for="">foto</label>
        <input name="foto" type="file" value='data:image/jpeg;base64,<?=$img?>'>
        <div style="width: 50px; height: 50px;">
            <img src='data:image/jpeg;base64,<?=$img?>' style="width: 100%; height: 100%;" >
        </div>
        <br>

        <label for="">id</label>
        <input name="id" type="number" readonly value="<?=$id_usuario?>">
        <br>

        <label for="">nombre</label>
        <input name="nombre" type="text" value="<?=$nombre?>">
        <br>

        <label for="">bio</label>
        <input name="bio" type="text" value="<?=$bio?>">
        <br>

        <label for="">Phone</label>
        <input name="telefono" type="number" value="<?=$telefono?>">
        <br>

        <label for="">email</label>
        <input name="email" type="text" value="<?=$email?>">
        <br>

        <label for="">contraseña</label>
        <input name="contraseña" type="number" value="12345">

        <button class="button-blue" type="submit">guardar</button>
    </form>
    </div>
</div>  
   
</body>

</html>