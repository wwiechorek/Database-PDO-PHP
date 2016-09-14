# Database-PDO-PHP
Acesso ao banco de dados usando PDO - PHP.

#Conectando ao banco de dados MySql usando
Database::newConnection([
  "host" => "localhost",
  "dbname" => "nome_do_db",
  "user" => "root",
  "pass" => "123456",
  "error" => function($err) {
    echo $err; exit;
  }
]);
