<?php
require_once (__DIR__.'/../Modelo/Asignatura.php');

if(!empty($_GET['action'])){
    AsigCtlr::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
/**
 * Created by PhpStorm.
 * User: juli-
 * Date: 22/07/2017
 * Time: 9:58
 */
class AsigCtlr
{
    static function main($action){
        if ($action == "crear"){
            AsigCtlr::crear();
        }
    }
    static public function crear (){
        try {
            $arrayPro = array();
            $arrayPro['name'] = $_POST['Nombre'];
            $arrayPro['price'] = $_POST['N_min'];
            $arrayPro['N_max'] = $_POST['N_max'];
            $arrayPro['H_Inicio'] = $_POST['H_Inicio'];
            $arrayPro['H_Final'] = $_POST['H_Final'];
            $arrayPro['description'] = $_POST['idp'];
            $arrayPro['ciclo'] = $_POST['idC'];
            $arrayPro['aula'] = $_POST['ida'];

            $Profesor = new Asignatura($arrayPro);
            $Profesor->insertar();
            header("Location: ../Vista/verAsig.php?respuesta=1");
        } catch (Exception $e) {
            header("Location: ../Vista/verAsig.php?respuesta=0");

        }



    }

}