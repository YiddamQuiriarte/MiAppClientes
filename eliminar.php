<?php 
/**
 * Programa que desarrolla la funcion de eliminar
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
<? 
  /**
 * Consulta a la base de datos.
 */
include('menu.php');
include('Conexion/config.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `clientes` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "Clienete borrado con exito.<br /> " : "No se borro nada.<br /> "; 
?> 

<a href='consultar.php'>Volver a la lista de clientes</a>