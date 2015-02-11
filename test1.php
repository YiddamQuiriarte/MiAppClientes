<?php require_once('Connections/MiAppClientes.php'); ?>
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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_NombreDelRecSet = 5;
$pageNum_NombreDelRecSet = 0;
if (isset($_GET['pageNum_NombreDelRecSet'])) {
  $pageNum_NombreDelRecSet = $_GET['pageNum_NombreDelRecSet'];
}
$startRow_NombreDelRecSet = $pageNum_NombreDelRecSet * $maxRows_NombreDelRecSet;

mysql_select_db($database_MiAppClientes, $MiAppClientes);
$query_NombreDelRecSet = "SELECT * FROM clientes";
$query_limit_NombreDelRecSet = sprintf("%s LIMIT %d, %d", $query_NombreDelRecSet, $startRow_NombreDelRecSet, $maxRows_NombreDelRecSet);
$NombreDelRecSet = mysql_query($query_limit_NombreDelRecSet, $MiAppClientes) or die(mysql_error());
$row_NombreDelRecSet = mysql_fetch_assoc($NombreDelRecSet);

if (isset($_GET['totalRows_NombreDelRecSet'])) {
  $totalRows_NombreDelRecSet = $_GET['totalRows_NombreDelRecSet'];
} else {
  $all_NombreDelRecSet = mysql_query($query_NombreDelRecSet);
  $totalRows_NombreDelRecSet = mysql_num_rows($all_NombreDelRecSet);
}
$totalPages_NombreDelRecSet = ceil($totalRows_NombreDelRecSet/$maxRows_NombreDelRecSet)-1;

$queryString_NombreDelRecSet = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_NombreDelRecSet") == false && 
        stristr($param, "totalRows_NombreDelRecSet") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_NombreDelRecSet = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_NombreDelRecSet = sprintf("&totalRows_NombreDelRecSet=%d%s", $totalRows_NombreDelRecSet, $queryString_NombreDelRecSet);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>
<table border="1" align="center">
  <tr>
    <td>id</td>
    <td>estado_id</td>
    <td>nombre</td>
    <td>apellidos</td>
    <td>telefono</td>
    <td>email</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><a href="DetailPage.php?recordID=<?php echo $row_NombreDelRecSet['id']; ?>"> <?php echo $row_NombreDelRecSet['id']; ?>&nbsp; </a></td>
      <td><?php echo $row_NombreDelRecSet['estado_id']; ?>&nbsp; </td>
      <td><?php echo $row_NombreDelRecSet['nombre']; ?>&nbsp; </td>
      <td><?php echo $row_NombreDelRecSet['apellidos']; ?>&nbsp; </td>
      <td><?php echo $row_NombreDelRecSet['telefono']; ?>&nbsp; </td>
      <td><?php echo $row_NombreDelRecSet['email']; ?>&nbsp; </td>
    </tr>
    <?php } while ($row_NombreDelRecSet = mysql_fetch_assoc($NombreDelRecSet)); ?>
</table>
<br />
<table border="0">
  <tr>
    <td><?php if ($pageNum_NombreDelRecSet > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_NombreDelRecSet=%d%s", $currentPage, 0, $queryString_NombreDelRecSet); ?>">First</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_NombreDelRecSet > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_NombreDelRecSet=%d%s", $currentPage, max(0, $pageNum_NombreDelRecSet - 1), $queryString_NombreDelRecSet); ?>">Previous</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_NombreDelRecSet < $totalPages_NombreDelRecSet) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_NombreDelRecSet=%d%s", $currentPage, min($totalPages_NombreDelRecSet, $pageNum_NombreDelRecSet + 1), $queryString_NombreDelRecSet); ?>">Next</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_NombreDelRecSet < $totalPages_NombreDelRecSet) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_NombreDelRecSet=%d%s", $currentPage, $totalPages_NombreDelRecSet, $queryString_NombreDelRecSet); ?>">Last</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
Records <?php echo ($startRow_NombreDelRecSet + 1) ?> to <?php echo min($startRow_NombreDelRecSet + $maxRows_NombreDelRecSet, $totalRows_NombreDelRecSet) ?> of <?php echo $totalRows_NombreDelRecSet ?>
</body>
</html>
<?php
mysql_free_result($NombreDelRecSet);
?>
