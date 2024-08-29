<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Criar</title>
    <link rel="stylesheet" href="../../../public/css/style.css">

</head>
<body>

    <div class="lg">
        <figure>
            <img src="../../../public/img/log.png" alt="UPM Logo">
        </figure>
        <form action="/evento/create" method="POST">
            <b>Registar Tutoria</b>
            <br>
            
            <input type="text" name="assunto" id="" placeholder="Assunto">
            <input type="text" name="num" id="" placeholder="Tutoria Nr.">
            <input type="text" name="local" id="" placeholder="Local">
            <input type="text" name="numEst" id="" placeholder="Numero de estudantes">
            <textarea name="descricao" id="" placeholder="Descrição"></textarea>
            <fieldset id="datas">
                <fieldset>
                    <legend>Inicio</legend>
                    <input type="date" name="datestart" id="">
                    <input type="time" name="timestart" id="">
                </fieldset>
                <fieldset>
                    <legend>Fim</legend>
                    <input type="date" name="dateend" id="">
                    <input type="time" name="timeend" id="">
                </fieldset>
            </fieldset>

            <button type="submit">Registar</button>
        </form>
    </div>
    
</body>
</html>