<?php 
include_once 'conectaBD.php';

$sql = 'delete from consulta
where id = :id';

try {
  $stmt = $pdo->prepare($sql);

  $dados = array(
    ':id' => $_GET['id']
  );

  $result = $stmt->execute($dados);

  if ($result == true) {
    header("Location: index.php?msgSucesso=Consulta removida com sucesso.");
  }
  
} catch (PDOException $e) {
  header("Location index.php?msgErro=Falha ao remover a consulta.");
}
?>