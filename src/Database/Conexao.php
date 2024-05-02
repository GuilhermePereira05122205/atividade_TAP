<?php
namespace Projeto\Database;

use PDO;
use PDOException;

class Conexao{
    private $host;
    private $db;
    private $user;
    private $pass;
    private $charset;
    private $query;
    private $pdo;
 
    public function __construct() {
        $this->host = 'localhost';
        $this->db   = 'portfolios';
        $this->user = 'root';
        $this->pass = 'senha';
        $this->charset = 'utf8mb4';
    }
 
    public function conectar() {
       
 
    $this->query = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";

    try {
        $this->pdo = new PDO($this->query, $this->user, $this->pass);
        return $this->pdo;
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
   
  }
}


?>


