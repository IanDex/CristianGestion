<?php
session_start();
$mysqli = new mysqli('localhost', 'root', '', 'bd_pro');

if (mysqli_connect_errno()) {
    echo json_encode(array('mysqli' => 'Failed to connect to MySQL: ' . mysqli_connect_error()));
    exit;
}

$page = isset($_GET['p'])? $_GET['p'] : '' ;
if($page=='view'){
$var = $_SESSION['idP'];
   // $result = $mysqli->query("SELECT * FROM notas,asignatura,prueba WHERE notas.Materia = asignatura.idA and notas.Profesor=prueba.idP and notas.Estudiante = '" . $var . "'");
    $result = $mysqli->query("SELECT * FROM notas,prueba,horario WHERE notas.Estudiante = prueba.idP AND prueba.idP = horario.Estudiante");
//SELECT * FROM prueba,horario WHERE prueba.idP = horario.Estudiante'
    while ($row = $result->fetch_assoc()) {
        $notaFinal = ($row["P_50"] + $row["S_50"]) / 2;
        ?>

        <tr>

            <td><?php echo $row["idN"] ?></td>
            <td><?php echo $notaFinal ?></td>
            <td><?php echo $row["P_50"] ?></td>
            <td><?php echo $row["S_50"] ?></td>
            <td><?php echo $row["Nombre"]. " " . $row["Apellido"] ?></td>
        </tr>
        <?php
    }

} else{


    header('Content-Type: application/json');

    $input = filter_input_array(INPUT_POST);

    if ($input['action'] === 'edit') {
        $mysqli->query("UPDATE notas SET P_50='" . $input['p'] ."', S_50='" . $input['s'] .   "' WHERE idN='" . $input['id'] . "'");
    } else if ($input['action'] === 'delete') {
        $mysqli->query("DELETE FROM notas WHERE idN='" . $input['id'] . "'");

    } else if ($input['action'] === 'restore') {
        $mysqli->query("UPDATE notas SET deleted=0 WHERE idN='" . $input['id'] . "'");
    }

    mysqli_close($mysqli);

    echo json_encode($input);


}
?>