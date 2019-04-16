<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Src\Classes;
/**
 * Description of ClassVars
 *
 * @author ModoHacker
 */
use Src\Classes\ClassPassword;

class ClassHelperUser {
    //put your code here
    public static $nome;
    public static $usuario;
    public static $senha;
    public static $email;
    public static $tipo;
    public static $hashSenha;
    public static $repSenha;
    public static $gRecaptchaResponse;
    
    /****
     * 
     * 
     * 
     * 
     */
    function __construct() {
       self::$nome = self::getNome(); 
       self::$usuario = self::getUsuario(); 
       self::$senha = self::getSenha(); 
       self::$email = self::getEmail(); 
       self::$tipo = self::getTipo(); 
       self::$repSenha = self::getRepSenha();
       self::$hashSenha = self::getRepSenha();
       self::$gRecaptchaResponse = self::getGRecaptchaResponse();
       
    }
    
    /**
     * 
     * @return type
     * 
     */    
    static function getNome() {
        if(isset($_POST['nome'])){
            self::$nome = filter_input(INPUT_POST, 'nome', FILTER_DEFAULT);
            return self::$nome;
        }
        
        
    }
    /**
     * 
     * @return type
     */
    static function getUsuario() {
        if(isset($_POST['usuario'])){
            self::$usuario = filter_input(INPUT_POST, 'usuario', FILTER_DEFAULT);
            return self::$usuario;
        }
        
    }
    /**
     * 
     * @return type
     */
    static function getSenha() {
        if(isset($_POST['senha'])){
            self::$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
            return self::$senha;
        }
        
    }
    /**
     * 
     * @return type
     */
    static function getEmail() {
        if(isset($_POST['email'])){
           self::$email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
            return self::$email; 
        }
        
    }
    /**
     * 
     * @return type
     */
    static function getTipo() {
        if(isset($_POST['tipo'])){
           self::$tipo = filter_input(INPUT_POST, 'tipo', FILTER_DEFAULT);
            return self::$tipo; 
        }
        
    }
    /**
     * 
     * @return type
     */
    static function getHashSenha() {
        $objPass = new ClassPassword();
        self::$hashSenha = $objPass->passwordHash(self::$senha);
        return self::$hashSenha;
    }
    /**
     * 
     * @return type
     */
    static function getRepSenha() {
        if(isset($_POST['senha'])){
            self::$senha = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
            return self::$repSenha;
        }
        
        
    }
    static function getGRecaptchaResponse() {
        if( isset($_POST['g-recaptcha-response'])){
            self::$gRecaptchaResponse = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_DEFAULT);
           return self::$gRecaptchaResponse; 
        }else{
            return self::$gRecaptchaResponse == NULL;
        }
        
    }


        





  


    
    
}
