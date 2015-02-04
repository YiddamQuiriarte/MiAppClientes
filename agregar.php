<?php require_once('Connections/MiAppClientes.php'); 
include('menu.php');?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_MiAppClientes, $MiAppClientes);
$query_Recordset1 = "SELECT * FROM estados";
$Recordset1 = mysql_query($query_Recordset1, $MiAppClientes) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<? 
include('config.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `clientes` ( `estado_id` ,  `nombre` ,  `apellidos` ,  `telefono` ,  `email`  ) VALUES(  '{$_POST['sel_estado']}' ,  '{$_POST['nombre']}' ,  '{$_POST['apellidos']}' ,  '{$_POST['telefono']}' ,  '{$_POST['email']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Cliente agregado.<br />"; 
echo "<a href='consultar.php'>Volver a la consulta</a>"; 
} 
?>
<style type="text/css">
.bold {
	font-weight: bold;
}
body,td,th {
	color: #FFF;
}
body {
	background-color: #36F;
}
</style>


<body link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF"><form action='' method='POST'> 
  <p><b>Nombre:</b><br /><input type='text' name='nombre'/> 
<p><b>Apellidos:</b><br /><input type='text' name='apellidos'/> 

<p><b>Telefono:</b><br /><input type='text' name='telefono'/> 

<p><b>Email:</b><br /><input type='text' name='email'/> 
  <p><span class="bold">Seleccionar Estado</span>
    <select name="sel_estado" id="sel_estado">
      <?php
do {  
?>
      <option value="<?php echo $row_Recordset1['id']?>"><?php echo $row_Recordset1['nombre']?></option>
      <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
    </select>
  <p><input type='submit' value='Agregar cliente' /><input type='hidden' value='1' name='submitted' /> 
</form> 
<?php
mysql_free_result($Recordset1);
?>
