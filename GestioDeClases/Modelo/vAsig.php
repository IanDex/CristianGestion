<?php

$mysqli = new mysqli('localhost', 'root', '', 'bd_pro');

if (mysqli_connect_errno()) {
    echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
    exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){

    // $result = $mysqli->query("SELECT * FROM asignatura,prueba WHERE asignatura.profesores = prueba.idP");
    $result = $mysqli->query("SELECT * FROM asignatura,prueba,ciclo,aulas WHERE asignatura.description = prueba.idP AND asignatura.ciclo = ciclo.idC AND asignatura.aula = aulas.idAl");

    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row["idAs"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["price"] ?></td>
            <td><?php echo $row["H_Final"] ?></td>
            <td><?php echo $row["Nombre"];echo " " . $row["Apellido"]; ?></td>
            <td><?php echo $row["NombreC"]?></td>
            <td><?php echo $row["NombreAl"]?></td>
        </tr>
        <?php
    }

} else{


    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);

    if ($input['action'] === 'edit') {
        $mysqli->query("UPDATE asignatura SET name='" . $input['name'] . "', price='" . $input['Numin'] . "', N_max='" . $input['Numax'] . "', H_Inicio='" . $input['HI'] ."', H_Final='" . $input['HF'] ."' WHERE id='" . $input['id'] . "'");
    } else if ($input['action'] === 'delete') {
        $mysqli->query("DELETE FROM asignatura WHERE idA='" . $input['id'] . "'");

    } else if ($input['action'] === 'restore') {
        $mysqli->query("UPDATE asignatura SET deleted=0 WHERE id='" . $input['id'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);


}
?>