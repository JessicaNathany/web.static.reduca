<?php
/**
 * @author John Doe <john.doe@example.com>
 * Nome da pasta da sua aplicação
 */
$PastaInterna="MVC_php";

/* 
 * Diretorio responsavel pela virtualização da aplicação, 
 * nele é possivel chamar via URL.
 */
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$PastaInterna}");

/**
 * Caminho fisico da aplicação onde é possível fazer o acesso a pasta raiz,
 * bem como fazer requisições, chamando a constante referente.
 * @filesource 
 * 
 */
if(substr($_SERVER['DOCUMENT_ROOT'], -1)=='/'){    
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$PastaInterna}");    
}else{
    define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}/{$PastaInterna}"); 
}

/**
 * Acesso ao diretorio de imagens
 * 
 */
define('DIRIMG',DIRPAGE."/public/img/");

/**
 * Acesso ao diretorio css 
 * 
 */
define('DIRCSS', DIRPAGE."/public/css/");

/**
 * Acesso ao diretorio javascripts
 * 
 */
define('DIRJS', DIRPAGE."/public/js/");

/**
 * Acesso ao banco de dados
 * @Localhost
 * bdviveiro.cvhlj6vjnqjk.us-east-2.rds.amazonaws.com
 */
define('HOST',"localhost");

/**
 * @Nome do banco de danos
 * 
 */
define('DB',"bd_viveiro");

/**
 * @Usuario do banco
 * 
 */
define('USER',"root");

/**
 * @password do banco de dados
 * 
 */
define('PASS',"");

/**
 * @Port
 * 
 */
define('PORT',"3307");
/**
 * 
 * KEYS GOOGLE ANALITYCS E RECAPTCHA
 * @SITEKEY
 */
define('SITEKEY',"6LcF-J0UAAAAAEO7HPxzPhO6Kj6XqLUyTSII-q7Y");
/**
 * @SECRETKEY
 * 
 */
define('SECRETKEY',"6LcF-J0UAAAAAGaD3MskPMNSFB09PXFvrW1esfqJ");
/**
 * 
 * 
 */
define('DOMAIN',$_SERVER["HTTP_HOST"]);