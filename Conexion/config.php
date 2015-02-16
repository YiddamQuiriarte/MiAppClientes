<?php 
/**
 * Programa que desarrolla la funcion de actualizar
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
 * Establece la conecion a la base de datos.
 */

// Conectar a base de datos
$link = mysql_connect('localhost', 'root', 'pws777');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

if (! mysql_select_db('MiAppClientes') ) {
    die ('Can\'t use foo : ' . mysql_error());
}

?>
