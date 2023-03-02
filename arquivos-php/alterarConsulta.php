<?php 
include_once 'conectaBD.php';
  
$sql = "select id, nome_paciente, cpf, telefone, data, horario, descricao from consulta where id = :id";
  
try {
  $stmt = $pdo->prepare($sql);

  $dados= array(
    ':id' => $_GET['id']
  );
  
  $result = $stmt->execute($dados);
  
  if ($result == true) {
    $consulta = $stmt->fetchAll();
    $consulta = $consulta[0];
  }
} catch (PDOException $e) {
  echo 'Falha ao obter a consulta.';
  die($e->getMessage());
}
?>

<?php  ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/cad_consulta.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
  <title>Alterar consulta</title>
</head>

<body>
  <div class="container">
    <h1>Alterar dados da consulta</h1>
    <form id="form_consulta" action="processa_alterar.php?id=<?php echo $_GET['id'];?>" method="post">
      <div class="nome flex">
        <label for="nome">Nome do Paciente</label>
        <?php  echo '<input type="text" name="nomePaciente" id="nomePaciente" required value="' .$consulta['nome_paciente'] . '"' . '>';?>
      </div>

      <div class=" cpf flex">
        <label for="cpf">CPF</label>
        <?php  echo '<input type="cpf" name="cpf" id="cpf" required value="' .$consulta['cpf'] . '"' . '>';?>
      </div>

      <div class=" telefone flex">
        <label for="telefone">Telefone</label>
        <?php echo  '<input type="phone" name="telefone" id="telefone" required value="' .$consulta['telefone'] . '"' . '>';?>
      </div>

      <div class="descricao flex">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" required><?php echo $consulta['descricao']?></textarea>
      </div>


      <div id="datahora">
        <div class="data flex">
          <label for="data">Data</label>
          <?php echo '<input type="date" name="data" id="data" required value="' . $consulta['data'] . '"' . '>';?>
        </div>
        <div class="horario flex">
          <label for="hora">Horário</label>
          <input type="time" name="horario" id="horario" value=<?php echo $consulta['horario']?> required>
        </div>
      </div>
    </form>
    <div class="btns">
      <button class="btn" type="submit" name="submit" id="submit" form="form_consulta"> ALTERAR</button>
      <div class="cancelar">
        <a href="index.php"><button class="btn">CANCELAR</button> </a>
      </div>
    </div>

  </div>


</body>

</html>