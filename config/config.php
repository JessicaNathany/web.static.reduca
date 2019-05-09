<?php
/**
 * @author Wanclei <sanclei.santos@fatec.sp.gov.br>
 * Nome da pasta da sua aplicação
 */
$PastaInterna="web.static.reduca";

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
define('DIRIMG',DIRPAGE."/public/images/");

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
*
 */
define('HOST',"localhost");

/**
 * @Nome do banco de danos
 * 
 */
define('DB',"");

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
define('PORT',"");



