<?php

if (!isset($_SESSION)) {
  session_start();
}
class UsuarioController
{

  public function atualizar($id, $nome, $cpf, $email, $dataNascimento)
  {
    require_once '../Model/Usuario.php';
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($nome);
    $usuario->setCPF($cpf);
    $usuario->setEmail($email);
    $usuario->setDataNascimento($dataNascimento);
    $r = $usuario->atualizarBD();
    $_SESSION['Usuario'] = serialize($usuario);
    return $r;
  }

  public function inserir($nome, $cpf, $email, $senha)
  {
    require_once '../Model/Usuario.php';
    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setCPF($cpf);
    $usuario->setEmail($email);
    $usuario->setSenha($senha);
    $r = $usuario->inserirBD();

    return $r;
  }

  public function login($cpf, $senha)
  {
    require_once '../Model/Usuario.php';
    $usuario = new Usuario();
    $usuario->carregarUsuario($cpf);
    if ($usuario->getSenha() == $senha) {
      $_SESSION['Usuario'] = serialize($usuario);
      return true;
    } else {
      return false;
    }
  }
  public function listarCadastrados()
  {
    require_once 'ConexaoBD.php';

    $con = new ConexaoBD();
    $conn = $con->conectar();
    if ($conn->connect_error) {
      die("Conection failed:" . $conn->connect_error);
    }
    $sql = "SELECT idadministrador, nome, cpf FROM adminitrador;";
    $re = $conn->query($sql);
    $conn->close();
    return true;
  }
}
