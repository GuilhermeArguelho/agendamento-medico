<?php 
include_once 'conectaBD.php';

$sql = 'update consulta
    set nome_paciente = :nomePaciente, 
    cpf = :cpf, 
    telefone = :telefone, 
    data = :data, 
    horario = :horario, 
    descricao = :descricao
    where id = :id';
    
if(!empty($_POST)){
  try {
    $stmt = $pdo->prepare($sql);

  $dados= array(
    ':id' => $_GET['id'],
    ':nomePaciente' => $_POST['nomePaciente'],
    ':cpf' => $_POST['cpf'],
    ':telefone' => $_POST['telefone'],
    ':data' => $_POST['data'],
    ':horario' => $_POST['horario'],
    ':descricao' => $_POST['descricao']
  );
  
  $result = $stmt->execute($dados);
  
  if($stmt->execute($dados)){
    header("Location: index.php?msgSucesso=Consulta alterada com sucesso!");
  }
  } catch (PDOException $e) {
    // die($e->getMessage());
    header("Location: index.php?msgErro=Falha ao alterar a consulta...");
  }
}
?>