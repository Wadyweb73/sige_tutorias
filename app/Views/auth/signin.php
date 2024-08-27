<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

    <div class="lg">
        <figure>
            <img src="public/img/conf.png" alt="UPM Logo">
        </figure>
        <form action="/registar" method="POST">
            <figure>
                <img src="public/img/upm.png" alt="UPM Logo">
            </figure>
            
            <input type="text" name="name" id="" placeholder="Nome">
            <input type="text" name="surname" id="" placeholder="Apelido">
            <input type="email" name="email" id="" placeholder="E-mail">
            <input type="password" name="passwd" id="" placeholder="Senha">

            <button type="submit">Registar</button>
        </form>
    </div>
    
</body>
</html>