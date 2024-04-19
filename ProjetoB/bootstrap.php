<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

#use Php\Primeiroprojeto\Router
$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', 
    'Php\Primeiroprojeto\Controllers\HomeController@olaMundo');

$r->get('/olapessoa/{nome}', function($params){ 
    return 'Olá'.$params[1]; 
} );

$r->get('/exer1/formulario', 
    'Php\Primeiroprojeto\Controllers\HomeController@formExer1');

$r->post('/exer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "A soma é: {$soma}";
});

$r->get('/exer4/formulario', function(){
    require_once('exer4.html');
});

$r->post('/exer4/resposta', function(){
    $valor = $_POST['valor1'];
    $resposta = "";
    for ($i=1; $i<=10; $i++){
        $resultado = $valor * $i;
        $resposta .= "$valor x $i = $resultado<br/>";
    }
    return $resposta;
});

//Chamando o formulário para inserir categoria
$r->get('/categoria/inserir',
    'Php\Primeiroprojeto\Controllers\CategoriaController@inserir');

$r->post('/categoria/novo',
    'Php\Primeiroprojeto\Controllers\CategoriaController@novo');

//formulario da tabela Dispositivos
$r->get('/dispositivos/inserir',
    'Php\Primeiroprojeto\Controllers\DispositivosController@inserir');

$r->post('/dispositivos/novo',
    'Php\Primeiroprojeto\Controllers\DispositivosController@novo');
    
//formulario da tabela Eventos
$r->get('/eventos/inserir',
    'Php\Primeiroprojeto\Controllers\EventosController@inserir');

$r->post('/eventos/novo',
    'Php\Primeiroprojeto\Controllers\EventosController@novo');
    
//formulario da tabela Jogos
$r->get('/jogos/inserir',
    'Php\Primeiroprojeto\Controllers\JogosController@inserir');

$r->post('/jogos/novo',
    'Php\Primeiroprojeto\Controllers\JogosController@novo');
    
//formulario da tabela Usuario
$r->get('/usuario/inserir',
    'Php\Primeiroprojeto\Controllers\UsuarioController@inserir');

$r->post('/usuario/novo',
    'Php\Primeiroprojeto\Controllers\UsuarioController@novo');
    

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



