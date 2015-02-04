<? 
include('menu.php');
include('config.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `clientes` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "Clienete borrado con exito.<br /> " : "No se borro nada.<br /> "; 
?> 

<a href='consultar.php'>Volver a la lista de clientes</a>