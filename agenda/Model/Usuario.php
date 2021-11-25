<?php

class Usuario
{
  // atributos
  private $id;
  private $nome;
  private $cpf;
  private $email;
  private $dataNascimento;
  private $senha;

  // Senha
  public function getSenha()
  {
    return $this->senha;
  }

  public function setSenha($senha)
  {
    $this->senha = $senha;
    return $this;
  }

  // Data de Nascimento
  public function getDataNascimento()
  {
    return $this->dataNascimento;
  }

  public function setDataNascimento($dataNascimento)
  {
    $this->dataNascimento = $dataNascimento;
    return $this;
  }

  // Email
  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
    return $this;
  }

  // CPF
  public function getCpf()
  {
    return $this->cpf;
  }

  public function setCpf($cpf)
  {
    $this->cpf = $cpf;
    return $this;
  }

  // Nome
  public function getNome()
  {
    return $this->nome;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
    return $this;
  }

  // Id
  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function inserirBD()
  {
    require_once 'ConexaoBD.php';
    $con = new ConexaoBD();
    $conn = $con->conectar();
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuario (nome, cpf, email, senha) VALUES ('" . $this->nome . "', '" . $this->cpf . "', '" . $this->email . "','" . $this->senha . "')";
    if ($conn->query($sql) === TRUE) {
      $this->id = mysqli_insert_id($conn);
      $conn->close();
      return TRUE;
    } else {
      $conn->close();
      return FALSE;
    }
  }
  public function carregarUsuario($cpf)
  {
    require_once 'ConexaoBD.php';
    $con = new ConexaoBD();
    $conn = $con->conectar();
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM usuario WHERE cpf = '$cpf'";
    if ($re = $conn->query($sql)) {
      while ($r = $re->fetch_object()) {
        $this->id = $r->idusuario;
        $this->nome = $r->nome;
        $this->email = $r->email;
        $this->cpf = $r->cpf;
        $this->dataNascimento = $r->dataNascimento;
        $this->senha = $r->senha;
      }
      $conn->close();
      return true;
    } else {
      $conn->close();
      return false;
    }
  }

  public function atualizarBD()
  {
    require_once 'ConexaoBD.php';
    $con = new ConexaoBD();
    $conn = $con->conectar();
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE usuario SET nome = '" . $this->nome . "', cpf = '" . $this->cpf . "', dataNascimento ='" . $this->dataNascimento . "', email='" . $this->email . "' WHERE idusuario ='" . $this->id . "'";

    if ($conn->query($sql) === TRUE) {
      $conn->close();
      return TRUE;
    } else {
      $conn->close();
      return FALSE;
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
    $sql = "SELECT idusuario, nome, cpf FROM usuario;";
    $re = $conn->query($sql);
    $conn->close();
    return true;
  }
}
