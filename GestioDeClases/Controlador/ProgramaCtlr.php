<?php
require_once (__DIR__ . '/../Modelo/Programa.php');

if(!empty($_GET['action'])){
    ProgramaCtlr::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 23/07/2017
 * Time: 12:40 AM
 */
class ProgramaCtlr
{
    static function main($action)
    {
        if ($action == "crear") {
        ProgramaCtlr::crear();
        }
    }

    static public function crear()
    {
        try {
            $arrayProg = array();
            $arrayProg['Nombre'] = $_POST['Nombre'];
            $arrayProg['C_min'] =$_POST[ 'C_min'];
            $arrayProg['C_max'] = $_POST['C_max'];
            $arrayProg['idC'] = $_POST['idC'];

            $Progra = new Programa($arrayProg);
            $Progra->insertar();
            header("Location: ../Vista/verprog.php?respuesta=1");
        } catch (Exception $e) {
            header("Location: ../Vista/verprog.php?respuesta=0");

        }
    }



}