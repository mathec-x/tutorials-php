<?php

class ConexaoBD

{

  private $serverName = "localhost_1";
  private $userName = "root";
  private $password = "usbw";
  private $dbName = "projeto_final";

  public function conectar()
  {
    $conn = new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
    /* check connection */
    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
    }
    return $conn;
  }
}
