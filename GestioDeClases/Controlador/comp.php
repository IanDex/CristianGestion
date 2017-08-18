<?php
/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 27/07/2017
 * Time: 16:05
 */
session_start();
$menu = $_SESSION['tipo'];
if($menu == "Admin") {
    header("Location: ../Vista/index.php?lol=1");

}else if($menu == "Profesor") {
    header("Location: ../Vista/card.php");


}else if($menu == "Estudiante") {
    header("Location: ../Vista/verH.php");


}