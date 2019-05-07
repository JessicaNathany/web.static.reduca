<?php
/**
 * 
 * 
 * 
 * 
 * 
 * 
 * @uses element Description
 */
if(isset($_POST['nome'])){
    
    $nome= filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
    
    }else{ 
        $nome=null;
        
    }
/**
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
if(isset($_POST['usuario'])){
    
    $usuario= filter_input(INPUT_POST, 'usuario', FILTER_DEFAULT);
    
    }else{ 
        $usuario=null;

    }
/**
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
if(isset($_POST['email'])){
    
    $email= filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
    
    }else{
        $email=null;

    }
/**
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
if(isset($_POST['tipo'])){
    
    $tipo= filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
    
    }else{
        $tipo=null;

    }
/**
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
if(isset($_POST['senha'])){
    
    $senha=$_POST['senha'];
    $hashSenha='';
    
    }else{
        $senha=null; 
        $hashSenha=null;

    }
/**
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
if(isset($_POST['repSenha'])){
    $senha2=$_POST['repSenha'];
    
}else{
    $repSenha=null;
    
}/**
 * 
 * 
 * 
 * 
 */
$token= bin2hex(random_bytes(64));
/**
 * 
 * 
 * 
 * 
 * 
 * 
 */
/**
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */

$arrVar=[
    "nome"=>$nome,
    "usuario"=>$usuario,
    "email"=>$email,
    "senha"=>$senha,
    "tipo"=>$tipo,
];
