<?php
if (!isset($_SESSION)) {
  session_start();
}
class AdministradorController
{
  public function login($cpf, $senha)
  {
    require_once '../Model/Administrador.php';
    $administrador = new Administrador();
    $administrador->carregarAdministrador($cpf);
    if ($administrador->getSenha() == $senha) {
      $_SESSION['Administrador'] = serialize($administrador);
      return true;
    } else {
      if (isset($_POST["btnLoginADM"])) {
        require_once '../Controller/AdministradorController.php';
        $aController = new AdministradorController();
      }
      if ($aController->login($_POST['txtLoginADM'], $_POST['txtSenhaADM'])) {
        include_once '../View/ADMPrincipal.php';
      } else {
        return true;
      }
      return false;
    }
  }
  public function gerarLista()
  {
    require_once '../Model/Administrador.php';
    $u = new Administrador();
    return $results = $u->listaCadastrados();
  }
}
