# Database-PDO-PHP
Acesso ao banco de dados usando PDO - PHP.

###Conectando ao banco de dados MySql usando
```PHP
Database::newConnection([
  "host" => "localhost",
  "dbname" => "nome_do_db",
  "user" => "root",
  "pass" => "123456",
  "error" => function($err) {
    echo $err; exit;
  }
]);
```

###Pegando a instância da conexão

```PHP
$db = Database::getInstance();
```

###Funções da instância
```PHP
//Mesma função do mysql_real_escape_string
$campo = $db->escape('Valor do campo');
```
```PHP
//retorna o ultimo id inserido no banco
echo $db->insertId();
```
```PHP
//executa a query, retorna um objeto com funções
$query = $db->query('{{QUERY_STRING}}');
```
###Opções para o objeto gerado pelo método 'query'
```PHP
//se for query de busca, retorna em objeto
$result = $query->result();
print_r($result);
```
```PHP
//se for query de busca, retorna em array associativo
$resultAssoc = $query->resultAssoc();
print_r($resultAssoc);
```
```PHP
//No mysql retona o total de resultados de uma query de busca ou alteração/exclusão
$numRows = $query->rowCount();
echo $numRows;
```

###Conectando em mais de um banco de dados
```PHP
//banco1, segundo parametro da função 'newConnection' é o nome da instância, default: db
Database::newConnection([
  "host" => "localhost",
  "dbname" => "nome_do_db",
  "user" => "root",
  "pass" => "123456",
  "error" => function($err) {
    echo $err; exit;
  }
]);

//banco2
Database::newConnection([
  "host" => "localhost",
  "dbname" => "nome_do_db2",
  "user" => "root",
  "pass" => "123456",
  "error" => function($err) {
    echo $err; exit;
  }
], 'db2');
```
###Pegando a instância das conexões
```PHP
//por default o getInstance passa 'db'
$db = Database::getInstance();
```
```PHP
$db2 = Database::getInstance('db2');
```

###Extendendo uma classe e pegando as instâncias da biblioteca. Exemplo:
```PHP
class NomeDaClasse extends Libraries\Database\Database {

  function exemplo() {
    //onde db é o nome da instância
    $campo = $this->db->escape('campo');
  }
  
  function exemploBanco2() {
  //onde db2 é o nome da instância
    $campo = $this->db2->escape('campo');

}
```
