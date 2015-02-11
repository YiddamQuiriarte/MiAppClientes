<?php

// Conectar a base de datos
$link = mysql_connect('localhost', 'root', 'pws777');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db('MiAppClientes') ) {
    die ('Can\'t use foo : ' . mysql_error());
}

?>
