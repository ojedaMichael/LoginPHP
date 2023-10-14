<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;300&display=swap" rel="stylesheet">
</head>

<body> 
        <div class="divMain">
            <div class="divContainer">
                <img src="/assets/devchallenges.svg" alt="">
                <h3>Login</h3>
                
                <form action="/models/Login.php" method="POST" >
                    <input placeholder="Email" name="email"  type="text">
                    <br>
                    <input placeholder="Password" name="password" type="text">
                    <br>
                    <button type="submit">Start coding now </button>
                </form>
                <p>or continue with these social profile</p>

                <div>
                    <img width="40" src="/assets/Facebook.svg" alt="">
                    <img width="40" src="/assets/Gihub.svg" alt="">
                    <img width="40" src="/assets/Google.svg" alt="">
                    <img width="40" src="/assets/Twitter.svg" alt="">
                   
                    
                </div>
                <span>Don’t have an account yet? <a href="./views/registrar.php">Register</a></span>
           
            </div>
        </div>
        
    </body>
</html>