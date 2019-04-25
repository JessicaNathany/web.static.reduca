<?php

try {
    $PDO = new \PDO("mysql:host=".HOST.":".PORT.";dbname=".DB."","".USER."","".PASS."");
} catch (\PDOException $erro) {
    return $erro->getMessage();
}
?>