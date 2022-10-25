<?php

header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$database = "agenda";
$user = "root";
$senha = "root";

try{
  $conexao = new PDO("mysql:host=$host;dbname=$database;",$user, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}catch(PDOException $e){
    echo 'Falha ao conectar no banco de dados: '.$e->getMessage();
  die;
}
?>