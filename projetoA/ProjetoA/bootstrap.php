<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', function (){
    return "Olá mundo!";
} );

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
} );

$r->get('/exer1/formulario', function(){
    include("exer1.html");
});

$r->post('/exer1/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    return "A soma é: {$soma}";
});

//Exercicios: 
#1
$r->get('/exercicio1/formulario', function(){
    include("exercicio1.html");
});
$r->post('/exercicio1/resposta', function(){
    $valor = $_POST['valor'];
    if($valor > 0) return "Valor Positivo.";
    else if($valor < 0) return "Valor Negativo.";
    else return "Igual a Zero.";
});

#2
$r->get('/exercicio2/formulario', function(){
    include("exercicio2.html");
});
$r->post('/exercicio2/resposta', function(){
    $menor = 999999999999999999;
    $pos = 0;
    for($i = 1; $i <= 7; $i++){
        if($menor > $_POST["valor$i"]){
            $menor = $_POST["valor$i"];
            $pos = $i;
        }
    }
    return "O menor valor é $menor e ele esta na $pos posição";
});

#3
$r->get('/exercicio3/formulario', function(){
    include("exercicio3.html");
});
$r->post('/exercicio3/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];
    $soma = $valor1 + $valor2;
    $triplo = $soma * 3;
    if($valor1 == $valor2) return "Os dois valores são iguais, o triplo da soma é $triplo";
    return "A soma é: {$soma}";
});

#4
$r->get('/exercicio4/formulario', function(){
    include('exercicio4.html');
});
$r->post('/exercicio4/resposta', function(){
    $valor = $_POST['valor'];
    $tabuada = "";

    for($i = 0; $i <= 10; $i++){
        $valorMulti = $valor * $i;
        $tabuada .= "<p>{$valor} * {$i} = {$valorMulti}</p>";
    }

    return $tabuada;
});

#5
$r->get('/exercicio5/formulario', function(){

});

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

echo $resultado($r->getParams());


