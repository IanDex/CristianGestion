<?php

$mysqli = new mysqli('localhost', 'root', '', 'bd_pro');

if (mysqli_connect_errno()) {
    echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
    exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){

    $result = $mysqli->query("SELECT * FROM asignatura");

    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["idA"] ?></td>
            <td><?php echo $row["Nombre"] ?></td>
            <td><?php echo $row["N_min"] ?></td>
            <td><?php echo $row["N_max"] ?></td>
            <td><?php echo $row["H_Inicio"] ?></td>
            <td><?php echo $row["H_Final"] ?></td>
        </tr>
        <?php
    }

}
?>