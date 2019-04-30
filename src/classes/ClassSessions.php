<?php
namespace Src\Classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Model\ClassLogin;
use Src\Traits\TraitGetIp;
/**
 * Description of ClassSessions
 *
 * @author wsantos
 */
class ClassSessions {
    //put your code here
    
    private $login;
    private $timeSession=1200;
    private $timeCanary=300;
    
    /**
     * 
     */
    public function __construct() {
        if(session_id() == ''){
            ini_set("session.save_handler", "files");
            ini_set("session.use_cookies", 1);
            ini_set("session.use_only_cookies", 1);
            ini_set("session.cookie_domain", DOMAIN);
            ini_set("session.cookie_httponly", 1);
            if(DOMAIN != "localhost"){
                ini_set("session.cookie_secure", 1);
            }
            /**
             * criptografia das nossas sessions
             */
            ini_set("session.entropy_length", 512);
            ini_set("session.entropy_file", '/dev/urandom');
            ini_set("session.hash_function", 'sha256');
            ini_set("session.hash_bits_per_character", 5);
            session_start();
        }
        $this->login=new ClassLogin();
    }
    /**
     * protege contra roubo de sessão
     */
    public function setSessionCanary($par=null){
        session_regenerate_id(true);
        if($par == null){
            $_SESSION['canary']=[
                "birth"=> time(),
                "IP"=> TraitGetIp::getUserIp()
            ];
        }else{
            $_SESSION['canary']['birth']=time();
        }
    }
    /**
     * verifica a integridade da sessão
     */
    public function verifyIdSessions(){
        if(!isset($_SESSION['canary'])){
            $this->setSessionCanary();
        }
        if($_SESSION['canary']['IP'] !== TraitGetIp::getUserIp()){
            $this->destructSessions();
            $this->setSessionCanary();
        }
        if($_SESSION['canary']['birth'] < time() - $this->timeCanary){
            $this->setSessionCanary("time");
        }
    }
    /**
     * seta as sessões do nosso sistema
     */
    public function setSessions($usuario){
        $this->verifyIdSessions();
        $_SESSION["login"]=true;
        $_SESSION["time"]= time();
        $_SESSION["name"]=$this->login->getDataUser($usuario)['data']['nome'];
        $_SESSION["email"]=$this->login->getDataUser($usuario)['data']['email'];
        $_SESSION["permition"]=$this->login->getDataUser($usuario)['data']['tipo'];
        //return $_SESSION;
    }
    /**
     * valida as paginas internas do app
     */
    public function verifyInsideSession($permition){
       $this->verifyIdSessions();
       if(!isset($_SESSION['login']) || !isset($_SESSION['permition']) || !isset($_SESSION['canary'])){
           $this->destructSessions();           
           echo "<script>window.location.href='".DIRPAGE."/Acesso_negado'</script>";
           die();
           
       }else{
           if($_SESSION['time'] >=time() - $this->timeSession){
               $_SESSION['time']=time();
               if($_SESSION['permition']!= "administrador" && $permition != $_SESSION['permition'] && $_SESSION['permition'] != "super-admin"){
                   echo "<script>alert('Você não tem permissão!');window.location.href='".DIRPAGE."/home'</script>";                   
               }
               
           }else{
               $this->destructSessions();               
               echo "<script>window.location.href='".DIRPAGE."/Acesso_negado'</script>";
               die();
           }
       }
    }
    /**
     * destroi as sessions existentes
     */
    public function destructSessions(){
        foreach (array_keys($_SESSION) as $key){
            unset($_SESSION[$key]);
            session_destroy();
        }
    }
}
