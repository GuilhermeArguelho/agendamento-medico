<?php 
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';


include_once 'conectaBD.php';

  if(!empty($_POST)){
    try {
      $sql = "INSERT INTO consulta (nome_paciente, cpf, telefone, data, horario, descricao)
            VALUES (:nomePaciente, :cpf, :telefone, :data, :horario,:descricao)";

      $stmt = $pdo->prepare($sql);

      $dados = array(
        ':nomePaciente' => $_POST['nomePaciente'],
        ':cpf' => $_POST['cpf'],
        ':telefone' => $_POST['telefone'],
        ':data' => $_POST['data'],
        ':horario' => $_POST['horario'],
        ':descricao' => $_POST['descricao']
      );
    if($stmt->execute($dados)){
      header("Location: index.php?msgSucesso=Consulta cadastrada com sucesso!");
    }
    } catch (PDOException $e) {
      // die($e->getMessage());
      header("Location: index.php?msgErro=Falha ao cadastrar a consulta...");
    }
  } else {
    header("Location: index.php>msgErro=Erro de acesso.");
  }
  die();
?>