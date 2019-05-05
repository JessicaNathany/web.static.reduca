<?php

/**
 * 
 */
$busca = "SELECT * FROM tb_geminacao";
$total_reg = "10";


$pagina = $_GET['pagina'];

if(!$pagina){
    $pc = "1";
}else{
    $pc=$pagina;
}  


$inicio = $pc -1;
$inicio = $inicio * $total_reg;

$limite=$PDO->query("{$busca} LIMIT {$inicio}, {$total_reg}");
$todos=$PDO->query($busca);
$tr=$todos->rowCount();
$tp=$tr/$total_reg;

$anterior = $pc-1;
$proximo = $pc+1;
    
?>
