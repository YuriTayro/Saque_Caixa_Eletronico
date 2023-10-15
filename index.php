<?php 

//CEDULAS DISPONIVEIS
$cedulas = [
    5,
    10,
    20,
    50,
    100
];

//INFORMA AS CEDULAS DISPONIVEIS PARA SAQUE
echo "Cédulas disponíveis: ".implode(', ',$cedulas)."\n";

//SOLICITA O VALOR DO SAQUE
$valorSaque = readline('Digite o valor para o saque: ');

//VERIFICA O VALOR DO SAQUE
if($valorSaque % $cedulas[0] > 0){
    die('O valor solicitado não pode ser atendido pelas cédulas disponíveis');
}

//AUXILIAR DO CALCULO DO VALOR RESTANTE
$valorRestante = $valorSaque;

//CEDULAS PARA O SAQUE
$cedulasSaque = [];

//PRIORIZA AS CEDULAS MAIORES(inverte os indices do array)
rsort($cedulas);

//ITERA AS CEDULAS DISPONIVEIS
foreach($cedulas as $cedula){

    //VERIFICA O VALOR DA CEDULA
    if($cedula > $valorRestante) continue;

    //QUANTIDADE DA CEDULA ATUAL
    $quantidade = floor($valorRestante/$cedula);

    //CALCULA O VALOR RESTANTE APÓS UTILIZAR A CEDULA ATUAL
    $valorRestante -= ($cedula*$quantidade);

    //CEDULA PARA O SAQUE
    $cedulasSaque[$cedula] = $quantidade;
}

//VALOR DO SAQUE
echo "\nSaque de R$".$valorSaque."\n";

//CEDULAS RETORNADAS
foreach($cedulasSaque as $cedula=>$quantidade){
    echo " > ".$quantidade."x R$".$cedula."\n";
}