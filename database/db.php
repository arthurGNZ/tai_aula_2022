<?php 
class BD{

    private $host ="localhost";// ip que está conectando 
    private $dbname ="db_aula_tai";// nome do bd criado
    private $port = 3306; // porta que vai se conectar
    private $usuario = "root"; //
    private $senha = "";
    private $db_charset = "utf8";

    public function conn(){// função p/ conexão com bd
        $conn = "mysql:host=$this->host;
            dbname=$this->dbname; port=$this->port";// $conn = string de conexão  

        return new PDO($conn,$this->usuario, $this->senha,
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ". $this->db_charset]
    );
    }

    public function select(){
        $conn = $this->conn();
        $st = $conn->prepare("SELECT * FROM usuario;");
        $st->execute();
        return $st;
    }
    public function insert ($dados){
            $sql = "INSERT INTO usuario(nome,telefone,cpf) VALUES(?,?,?)";
            $conn = $this->conn();
            $stmt = $conn->prepare($sql);
            $arrayDados= [$dados['nome'],$dados['telefone'],$dados['cpf']];
            $stmt->execute($arrayDados);
            return $stmt;
        }
    public function update ($dados){
            $sql = "UPDATE usuario SET 'nome'=? 'telefone'=? 'cpf'=? WHERE 'id'=?";
            $conn = $this->conn();
            $stmt = $conn->prepare($sql);
            $arrayDados = [$dados['nome'],$dados['telefone'],$dados['cpf'], $dados['id']];
            $stmt->execute($arrayDados);
            return $stmt;
    }
    public function delete ($id){
        $sql = "DELETE FROM usuario WHERE 'id'=?";
        $conn = $this->conn();
        $stmt = $conn->prepare($sql);
        $arrayDados = [$id];
        $stmt->execute($arrayDados);
        return $stmt;
    }
    public function find ($id){
        $sql = "SELECT * FROM usuario WHERE id=?";
        $conn = $this->conn();
        $stmt = $conn->prepare($sql);
        $arrayDados = [$id];
        $stmt->execute($arrayDados);
        return $stmt->fetchObject();
    }
    }