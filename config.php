<?php
$DB_HOST='sql300.infinityfree.com';
$DB_NAME='SEU_BANCO_DE_DADOS';
$DB_USER='SEU_USUARIO';
$DB_PASS='SUA_SENHA';
try{$pdo=new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4",$DB_USER,$DB_PASS,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_EMULATE_PREPARES=>false]);}catch(Throwable $e){http_response_code(500);exit('Erro de conexão com o banco. Confira o config.php.');}
