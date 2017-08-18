<?php

$mysqli = new mysqli('localhost', 'root', '', 'bd_pro');
$page = isset($_GET['p'])? $_GET['p'] : '' ;
$pg = isset($_POST['bcr'])? $_POST['bcr'] : '' ;
$id= $_POST['id'];
$idAs= $_POST['idAs'];
$a = $_POST['name'];
$ar = $_POST['price'];
$arr = $_POST['lol'];
$arra = $_POST['pro'];

if($page=='view'){

    $result = mysqli_query($mysqli,"SELECT * FROM ciclos");

    foreach ($result as $fi) {
        if ($fi['Nombre'] == $id) {
            if ($fi['Nivel'] != $idAs) {
                $l = $mysqli->query("INSERT INTO bd_pro.ciclos VALUES (null,'" . $id . "','" . $idAs . "','" . $arr . "')");

            }

        }


    }





}



