<?php 
    $conn = new mysqli("localhost", "root", "", "sigetutoria");
    $query = $conn->query("SELECT * FROM tutoria");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Ver</title>
    <link rel="stylesheet" href="../../../public/css/style.css">

</head>
<body>
<main>
        <?php
            include "app/Views/fragments/aside.php";
        ?>
    
        <section class="show">
            <div class="sectionHeader">
                <h2>Actidades</h2>
                <button> Cadastrar </button>
            </div>
            <div class="formTable">
                <form action="">
                        <select name="" id="">
                            <option value="Ascendente">Ascendente</option>
                            <option value="Descendente">Descendente</option>
                        </select>
                        <select name="" id="">
                            <option value="Nome">Nome</option>
                            <option value="Referencia">Referência</option>
                            <option value="Destino">Destino</option>
                            <option value="Data e Hora">Data e Hora</option>
                        </select>
                        <button>Filtrar</button>
                </form>
                    
                <form action="">
                        <input type="text" name="" id="" placeholder="Pesquisar">
                        <button>Procurar</button>
                </form>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Assunto</th>
                            <th>Tipo </th>
                            <th>Faculdade</th>
                            <th>Sala</th>
                            <th>Descricao</th>
                            <th>Inicio</th>
                            <th>Fim</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($query->num_rows > 0) {
                                $i=1;
                                while($row = $query->fetch_assoc()){
                                    echo"
                                        <tr>
                                            <td>".$i++."</td>
                                            <td>$row[id]</td>
                                        </tr>
                                    ";
                                }
                            }
                            else{
                                echo "<strong> Não exitem dados cadastrados.  </strong>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

</body>
</html>