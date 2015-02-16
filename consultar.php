<?php 
/**
 * Programa que desarrolla la funcion de establecer una consulta y realizarla
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
<!DOCTYPE html>
<html>
<head class="head">
    <title>Consultar</title>
    <meta charset="utf-8" />
    
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
body,td,th {
	color: #FFF;
}
body {
	background-color: #36F;
}
a:link {
	color: #FFF;
}
a:visited {
	color: #FFF;
}
a:hover {
	color: #FFF;
}
a:active {
	color: #FFF;
}
</style>
</head>
<body>

<p>
  <?php 
  /**
 * Consulta a la base de datos.
 */
include('menu.php');
include('Conexion/config.php'); 
echo "<table border=1 >";  
echo "<tr>"; 
echo "<td><b>Id</b></td>"; 
echo "<td><b>Estado Id</b></td>"; 
echo "<td><b>Nombre</b></td>"; 
echo "<td><b>Apellidos</b></td>"; 
echo "<td><b>Telefono</b></td>"; 
echo "<td><b>Email</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `clientes`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }


 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['estado_id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nombre']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['apellidos']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['telefono']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['email']) . "</td>";  
echo "<td valign='top'><a href=actualizar.php?id={$row['id']}>ACTUALIZAR</a></td><td><a href=eliminar.php?id={$row['id']}>ELIMINAR</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<p>&nbsp;</p>";

echo "<a href=agregar.php>NUEVO CLIENTE</a>"; 
?>

</body>
</html>