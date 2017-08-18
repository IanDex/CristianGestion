<?php

$mysqli = new mysqli('localhost', 'root', '', 'bd_pro');

if (mysqli_connect_errno()) {
    echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
    exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){

    $result = $mysqli->query("SELECT * FROM programa,ciclo WHERE programa.ciclo = ciclo.idC");

    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["idP"] ?></td>
            <td><?php echo $row["Nombrepro"] ?></td>
            <td><?php echo $row["C_min"] ?></td>
            <td><?php echo $row["C_max"] ?></td>
            <td><?php echo $row["NombreC"] ?></td>
        </tr>
        <?php
    }

} else{


    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);

    if ($input['action'] === 'edit') {
        $mysqli->query("UPDATE programa SET Nombrepro='" . $input['nom'] . "', C_min='" . $input['min'] ."', C_max='" . $input['max'] .  "' WHERE idP='" . $input['id'] . "'");
    } else if ($input['action'] === 'delete') {
        $mysqli->query("DELETE FROM programa WHERE idP='" . $input['id'] . "'");

    } else if ($input['action'] === 'restore') {
        $mysqli->query("UPDATE programa SET deleted=0 WHERE idP='" . $input['id'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);


}
?>