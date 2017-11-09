<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes
$app->post('/entrega', function (Request $request, Response $response) {
    $nome = $request->getAttribute('nome');
    $dsn = "mysql:dbname=dm107pos;host=127.0.0.1";
    $pdo = new PDO($dsn, "root", "");
    $db = new NotORM($pdo);

    $num_pedido = $request->getParam('num_pedido');
    $recebedor_nome = $request->getParam('recebedor_nome');
    $recebedor_cpf = $request->getParam('recebedor_cpf');
    $client_id = $request->getParam('client_id');
    $data_entrega = $request->getParam('data_entrega');

    $entregas = $db->entrega();
    $data = array(
        "num_pedido" => $request->getParam('num_pedido'),
        "recebedor_nome" =>  $request->getParam('recebedor_nome'),
        "recebedor_cpf" => $request->getParam('recebedor_cpf'),
        "client_id" => $request->getParam('client_id'),
        "data_entrega" => $request->getParam('data_entrega'),
    );
    $result = $entregas->insert($data);
    $code = 201; 
    $response->withStatus(201)->getBody()->write('Entrega criada com sucesso!');    
    return $response;
});

$app->put('/entrega/{id}', function (Request $request, Response $response) {
    $nome = $request->getAttribute('nome');
    $dsn = "mysql:dbname=dm107pos;host=127.0.0.1";
    $pdo = new PDO($dsn, "root", "");
    $db = new NotORM($pdo);
    $idToPut = $request->getAttribute('id');
    $num_pedido = $request->getParam('num_pedido');
    $recebedor_nome = $request->getParam('recebedor_nome');
    $recebedor_cpf = $request->getParam('recebedor_cpf');
    $client_id = $request->getParam('client_id');
    $data_entrega = $request->getParam('data_entrega');

    $entregas = $db->entrega()->where('id', $idToPut);
    $data = array(
        "num_pedido" => $request->getParam('num_pedido'),
        "recebedor_nome" =>  $request->getParam('recebedor_nome'),
        "recebedor_cpf" => $request->getParam('recebedor_cpf'),
        "client_id" => $request->getParam('client_id'),
        "data_entrega" => $request->getParam('data_entrega'),
    );
    $result = $entregas->update($data);
    $response->withStatus(200)->getBody()->write('Entrega criada com sucesso!');    
    return $response;
});

$app->delete('/entrega/{id}', function(Request $request, Response $response){
    $dsn = "mysql:dbname=dm107pos;host=127.0.0.1";
    $pdo = new PDO($dsn, "root", "");
    $db = new NotORM($pdo);
    $idToDelete = $request->getAttribute('id');
    $entregas = $db->entrega()->where('id', $idToDelete);

    foreach ($entregas as $entrega) {
        $result = $entregas->delete();
    }
    return $response->withStatus(200)->getBody()->write('Entrega DELETADA com sucesso!'); 
});