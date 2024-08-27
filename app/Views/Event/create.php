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
            <img src="../../../public/img/conf.png" alt="UPM Logo">
        </figure>
        <form action="/evento/create" method="POST">
            <b>Evento</b>
            <br>
            
            <input type="text" name="tema" id="" placeholder="Tema">
            <select name="tipoEvento" id="">
                <option value="Colóquio">Colóquio</option>
                <option value="Conferência">Conferencia</option>
                <option value="Mesa Redonda">Mesa Redonda</option>
                <option value="Workshop">Workshop</option>
                <option value="Jornadas Científicas">Jornadas Científicas</option>
            </select>
            <input type="text" name="faculdade" id="" placeholder="Faculdade">
            <input type="text" name="orador" id="" placeholder="Oradores">
            <input type="text" name="publicoAlvo" id="" placeholder="Público alvo">
            <input type="text" name="parceiro" id="" placeholder="Parceiros">
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