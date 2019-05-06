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
use App\Model\ClassCrud;
use PDO;


class ClassValidate extends ClassCrud{
    /**
     * 
     */
    private $erro;
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
    /**
     * 
     */
   
    
    public function __construct() {
        $this->User= new ClassUser();
        $this->password= new ClassPassword();
        $this->login= new ClassLogin();
        $this->session= new ClassSessions();
        
    }
    
    function getErro() {
        $msg = "";
        if($this->erro == 1){
            $msg = "Preencha todos os Campos!";
           
        }
        if($this->erro == 2){
             $msg = "Email invalido!";
            
        }
        if($this->erro == 3){
             $msg = "Email ja cadastrado no sistema!";
              
            
        }
        if($this->erro == 4){
             $msg = "Email nao cadastrado!";
            
        }
        if($this->erro == 5){
             $msg = "Senha diferente da confirmacao de senha!";
            
        }
        if($this->erro == 6){
             $msg = "A Senha deve conter 8 caracteres!";
            
        }
        if($this->erro == 7){
             $msg = "Usuário ou Senha Inválidos!";
            
        }
        if($this->erro == 8){            
             $msg = "Captcha Invalido! => Atualize a pagina e tente novamente!";
            
        }
        if($this->erro == 9){
             $msg = "Usuario ja cadastrado no sistema!";
            
        }
        if($this->erro == 10){
             $msg = "Usuario nao cadastrado!";
            
        }
        if($this->erro == 11){
             $msg = "Você realizou mais de 5 tentativas!";
        }
        return $msg;
        
    }

    function setErro($erro) {
        $this->erro = $erro;
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
            //Preencha todos os dados!
            $this->setErro(1);
           /** echo "<script>alert('{$this->getErro(1)}');window.location.href='".DIRPAGE."/{$_GET['url']}?pagina=1'</script>";
            die();*/
            }
            return false;
            
    }
    /**
     * 
     * Valida se um dado é um email.
     */
    public function validateEmail($par){
        if(filter_var($par, FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            //Email invalido!
            $this->setErro(2);
            return false;
            echo "<script>alert('{$this->getErro(2)}');window.location.href='".DIRPAGE."/{$_GET['url']}'</script>";
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
                //"Email ja cadastrado no sistema!"
                $this->setErro(3);
                echo "<script>alert('{$email} Já existe!');window.location.href='".DIRPAGE."/{$_GET['url']}'</script>";
                return false;
                
            }else{
                return true;
            }
        }else{
            if($select > 0){
                return true;
            }else{
                //"Email nao cadastrado!"
                $this->setErro(4);
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
            //"Senha diferente de confirmacao de senha!"
            $this->setErro(5);
            echo "<script>alert('Senha diferente!');window.location.href='".DIRPAGE."/{$_GET['url']}'</script>";
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
               //"A Senha deve conter 8 caracteres!"
               $this->setErro(6);
               echo "<script>alert('A Senha deve conter mais de 8 caracteres');window.location.href='".DIRPAGE."/{$_GET['url']}'</script>";
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
            //"Usuário ou Senha Inválidos!"
            $this->setErro(7);           
           
           $cont=$this->login->contBloq();
           if($cont >= 5){
               $this->verifyBloq($usuario);
           }else{
               echo "<script>alert('Usuário ou senha invalido');window.location.href='".DIRPAGE."/{$_GET['url']}'</script>";
           }
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
            //"Captcha Invalido! => Atualize a pagina e tente novamente!"
            $this->setErro(8); 
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
                //"Usuario ja cadastrado no sistema!"
                $this->setErro(9);
                echo "<script>alert('{$user} Já existe!');window.location.href='".DIRPAGE."/{$_GET['url']}'</script>";
                return false;
                
            }else{
                return true;
            }
        }else{
            if($select > 0){
                return true;
            }else{
                //"Usuario nao cadastrado!"
                $this->setErro(10);
                return false;
            }
        } 
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
       
        if($this->getErro()!= ""){
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
            //"Você realizou mais de 5 tentativas!"
            $this->setErro(11);
            $this->tentativas=true;
            echo "<script>alert('Usuário Bloqueado');window.location.href='".DIRPAGE."/{$_GET['url']}'</script>";
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
        $verify_bloq=$this->login->getDataUser($usuario);
        if($verify_bloq["data"]["status"]!=="bloq"){            
            if(!empty($this->getErro())){
                $this->login->insertAttempt();
                return false;
            }else{
                $this->login->deleteAttempt();
                $this->session->setSessions($usuario);
                return true;
            }
        }else{
            echo "<script>alert('Usuário Bloqueado! Contate o Admin.');window.location.href='".DIRPAGE."/{$_GET['url']}'</script>";
        }
    }
    /**
     * 
     */
    public function verifyBloq($usuario){
        $contA=$this->login->contBloq();
        
        if($contA >=5){
           $verify_exist=$this->login->getDataUser($usuario);
           if($verify_exist["rows"]>0){
               if($verify_exist["data"]["status"]!=="bloq"){
                    $sql = "update tb_users set status = :status where usuario= :usuario";
                    $pdo=$this->conexaoDB();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                        ':usuario' => $usuario,
                        ':status' => "bloq"                  
                    ));
                    if($stmt->rowCount()>0){
                        echo "<script>alert('Usuário Bloqueado!');window.location.href='".DIRPAGE."/{$_GET['url']}'</script>";
                    }
               }else{
                   echo "<script>alert('Usuário Bloqueado!');window.location.href='".DIRPAGE."/{$_GET['url']}'</script>";
               }
               
           }
        }else{            
            $sql = "update tb_users set status = :status where usuario= :usuario";
            $pdo=$this->conexaoDB();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                ':usuario' => $usuario,
                 ':status' => "null"                  
                ));                                    
        }
    }
    
} 