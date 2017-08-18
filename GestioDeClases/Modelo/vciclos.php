<?php

$mysqli = new mysqli('localhost', 'root', '', 'bd_pro');
$page = isset($_GET['p'])? $_GET['p'] : '' ;
$pg = isset($_POST['bcr'])? $_POST['bcr'] : '' ;

        if($page=='view'){

            $result = $mysqli->query("SELECT * FROM ciclo WHERE NombreC LIKE '%". $pg ."%' OR Nivel LIKE '%". $pg ."%'");

            while ($row = $result->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $row["idC"] ?></td>
                    <td><?php echo $row["NombreC"] ?></td>
                    <td><?php echo $row["Nivel"] ?></td>

                </tr>
                <?php
            }

        }
        /*else
        {


            header('Content-Type: application/json');

            $input = filter_input_array(INPUT_POST);

            if ($input['action'] === 'edit') {
                $mysqli->query("UPDATE ciclo SET Nombre='" . $input['name'] . "', Nivel='" . $input['gender'] . "' WHERE idC='" . $input['id'] . "'");
            } else if ($input['action'] === 'delete') {
                $mysqli->query("DELETE FROM ciclo WHERE idC='" . $input['id'] . "'");

            } else if ($input['action'] === 'restore') {
                $mysqli->query("UPDATE prueba SET deleted=0 WHERE id='" . $input['id'] . "'");
            }

            mysqli_close($mysqli);

            echo json_encode($input);




    }*/


