<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/cad_consulta.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
  <title>Cadastro Usuário</title>
</head>

<body>
  <div class="container">
    <header>
      <h1>Cadastrar nova consulta</h1>
    </header>
    <form id="form_consulta" action="processa_cad.php" method="post">
      <div class="nome flex">
        <label for="nome">Nome do Paciente</label>
        <input type="text" name="nomePaciente" id="nomePaciente" required>
      </div>

      <div class="cpf flex">
        <label for="cpf">CPF</label>
        <input type="cpf" name="cpf" id="cpf" required>
      </div>

      <div class="telefone flex">
        <label for="telefone">Telefone</label>
        <input type="phone" name="telefone" id="telefone" required>
      </div>

      <div class="descricao flex">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" required></textarea>
      </div>


      <div id="datahora">
        <div class="data flex">
          <label for="data">Data</label>
          <input type="date" name="data" id="data" value="2022-01-01" required>
        </div>
        <div class="horario flex">
          <label for="hora">Horário</label>
          <input type="time" name="horario" id="horario" value="00:00" required>
        </div>
      </div>
    </form>
    <div class="btns">
      <button class="btn" type="submit" name="submit" id="submit" form="form_consulta"> CADASTRAR</button>
      <div class="cancelar">
        <a href="index.php"><button class="btn">CANCELAR</button> </a>
      </div>
    </div>

  </div>


</body>


</html>