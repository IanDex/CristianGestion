<?php
define('INCLUDE_CHECK',1);
require "../conn.php";

if(!$_POST['img']) die("There is no such product!");

$img=mysql_real_escape_string(end(explode('/',$_POST['img'])));
$row=mysql_fetch_assoc(mysql_query("SELECT * FROM asignatura WHERE img='".$img."'"));
$row2=mysql_fetch_assoc(mysql_query("SELECT * FROM prueba WHERE idP='".$row['description']."'"));

echo json_encode(array(
	'status' => 1,
	'id' => $row['id'],
	'price' => $row['description'],
	'txt' => '<table width="100%" id="table_'.$row['id'].'">

  <tr>
    <td width="55%">'.$row['name'].'</td>
    <td width="55%">'.$row['name'].'</td>
    <td width="55%">'.$row['name'].'</td>
    <td width="55%">'.$row['name'].'</td>
    <td width="15%">'.$row2['Nombre'].'</td>
   
	<td width="15%"><a href="#" onclick="window.remove('.$row['id'].');return false;" class="remove">x</a></td>
  </tr>
</table>'
));
?>
