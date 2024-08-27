<?php 
    $conn = new mysqli("localhost", "root", "", "sigenv");
    $query = $conn->query("SELECT * FROM evento");
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
<div class="sectionHeader">
        <h2>Eventos</h2>
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
                        <th>Tema</th>
                        <th>Tipo </th>
                        <th>Faculdade</th>
                        <th>Orador</th>
                        <th>Audiencia</th>
                        <th>Parceiro</th>
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
                                        <td>$row[tema]</td>
                                        <td>$row[tipo]</td>
                                        <td>$row[faculdade]</td>
                                        <td>$row[orador]</td>
                                        <td>$row[audiencia]</td>
                                        <td>$row[parceiro]</td>
                                        <td>$row[descricao]</td>
                                        <td>$row[inicio]</td>
                                        <td>$row[fim]</td>
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

</body>
</html>