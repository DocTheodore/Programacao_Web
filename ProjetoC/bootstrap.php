<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php\Primeiroprojeto\Router
$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

//formulario da tabela Dispositivos
$r->get('/dispositivos/inserir',
    'Php\Primeiroprojeto\Controllers\DispositivosController@inserir');
 
$r->get('/dispositivos/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\DispositivosController@alterar');

$r->get('/dispositivos/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\DispositivosController@excluir');

$r->post('/dispositivos/novo',
    'Php\Primeiroprojeto\Controllers\DispositivosController@novo');

$r->post('/dispositivos/editar',
    'Php\Primeiroprojeto\Controllers\DispositivosController@editar');

$r->post('/dispositivos/deletar',
    'Php\Primeiroprojeto\Controllers\DispositivosController@deletar');

$r->get('/dispositivos',
    'Php\Primeiroprojeto\Controllers\DispositivosController@index');

$r->get('/dispositivos/{acao}/{status}',
    'Php\Primeiroprojeto\Controllers\DispositivosController@index');
    
//formulario da tabela Eventos
$r->get('/eventos/inserir',
    'Php\Primeiroprojeto\Controllers\EventosController@inserir');
 
$r->get('/eventos/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\EventosController@alterar');

$r->get('/eventos/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\EventosController@excluir');

$r->post('/eventos/novo',
    'Php\Primeiroprojeto\Controllers\EventosController@novo');

$r->post('/eventos/editar',
    'Php\Primeiroprojeto\Controllers\EventosController@editar');

$r->post('/eventos/deletar',
    'Php\Primeiroprojeto\Controllers\EventosController@deletar');

$r->get('/eventos',
    'Php\Primeiroprojeto\Controllers\EventosController@index');

$r->get('/eventos/{acao}/{status}',
    'Php\Primeiroprojeto\Controllers\EventosController@index');
    
//formulario da tabela Jogos
$r->get('/jogos/inserir',
    'Php\Primeiroprojeto\Controllers\JogosController@inserir');
 
$r->get('/jogos/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\JogosController@alterar');

$r->get('/jogos/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\JogosController@excluir');

$r->post('/jogos/novo',
    'Php\Primeiroprojeto\Controllers\JogosController@novo');

$r->post('/jogos/editar',
    'Php\Primeiroprojeto\Controllers\JogosController@editar');

$r->post('/jogos/deletar',
    'Php\Primeiroprojeto\Controllers\JogosController@deletar');

$r->get('/jogos',
    'Php\Primeiroprojeto\Controllers\JogosController@index');

$r->get('/jogos/{acao}/{status}',
    'Php\Primeiroprojeto\Controllers\JogosController@index');
    
//formulario da tabela Usuario
$r->get('/usuario/inserir',
    'Php\Primeiroprojeto\Controllers\UsuarioController@inserir');
 
$r->get('/usuario/alterar/id/{id}',
    'Php\Primeiroprojeto\Controllers\UsuarioController@alterar');

$r->get('/usuario/excluir/id/{id}',
    'Php\Primeiroprojeto\Controllers\UsuarioController@excluir');

$r->post('/usuario/novo',
    'Php\Primeiroprojeto\Controllers\UsuarioController@novo');

$r->post('/usuario/editar',
    'Php\Primeiroprojeto\Controllers\UsuarioController@editar');

$r->post('/usuario/deletar',
    'Php\Primeiroprojeto\Controllers\UsuarioController@deletar');

$r->get('/usuario',
    'Php\Primeiroprojeto\Controllers\UsuarioController@index');

$r->get('/usuario/{acao}/{status}',
    'Php\Primeiroprojeto\Controllers\UsuarioController@index');
    

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($r->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($r->getParams());
}