<?php
$PDO = new \PDO("mysql:host=".HOST.":".PORT.";dbname=".DB."","".USER."","".PASS."");
$germinacao= "SELECT SUM(qtde)FROM tb_geminacao";
$qtdeGerminacao=$PDO->query($germinacao)->fetchColumn();

$repicagem="SELECT SUM(qtde)FROM tb_repicagem";
$qtdeRepicagem=$PDO->query($repicagem)->fetchColumn();


