<?php

$mysqli = new mysqli('localhost', 'root', '', 'bd_pro');

if (mysqli_connect_errno()) {
    echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
    exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){

   // $result = $mysqli->query("SELECT * FROM asignatura,prueba WHERE asignatura.profesores = prueba.idP");
    $result = $mysqli->query("SELECT * FROM horario,prueba WHERE horario.estudiante = prueba.idP");

    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["idH"] ?></td>
            <td><?php echo $row["Nombre"] ?></td>
            <td><?php echo $row["asignatura"] ?></td>

        </tr>
        <?php
    }

} else{


    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);

    if ($input['action'] === 'edit') {
        $mysqli->query("UPDATE horario SET estudiante='" . $input['est'] . "', asignatura='" . $input['asig'] ."' WHERE id='" . $input['id'] . "'");
    } else if ($input['action'] === 'delete') {
        $mysqli->query("DELETE FROM horario WHERE idH='" . $input['id'] . "'");

    } else if ($input['action'] === 'restore') {
        $mysqli->query("UPDATE horario SET deleted=0 WHERE id='" . $input['id'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);


}
?>