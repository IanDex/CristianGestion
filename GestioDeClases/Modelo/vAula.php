<?php

$mysqli = new mysqli('localhost', 'root', '', 'bd_pro');

if (mysqli_connect_errno()) {
    echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
    exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){

    $result = $mysqli->query("SELECT * FROM aulas");

    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["idAl"] ?></td>
            <td><?php echo $row["NombreAl"] ?></td>
            <td><?php echo $row["Numero"] ?></td>
            <td><?php echo $row["Cap"] ?></td>
            <td><?php echo $row["Estado"] ?></td>
        </tr>
        <?php
    }

} else{


    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);

    if ($input['action'] === 'edit') {
        $mysqli->query("UPDATE aulas SET NombreAl='" . $input['name'] . "', Numero='" . $input['Numer'] . "', Cap='" . $input['Cap'] . "', Estado='" . $input['Esta'] . "' WHERE idAl='" . $input['id'] . "'");
    } else if ($input['action'] === 'delete') {
        $mysqli->query("DELETE FROM aulas WHERE idAl='" . $input['id'] . "'");

    } else if ($input['action'] === 'restore') {
        $mysqli->query("UPDATE aulas SET deleted=0 WHERE id='" . $input['id'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);


}
?>