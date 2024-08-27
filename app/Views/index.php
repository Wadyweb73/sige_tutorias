<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

    <main>
    <?php 
    if(isset($_SESSION['category']) && $_SESSION['category'] == "Admin"){
        echo "
        <aside>
        <ul>
            <li><strong>Eventos</strong></li>
            <li><a href='/evento'>Visualizar</a></li>
            <li><a href='/evento/create'>Registar</a></li>
        </ul>
        <ul>
            <li><strong>Anfiteatros</strong></li>
            <li><a href='/anfiteatro'>Visualizar</a></li>
            <li><a href='/anfiteatro/create'>Registar</a></li>
        </ul>
        <ul>
            <li><strong>Faculdades</strong></li>
            <li><a href='/faculdade'>Visualizar</a></li>
            <li><a href='/faculdade/create'>Registar</a></li>
        </ul>
        </aside>
        ";
    }else{
        echo "
        <aside>
        <ul>
            <li><strong>Eventos</strong></li>
            <li><a href='/evento'>Visualizar</a></li>
        </ul>
        </aside>
        ";
    }
    ?>
    
    <section>

    </section>
    </main>
</body>
</html>