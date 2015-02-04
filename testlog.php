<? 
include('config.php'); 
echo "<table border=1 >"; 
echo "<tr>"; 
echo "<td><b>Id</b></td>"; 
echo "<td><b>Email</b></td>"; 
echo "<td><b>Nombre</b></td>"; 
echo "<td><b>Password</b></td>"; 
echo "</tr>"; 
$result = mysql_query("SELECT * FROM `admin`") or trigger_error(mysql_error()); 
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
echo "<tr>";  
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['email']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['nombre']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['password']) . "</td>";  
echo "<td valign='top'><a href=editar_admin.php?id={$row['id']}>Edit</a></td><td><a href=borrar_admin.php?id={$row['id']}>Delete</a></td> "; 
echo "</tr>"; 
} 
echo "</table>"; 
echo "<a href=nuevo_admin.php>New Row</a>"; 
?>