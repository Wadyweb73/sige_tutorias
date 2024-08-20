<?php
    require "app/config/Router.php";
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SIGEnv </title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header>
        <h1>SysGEnv</h1>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/entrar">Entrar</a></li>
                <li><a href="/registar">Registar</a></li>
            </ul>
        </nav>
    </header>

    <?php        
        $router = new Router();

        $router->get('/', function() {
            include "app/Views/pages/main.php";
        });

        $router->get('/entrar', function() {
            include "app/Views/auth/login.php";
        });
        $router->get('/registar', function() {
            include "app/Views/auth/signin.php";
        });

        $router->run();

        // echo $_SERVER['REQUEST_URI'];
        // function rota($rotas, $f){
        //     if($_SERVER['REQUEST_URI'] == $rotas){
        //         $f();
        //         exit();
        //     }
        // }

        // rota("/", function() {
        //     echo "Hello";
        // });
        // rota("/about", function() {
        //     echo "<h1>Hello world</h1>";
        //     new Login();
        // });
    ?>
</body>
</html>