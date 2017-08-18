<?php
define('INCLUDE_CHECK',1);
require "../conn.php";
session_start();

if(!$_POST['idAs']) die("There is no such product!");

$img=mysql_real_escape_string(end(explode('/',$_POST['idAs'])));
$des=mysql_real_escape_string(end(explode('/',$_POST['description'])));
$cic=mysql_real_escape_string(end(explode('/',$_POST['ciclo'])));
$aul=mysql_real_escape_string(end(explode('/',$_POST['aulas'])));


$row=mysql_fetch_assoc(mysql_query("SELECT * FROM asignatura,prueba,ciclo,aulas WHERE asignatura.idAs='".$img."' AND prueba.idP = '". $des."' AND ciclo.idC = '". $cic."' AND aulas.idAl = '". $aul."'"));
$cont = 1;
echo json_encode(array(
    'status' => 1,
    'idAs' => $row['idAs'],
    'name' => $row['name'],
    'txt' => '<table class="table table-bordered" width="100%" id="table_'.$row['idAs'].'">

  <tr>
  <th scope="row">-</th>
    <td style="text-align: center" width="15%">'.$row['name'].'</td>
    <td style="text-align: center" width="10%">'.$row['H_Inicio'].'</td>
    <td style="text-align: center" width="10%">'.$row['H_Final'].'</td>
    <td hidden>'.$row['description'].'</td>
    <td style="text-align: center" width="25%">'.$row['Nombre']." ". $row['Apellido'].'</td>
    <td style="text-align: center" width="15%">'.$row['NombreC'].'</td>
    <td style="text-align: center" width="15%">'.$row['NombreAl'].'</td>
    
	<td style="text-align: center" width="15%"><a href="#" onclick="window.remove('.$row['idAs'].');return false;" class="remove">x</a></td>
	<td hidden width="15%">
	<select hidden name="'.$row['idAs'].'_cnt" id="'.$row['idAs'].'_cnt" onchange="change('.$row['idAs'].');">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option>
	<option value="7">7</option>
	<option value="8">8</option>
	<option value="9">9</option>
	<option value="10">10</option>
	</select>
	</td>
  </tr>
</table>'
));
?>

