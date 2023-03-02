<?php 
include_once  'conectaBD.php';


$sql = "select id, nome_paciente, cpf, telefone, to_char(data, 'DD/MM/YYYY') as data, to_char(horario, 'HH24:MI') as horario, descricao from consulta where id = :id;
";

try {
  $stmt = $pdo->prepare($sql);

  $dados = array(
    ':id' => $_GET['id']
  );
  
  $resultado = $stmt->execute($dados);

  if ($resultado == true) {
    $consulta = $stmt->fetchAll();
    $consulta = $consulta[0];
  }
} catch (PDOException $e) {
  die($e->getMessage());
  header("Location: index.php?msgErro=Falha ao visualizar a consulta.");
}

// echo '<pre>';
// print_r($consulta);
// echo '</pre>';
// ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/visualizar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
</head>

<body>

  <div class="container">
    <header>
      <h1>Consulta do <?php echo $consulta['nome_paciente'];?></h1>
    </header>
    <div></div>
    <div class="dados">
      <div class="info">
        <div class="id">
          <p>ID</p>
          <p class="dado"><?php echo $consulta['id'];?></p>
        </div>
        <div class="nome">
          <p>Nome do paciente</p>
          <p class="dado"><?php echo $consulta['nome_paciente']; ?></p>
        </div>
      </div>

      <div class="info">
        <div class="cpf">
          <p>CPF</p>
          <p class="dado"><?php echo $consulta['cpf']; ?></p>
        </div>
        <div class="telefone">
          <p>Telefone</p>
          <p class="dado"><?php echo $consulta['telefone'] ;?></p>
          </d>
        </div>
      </div>
      <div class="info">
        <div class="data">
          <p>Data da consulta</p>
          <p class="dado"><?php echo $consulta['data'] ;?></p>
        </div>
        <div class="horario">
          <p>Horário</p>
          <p class="dado"><?php echo $consulta['horario'] ;?></p>
        </div>
      </div>
      <div class="descricao">
        <p>Descrição</p>
        <p class="dado"><?php echo $consulta['descricao']; ?></p>
      </div>
      <div class="btns">
        <?php 
          echo '<div class="btns">
            <button onclick="alterarConsulta('. $consulta['id'].')">ALTERAR</button>
            <button onclick="excluirConsulta('. $consulta['id'].')">EXCLUIR</button>
                </div>';
         ?>
        <a href="index.php"><button>VOLTAR</button></a>
      </div>

</body>
<script>
function alterarConsulta(idConsulta) {
  window.location.href = `alterarConsulta.php?id=${idConsulta}`;
}

function excluirConsulta(idConsulta) {
  let confirmar = confirm("Deseja mesmo excluir essa consulta?");
  if (confirmar) {
    window.location.href = `excluirConsulta.php?id=${idConsulta}`;
  }
}
</script>

</html>