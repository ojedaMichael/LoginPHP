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
</head>
<body>
<div class="divMain">
        <div class="divContainerInfo">
            <div class="divInfo">
                <h3>profile</h3>
               <a href="/views/edit.php">edit</a>
            </div>
           
            <div class="divInfo">
                <span>email</span>
                <p><?= $email ?></p>
            </div>
            <div class="divInfo">
                <span>foto</span>
                <div style="width: 50px; height: 50px;">
                    <img src='data:image/jpeg;base64,<?=$img?>' style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="divInfo">
                <span>BIO</span>
            </div> 
            <div>  
                <span>PHONO</span>
            </div>
            <div class="divInfo">
                <span>PASSWORD</span>
            </div>
        </div>
    </div>

    <a href="/models/loguot.php">loguot</a>
</body>
</html>