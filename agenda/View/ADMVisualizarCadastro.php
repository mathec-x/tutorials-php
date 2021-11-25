<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Usuários Cadastrados</title>
</head>

<body>
  <?php
  include_once '../Model/Administrador.php';
  include_once '../Controller/AdministradorController.php';
  if (!isset($_SESSION)) {
    session_start();
  }
  ?>
  <header class="w3-container w3-padding-32 w3-center ">
    <h1 class="w3-text-white w3-panel w3-cyan w3-round-large">Currículo</h1>
  </header>
  <h2 class="w3-text-white w3-padding-200 w3-center w3-panel w3-cyan w3-round-large" style="width: 50%;">NOME: </h2>
  <h2 class="w3-text-white w3-padding-200 w3-center w3-panel w3-cyan w3-round-large" style="width: 50%;">CPF: </h2>
  <h2 class="w3-text-white w3-padding-200 w3-center w3-panel w3-cyan w3-round-large" style="width: 50%;">EMAIL: </h2>
  <h2 class="w3-text-white w3-padding-200 w3-center w3-panel w3-cyan w3-round-large" style="width: 50%;">DATA DE NASCIMENTO: </h2>
  <div class="w3-padding-128 w3-content w3-text-grey" id="eProfissional">
    <h2 class="w3-text-cyan">Formação Acadêmica</h2>
  </div>
  <form action="" method="post" class="w3-container w3-light-grey w3-textblue w3-margin w3-center" style="width: 50%;">
    <div class="w3-row w3-section">
      <div class="w3-container">
        <table class="w3-table-all w3-centered">
          <thead>
            <tr class="w3-center w3-blue">
              <th>Início</th>
              <th>Fim</th>
              <th>Descrição</th>
            </tr>
            <thead>
        </table>
      </div>
    </div>
    </div>
  </form>
  <div class="w3-padding-128 w3-content w3-text-grey" id="eProfissional">
    <h2 class="w3-text-cyan">Experiência Profissional</h2>
  </div>
  <form action="" method="post" class="w3-container w3-light-grey w3-textblue w3-margin w3-center" style="width: 50%;">
    <div class="w3-row w3-section">
      <div class="w3-container">
        <table class="w3-table-all w3-centered">
          <thead>
            <tr class="w3-center w3-blue">
              <th>Início</th>
              <th>Fim</th>
              <th>Empresa</th>
              <th>Descrição</th>
            </tr>
            <thead>
        </table>
      </div>
    </div>
    </div>
  </form>


  </div>
</body>

</html>