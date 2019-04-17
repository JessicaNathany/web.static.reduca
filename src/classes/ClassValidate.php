<?php
    namespace Src\Classes;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Model\ClassUser;
use App\Model\ClassLogin;
use ZxcvbnPhp\Zxcvbn;
use Src\Classes\ClassPassword;
use Src\Classes\ClassSessions;

class ClassValidate {
    /**
     * 
     */
    private $erro=[];
    /**
     * 
     */
    private $User;
    /**
     * 
     */
    private $password;
    /**
     * 
     */
    private $login;
    /**
     * 
     */
    private $tentativas;
    /**
     * 
     */
    private $session;
    
    public function __construct() {
        $this->User= new ClassUser();
        $this->password= new ClassPassword();
        $this->login= new ClassLogin();
        $this->session= new ClassSessions();
    }
    
    function getErro() {
        return $this->erro;
    }

    function setErro($erro) {
        array_push($this->erro, $erro);
    }

     /**
     * Validar se todos os campos foram preenchidos
     */
    public function validateFields($par){
        
        $i=0;
        foreach ($par as $key => $value) {
           if(empty($value)){
               $i++;
           }
        }
        if($i==0){
            return true;
        }
        else{
            $this->setErro("Preencha todos os dados!");
            return false;
        }
    }
    /**
     * 
     * Valida se um dado é um email.
     */
    public function validateEmail($par){
        if(filter_var($par, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            $this->setErro("Email invalido!");
            return false;
        }
    }
    /**
     * 
     * Validar se o email já existe no banco de dados
     */
    public function validateIssetEmail($email, $action=null){
        $select=$this->User->getIssetEmail($email);
        
        if($action == null){
            if($select > 0){
                $this->setErro("Email ja cadastrado no sistema!");
                return false;
            }else{
                return true;
            }
        }else{
            if($select > 0){
                return true;
            }else{
                $this->setErro("Email nao cadastrado!");
                return false;
            }
        }
    }
    /**
     * 
     * Verifica se a senha é igual a senha de confirmação
     * 
     */
    public function validateRepSenha($senha, $repSenha){
        if($senha === $repSenha){
            return true;
        }else{
            $this->setErro("Senha diferente de confirmacao de senha!");
        }
    }
    /**
     * 
     * verifica a força da senha
     * https://github.com/bjeavons/zxcvbn-php
     * 
     */
    public function validateStrongSenha($senha, $par=null){
       $zxcvbn=new Zxcvbn();
       $strength = $zxcvbn->passwordStrength($senha);
       
       if($par == null){
           if($strength['score'] <= 8){
               return true;
           }else{
               $this->setErro("A Senha deve conter 8 caracteres!");
           }
       }else{
           /* login */
       }
    }
    /**
     * 
     * Valida a senha com a senha criptografada no banco de dados.
     * 
     */
    public function validateSenha($usuario,$senha){
        if($this->password->verifyHash($usuario, $senha)){
            return true;
        }else{
            $this->setErro("Usuário ou Senha Inválidos!");
            
        }
    }
    /**
     * 
     * 
     * verifica se o captcha está correto.
     */
    public function validateCaptcha($captcha, $score=0.5){
        $return = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRETKEY."&response={$captcha}");
        $response = json_decode($return);
        
        if($response->success == TRUE && $response->score >= $score){
            return true;
        }else{
            $this->setErro("Captcha Invalido! => Atualize a pagina e tente novamente!"); 
        }
    }
    /**
     * 
     * Valida se um dado é um usuario
     */
    public function validateUsuario($user,$action=null){
       $select=$this->User->getIssetUser($user);
        
        if($action == null){
            if($select > 0){
                $this->setErro("Usuario ja cadastrado no sistema!");
                return false;
            }else{
                return true;
            }
        }else{
            if($select > 0){
                return true;
            }else{
                $this->setErro("Usuario nao cadastrado!");
                return false;
            }
        } 
    }
    /**
     * 
     * Valida se um dado é um nome.
     */
    public function validateNome($par){
        
    }
    /**
     * 
     * Valida se um dado é uma data.
     */
    public function validateData($par){
        $data= \DateTime::createFromFormat("d/m/Y", $par);
    }
    /**
     * 
     * Valida se um dado é uma data.
     */
    public function validateFinal($arrVar){
       
        if(count($this->getErro())>0){
           $arrResponse=[
               "retorno"=>"erro",
               "erros"=>$this->getErro()
           ]; 
        }else{
            $arrResponse=[
               "retorno"=>"success",
               "erros"=>NULL
           ];
             $this->User->insertUser($arrVar);
        }
        return json_encode($arrResponse);
    }
    /**
     * 
     * 
     */
    public function validateAttemptLogin(){
        if($this->login->countAttempt()>=5){
            $this->setErro("Você realizou mais de 5 tentativas!");
            $this->tentativas=true;
            return false;
        }else{
            $this->tentativas=false;
            return true;
        }
    }
    /**
     * 
     * 
     */
    public function validateFinalLogin($usuario){
        if(count($this->getErro())> 0){
            $this->login->insertAttempt();
        }else{
            $this->login->deleteAttempt();
            $this->session->setSessions($usuario);
        }
    }
} 