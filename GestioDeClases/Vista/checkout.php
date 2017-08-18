<?php
session_start();
define('INCLUDE_CHECK',1);
require "conn.php";

?>
    <!doctype html>
<html>
<head>
<meta charset="UTF-8">
        <title>My Shopping Bag | SoftAOX</title>

    </head>
    <body>

            <div class="content">
			<table width="40%" align="center" frame="box" border="1">
			<tr>
				<td colspan="3" align="center"><h1>My Shopping Bag</h1></td>
			</tr>
			<tr>
				<td width="10%">Qty.</td>
				<td width="85%">Product</td>
			</tr>
                <?php

				$cnt = array();
				$products = array();
				$total = 0;
				
				foreach($_POST as $key=>$value)
				{
					$key=(int)str_replace('_cnt','',$key);

					$products[]=$key;
					$cnt[$key]=$value;
				}

				$result = mysql_query("SELECT * FROM asignatura WHERE idAs IN(".join($products,',').")");
				$cont=0;
                while($row=mysql_fetch_assoc($result)){
                    $cont++;
                }

                if ($cont==0){
                    header("location: horario.php?action=lol");
                }else if ($cont <=3 && $cont > 0){
                    header("location: horario.php?action=32");

                }else{

                    if (!mysql_num_rows($result)) {
                        echo '<p>There was an error processing your order.</p>';
                    } else {

                        $resul = mysql_query("SELECT * FROM asignatura WHERE idAs IN(".join($products,',').")");


                        while ($row = mysql_fetch_assoc($resul)) {
                            $id = $row['idAs'];
                            $idAs = $row['name'];
                            $profe = $row['description'];
                            $aula = $row['aula'];
                            $ciclo = $row['ciclo'];
                            $ini = $row['H_Inicio'];
                            $fin = $row['H_Final'];
                            $est = $_SESSION['idP'];
                            echo '<tr>';
                            echo '<td>' . $cnt[$row['idAs']] . ' </td><td> ' . $row['name'] . '</td>';
                            echo '</tr>';

                            $l = mysql_query("INSERT INTO horario VALUES (null,'" . $id . "','" . $est . "','" . $profe . "','" . $aula . "','" . $ciclo . "','" . $ini . "','" . $fin . "')");

                        }
                        $l = mysql_query("UPDATE prueba SET materias = '1' WHERE idP = '".$est ."'");

                    }
                }
				?>
				<tr>
					<td colspan="3" align="right"><h4>Total: $<?php echo $total; ?></h4></td>
				</tr>
			</table>
            </div>
    </body>
</html>