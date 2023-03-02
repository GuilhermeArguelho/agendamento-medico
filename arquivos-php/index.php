<?php 
include_once 'conectaBD.php';
  $sql = "select id, nome_paciente, to_char(data, 'DD/MM/YYYY') as data, to_char(horario, 'HH24:MI') as horario from consulta order by id;";

  try {
    $stmt = $pdo->prepare($sql);

    $resultado = $stmt->execute();

    if($resultado == true){
      $consultas = $stmt->fetchAll();
    }
  } catch (PDOException $e) {
    echo 'Falha ao conectar ao banco de dados.';
  }

// echo '<pre>';
// print_r($consultas);
// echo '</pre>';
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
  <title>Consultas</title>
</head>

<body>
  <div class="msg">
    <?php if (!empty($_GET['msgErro'])) { ?>
    <div>
      <?php echo $_GET['msgErro']; ?>
    </div>
    <?php } ?>
  </div>
  <div class="msg">
    <?php if (!empty($_GET['msgSucesso'])) { ?>
    <div>
      <?php echo $_GET['msgSucesso']; ?>
    </div>
    <?php } ?>
  </div>

  <div class="container">
    <header>
      <h1>Consultas</h1>
    </header>

    <div class="container2">
      <div class="container3">
        <div class="cadastrar">
          <a href="cad_consulta.php">
            <button>Cadastrar nova consulta</button>
          </a>
        </div>
        <div class="busca">
          <label>
            <h3>Busca por nome</h3>
          </label>
          <div class="input-btn">
            <form id="form-busca" action="busca.php" method="post">
              <input type="text" name=" nomeBuscado" id="nomeBuscado" placeholder="Digite aqui...">
            </form>
            <button id="btn-busca" type="submit" name="submit" id="submit" form="form-busca">
              <img src="../img/buscar.svg" alt="buscar">
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="consultas">
      <table class="table-consulta">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome do paciente</th>
            <th>Data/Hora
            <th>Funcionalidades</th>
          </tr>
        </thead>
        <?php 
        foreach ($consultas as $consulta) { 
          echo '<tbody>';
            echo '<tr>';
              echo '<td>';
                echo $consulta['id'];
              echo '</td>';
              echo '<td>';
                echo $consulta['nome_paciente'];
              echo '</td>';
              echo '<td>';
                echo $consulta['data']; echo'<br>' . $consulta['horario'];
              echo '</td>';
              echo '<td>';
                echo '<div class="btns">
                        <button onclick="visualizarConsulta('. $consulta['id'].')">Visualizar</button>
        <button onclick="alterarConsulta('. $consulta['id'].')">Alterar</button>
        <button onclick="excluirConsulta('. $consulta['id'].')">Excluir</button>
    </div>';
    echo '</td>';
    echo '</tr>';
    echo '</tbody>';
    }
    ?>
      </table>
    </div>
  </div>

</body>

<script>
function alterarConsulta(idConsulta) {
  window.location.href = `alterarConsulta.php?id=${idConsulta}`;
}

function visualizarConsulta(idConsulta) {
  window.location.href = `visualizarConsulta.php?id=${idConsulta}`;
}

function excluirConsulta(idConsulta) {
  let confirmar = confirm("Deseja mesmo excluir essa consulta?");
  if (confirmar) {
    window.location.href = `excluirConsulta.php?id=${idConsulta}`;
  }
}
</script>

</html>