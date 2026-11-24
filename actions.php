<?php
header('Content-Type: application/json; charset=utf-8'); header('Cache-Control: no-store'); require __DIR__.'/config.php';
function out($d,$s=200){http_response_code($s);echo json_encode($d,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);exit;}
try{$b=json_decode(file_get_contents('php://input')?:'{}',true)?:[];$a=$b['action']??'';$x=$b['args']??[];
if($a==='records.list'){$c=trim((string)($x['collection']??''));if(!$c)out(['error'=>'Coleção inválida'],400);$q=$pdo->prepare('SELECT id,value_json,created_at FROM app_records WHERE collection=? ORDER BY created_at ASC');$q->execute([$c]);$r=[];foreach($q->fetchAll() as $row)$r[]=['id'=>$row['id'],'value'=>json_decode($row['value_json'],true)?:[],'created_at'=>$row['created_at']];out(['data'=>['records'=>$r]]);}
if($a==='records.create'){$c=trim((string)($x['collection']??''));$id=trim((string)($x['id']??''));$v=$x['value']??[];if(!$c||!is_array($v))out(['error'=>'Dados inválidos'],400);if(!$id)$id=bin2hex(random_bytes(12));$q=$pdo->prepare('INSERT INTO app_records(id,collection,value_json) VALUES(?,?,?)');$q->execute([$id,$c,json_encode($v,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)]);out(['data'=>['id'=>$id,'value'=>$v]]);}
if($a==='records.delete'){$c=trim((string)($x['collection']??''));$id=trim((string)($x['id']??''));if(!$c||!$id)out(['error'=>'Dados inválidos'],400);$q=$pdo->prepare('DELETE FROM app_records WHERE collection=? AND id=?');$q->execute([$c,$id]);out(['data'=>['ok'=>true]]);}
out(['error'=>'Ação não suportada'],400);}catch(Throwable $e){out(['error'=>'Erro interno no servidor'],500);}
