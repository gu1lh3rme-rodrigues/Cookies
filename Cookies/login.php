<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button>submit</button>
    </form>
</body>
</html>

<?php
    session_start();
    $username = !empty($_POST['username']) ? $_POST['username'] : false;
    $password = !empty($_POST['password']) ? $_POST['password'] : false;  

    if($username && $password){
        $hashusername = md5(trim(strtolower($_POST['username'])));
        $hashpassword = md5(trim(strtolower($_POST['password'])));
        $cookie_expiration = time() + 3600;

        $sql = "SELECT * FROM usuario WHERE username = '" . $hashusername . "' AND password = '". $hashpassword . "'";
        // minha query
        $result = mysqli_query($link, $sql);

        if(mysqli_num_rows($result) > 0){ 
            echo "Login successful!";
            setcookie("username", $username, $cookie_expiration, "/");
            setcookie("loggedin", "1", $cookie_expiration, "/");
            header("Location: main.php");

        }else{
            echo "Nome de usuário ou senha incorretos.";
        }
    }else{
        echo "Preencha o Usuário e senha.";
    }
?>