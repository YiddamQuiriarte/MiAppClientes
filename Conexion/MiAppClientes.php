<?php 
/**
 * Programa que desarrolla la funcion de establecer una coneción especial
 *
 * PHP version 5 compatible
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   CategoryName
 * @package    MiAppClientes
 * @author     Autor <yiddam@gmail.com> 
 * @copyright  2015 Mayan Software
 * @license    http://fb.me/yiddam
 */

?>
<?php

  /**
 * Establece una conexion especial a la base de datos.
 */
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MiAppClientes = "localhost";
$database_MiAppClientes = "MiAppClientes";
$username_MiAppClientes = "root";
$password_MiAppClientes = "pws777";
$MiAppClientes = mysql_pconnect($hostname_MiAppClientes, $username_MiAppClientes, $password_MiAppClientes) or trigger_error(mysql_error(),E_USER_ERROR); 
?>