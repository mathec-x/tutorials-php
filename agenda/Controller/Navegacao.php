<?php
function import($path)
{
  $path = strpos($path, '.php') ? $path : $path . '.php';
  include_once dirname(__DIR__) . $path;
}
// ob_start();  
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST["btnPrimeiroAcesso"])) {
  import('/View/primeiroAcesso');
} else {
  if (isset($_POST["btnCadastrar"])) {
    import('/Model/Usuario');
    require_once '../Controller/UsuarioController.php';

    $uController = new UsuarioController();

    if ($uController->inserir($_POST["txtNome"], $_POST["txtCPF"], $_POST["txtEmail"], $_POST['txtSenha'])) {
      import('/View/cadastroRealizado');
    } else {
      import('/View/cadastroNRealizado');
    }
  } else {
    if (isset($_POST["btnCadRealizado"])) {
      import('/View/principal');
    } else {
      if (isset($_POST["btnCadNRealizado"])) {
        import('/View/primeiroAcesso');
      } 
      else {
        if(!$_SESSION['Usuario']){
          import('/View/login');
        }
      }
    }
  }
}

if (isset($_POST["btnAtualizar"])) {
  require_once '../Controller/UsuarioController.php';
  $uController = new UsuarioController();

  if ($uController->atualizar($_POST["txtID"], $_POST["txtNome"], $_POST["txtCPF"], $_POST["txtEmail"], $_POST['txtData'])) {
    import('/View/atualizacaoRealizada');
  } else {
    import('/View/operacaoNRealizada');
  }
}

if (isset($_POST["btnAtualizacaoCadastro"]) || isset($_POST["btnOperacaoNRealizada"]) || isset($_POST["btnInfInserir"])) {
  import('/View/principal');
} else {
  import('/Controller/FormacaoAcadController');
}

if (isset($_POST["btnLogin"])) {
  require_once '../Controller/UsuarioController.php';
  $uController = new UsuarioController();
  if ($uController->login($_POST['txtLogin'], $_POST['txtSenha'])) {
    import('/View/principal');
  } else {
    import('/View/cadastroNRealizado');
  }
}

if (isset($_POST["btnAddFormacao"])) {
  require_once '../Controller/FormacaoAcadController.php';
  import('/Model/Usuario');
  $fController = new FormacaoAcadController();
  if ($fController->inserir($_POST['txtInicioFA'], $_POST["txtFimFA"], $_POST["txtDescFA"], unserialize($_SESSION['Usuario'])->getID()) != false) {
    import('/View/informacaoInserida');
  } else {
    import('/View/operacaoNRealizada');
  }
}

if (isset($_POST["btnExcluirFA"])) {
  require_once '../Controller/FormacaoAcadController.php';
  import('/Model/Usuario');
  $fController = new FormacaoAcadController();
  if ($fController->remover($_POST['id']) == true) {
    import('/View/informacaoExcluida');
  } else {
    import('/View/operacaoNRealizda');
  }
}

if (isset($_POST["btnPrincipal"]) || isset($_POST["btnAtualizacaoCadastro"]) || isset($_POST["btnCadRealizado"]) || isset($_POST["btnInfInserir"]) || isset($_POST["btnInfExcluir"])) {
  import('/View/principal');
}

if (isset($_POST["btnAddEP"])) {
  require_once '../Controller/ExperienciaProfissionalController.php';
  import('/Model/Usuario');
  $epController = new ExperienciaProfissionalController();
  if ($epController->inserir($_POST['txtInicioEP'], $_POST["txtFimEP"], $_POST["txtEmpEP"], $_POST["txtDescEP"], unserialize($_SESSION['Usuario'])->getID()) != false) {
    import('/View/informacaoInserida');
  } else {
    import('/View/operacaoNRealizada');
  }
}

if (isset($_POST["btnExcluirEP"])) {
  require_once '../Controller/ExperienciaProfissionalController.php';
  import('/Model/Usuario');
  $epController = new ExperienciaProfissionalController();
  if ($epController->remover($_POST['idEP']) == true) {
    import('/View/informacaoExcluida');
  } else {
    import('/View/operacaoNRealizada');
  }
}

if (isset($_POST["btnAddOF"])) {
  require_once '../Controller/OutrasFormacoesController.php';
  import('/Model/Usuario');
  $fController = new OutrasFormacoesController();
  
  if ($fController->inserir($_POST['txtInicioOF'], $_POST["txtFimOF"], $_POST["txtDescOF"], unserialize($_SESSION['Usuario'])->getId() )) {
    import('/View/informacaoInserida');
  } else {
    import('/View/operacaoNRealizada');
  }
}

if (isset($_POST["btnExcluirOF"])) {
  require_once '../Controller/OutrasFormacoesController.php';
  import('/Model/Usuario');
  $fController = new OutrasFormacoesController();

  if ($fController->remover($_POST['id']) == true) {
    import('/View/informacaoExcluida');
  } else {
    import('/View/operacaoNRealizada');
  }
}

if (isset($_POST["btnADM"])) {
  import('/View/ADMLogin');
}
if (isset($_POST["btnListarCadastrados"])) {
  import('/View/ADMListarCadastrados');
}
if (isset($_POST["btnVoltar"])) {
  import('/View/ADMPrincipal');
}
