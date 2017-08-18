<?php

$mysqli = new mysqli('localhost', 'root', '', 'bd_pro');

if (mysqli_connect_errno()) {
    echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
    exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
    $tip = "Profesor";
    $result = $mysqli->query("SELECT * FROM prueba,horario WHERE prueba.idP = horario.Profesor");


    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["idP"] ?></td>
            <td><?php echo $row["Nombre"] ?></td>
            <td><?php echo $row["Apellido"] ?></td>
            <td><?php echo $row["Doc"] ?></td>
            <td><?php echo $row["Tel"] ?></td>
            <td><?php echo $row["email"] ?></td>
        </tr>
        <?php
    }

}else if($page=='viewl'){
    $tip = "Estudiante";
    $result = $mysqli->query("SELECT * FROM prueba WHERE tipo = 'Estudiante'");


    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["idP"] ?></td>
            <td><?php echo $row["Nombre"] ?></td>
            <td><?php echo $row["Apellido"] ?></td>
            <td><?php echo $row["Doc"] ?></td>
            <td><?php echo $row["Tel"] ?></td>
            <td><?php echo $row["email"] ?></td>
        </tr>
        <?php
    }

}


else{


    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);

    if ($input['action'] === 'edit') {
        $mysqli->query("UPDATE prueba SET Nombre='" . $input['name'] . "', Apellido='" . $input['gender'] ."', Doc='" . $input['doc'] ."', Tel='" . $input['tel'] ."', email='" . $input['email'] . "' WHERE idP='" . $input['id'] . "'");
    } else if ($input['action'] === 'delete') {
        $mysqli->query("DELETE FROM prueba WHERE idP='" . $input['id'] . "'");

    } else if ($input['action'] === 'restore') {
        $mysqli->query("UPDATE prueba SET deleted=0 WHERE id='" . $input['id'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);


}
?>