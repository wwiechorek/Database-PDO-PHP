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

###Perando a instancia da conexão

```PHP
$db = Database::getInstance();
```

###Funções da instancia
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
