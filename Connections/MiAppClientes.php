<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MiAppClientes = "localhost";
$database_MiAppClientes = "MiAppClientes";
$username_MiAppClientes = "root";
$password_MiAppClientes = "pws777";
$MiAppClientes = mysql_pconnect($hostname_MiAppClientes, $username_MiAppClientes, $password_MiAppClientes) or trigger_error(mysql_error(),E_USER_ERROR); 
?>