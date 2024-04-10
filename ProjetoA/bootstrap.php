<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new Php\Primeiroprojeto\Router($metodo, $caminho);

#ROTAS

$r->get('/olamundo', 'Php\Primeiroprojeto\Controllers\HomeController@olaMundo');

$r->get('/olapessoa/{nome}', function($params){
    return 'Olá '.$params[1];
} );

$r->get('/exer1/formulario', 'Php\Primeiroprojeto\Controllers\HomeController@formExer1');

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
    include('exercicio5.html');
});
$r->post('/exercicio5/resposta', function(){
    $valor = $_POST['valor'];
    $fatorial = 1;

    for($i=1; $i <= $valor; $i++){
        $fatorial *= $i;
    }

    return "O valor fatorial de $valor é $fatorial";
});

#6
$r->get('/exercicio6/formulario', function(){
    include('exercicio6.html');
});
$r->post('/exercicio6/resposta', function(){
    $valor1 = $_POST['valor1'];
    $valor2 = $_POST['valor2'];

    if($valor1 > $valor2) return "$valor2 $valor1";
    elseif($valor2 > $valor1) return "$valor1 $valor2";
    if($valor1 == $valor2) return "Numeros íguais. $valor1";
});

#7
$r->get('/exercicio7/formulario', function(){
    include('exercicio7.html');
});
$r->post('/exercicio7/resposta', function(){
    $valor = $_POST['valor'];
    $valorCentimetros = $valor * 100;
    
    return "$valor metros são $valorCentimetros centimetros";
});

#8
$r->get('/exercicio8/formulario', function(){
    include('exercicio8.html');
});
$r->post('/exercicio8/resposta', function(){
    $valor = $_POST['valor'];
    $litros = ceil($valor/3);
    $latas = ceil($litros/18);
    $custo = $latas * 80;
    
    return "serão nescessarias $latas latas de tinta, custando $custo";
});

#9
$r->get('/exercicio9/formulario', function(){
    include('exercicio9.html');
});
$r->post('/exercicio9/resposta', function(){
    $ano_nascimento = $_POST['ano'];
    $data_nascimento = explode("-", $ano_nascimento);

    $idade = date("Y")-$data_nascimento[0];
    $dias_vivo = (($idade)*365)-($data_nascimento[1]*30)+($data_nascimento[2]);
    $idade_futura = 2025-$data_nascimento[0];

    return "Idade atual: $idade <br/> Quantidades de dias que ja viveu: $dias_vivo <br/> Idade em 2025: $idade_futura";
});

#10
$r->get('/exercicio10/formulario', function(){
    include('exercicio10.html');
});
$r->post('/exercicio10/resposta', function(){
    $peso = $_POST['peso'];
    $altura = $_POST['altura']/100;
    $classificacao = "";

    $IMC = $peso/$altura**2;

    switch(true){
        case $IMC < 16:
            $classificacao = "Magreza Grau 3";
            break;
        case 16 <= $IMC && $IMC < 17:
            $classificacao = "Magreza Grau 2";
            break;
        case 17 <= $IMC && $IMC < 18.5:
            $classificacao = "Magreza Grau 1";
            break;
        case 18.5 <= $IMC && $IMC < 25:
            $classificacao = "Adequado";
            break;
        case 25 <= $IMC && $IMC < 30:
            $classificacao = "Pré-Obeso";
            break;
        case 30 <= $IMC && $IMC < 35:
            $classificacao = "Obesidade Grau 1";
            break;
        case 35 <= $IMC && $IMC < 40:
            $classificacao = "Obesidade Grau 2";
            break;
        case 40 <= $IMC:
            $classificacao = "Obesidade Grau 3";
            break;
    }

    return "<h1>Resultado</h1><p>Sua classificação de IMC é $classificacao</p><p>Para mais informações, <a href='https://www.prefeitura.sp.gov.br/cidade/secretarias/saude/noticias/?p=332991'>ver mais</a></p>";
});



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


