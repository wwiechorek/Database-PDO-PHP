<?php
include 'spl_autoload.php';

use Libraries\Database\Database;

//conexão basica - local
//variaveis definidas
//host = localhost
//driver = mysql
//user = root
//charset = utf8
//pass = 123456
Database::newConnection([
  "dbname" => 'nome_do_db',
  'error' => function($err) {
    echo $err; exit;
  }
]);

//criando conexão completa
//segundo parametro da função é o nome da instancia
Database::newConnection([
  'driver' => 'mysql',
  'host' => 'localhost',
  "dbname" => 'nome_do_db',
  'user' => 'root',
  'pass' => '123456',
  'charset' => 'utf8',
  'error' => function($err) {
    echo $err; exit;
  }
], 'db');


//pegado conexao
class teste extends Libraries\Database\Database {
  function executandoQuery() {
    $this->db->query("{QUERY}");
  }
}

//ou
$db = Database::getInstance();

//ou
$db = new Database();
$db = $db->db;



//conectando em mais de um banco
//definida instancia como 'sb', no segundo parametro da função
Database::newConnection([
  "dbname" => 'segundo_banco',
  'error' => function($err) {
    echo $err; exit;
  }
], 'sb');


//pegado conexao
class teste extends Libraries\Database\Database {
  function executandoQuery() {
    //banco instancia: db
    $this->db->query("{QUERY}");
    //banco instancia: sb
    $this->sb->query("{QUERY}");
  }
}

//ou
$sb = Database::getInstance('sb');

//ou
$sb = new Database();
$sb = $sb->sb;




//funções da instancia do banco

//Mesma função do mysql_real_escape_string
$campo = $db->escape('Valor do campo');

//retorna o ultimo id inserido no banco
$db->insertId();

//executa a query, retorna um objeto com funções
$query = $db->query('QUERY');

//se for query de busca, retorna em objeto
$result = $query->result();
print_r($result);

//se for query de busca, retorna em array associativo
$resultAssoc = $query->resultAssoc();
print_r($resultAssoc);

//No mysql retona o total de resultados de uma query de busca ou alteração/exclusão
$numRows = $query->rowCount();
echo $numRows;
