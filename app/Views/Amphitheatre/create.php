<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anfiteatro - Criar</title>
    <link rel="stylesheet" href="../../../public/css/style.css">

</head>
<body>

    <div class="lg">
        <figure>
            <img src="../../../public/img/conf.png" alt="UPM Logo">
        </figure>
        <form action="/anfiteatro/create" method="POST">
            <b>Anfiteatro</b>
            <br>
            
            <input type="text" name="nome" id="" placeholder="Nome">
            <input type="text" name="faculdade" id="" placeholder="Faculdade">
            <input type="text" name="capacidade" id="" placeholder="Capacidade">


            <button type="submit">Registar</button>
        </form>
    </div>
    
</body>
</html>