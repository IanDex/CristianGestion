<?php
require_once (__DIR__.'/../Modelo/Aulas.php');

if(!empty($_GET['action'])){
    Aul::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
/**
 * Created by PhpStorm.
 * User: juli-
 * Date: 22/07/2017
 * Time: 18:42
 */
class Aul
{
    static function main($action){
        if ($action == "crear"){
            Aul::crear();
        }
    }
    static public function crear (){
        try {
            $arrayPro = array();
            $arrayPro['Nombre'] = $_POST['Nombre'];
            $arrayPro['Numero'] = $_POST['Numero'];
            $arrayPro['Cap'] = $_POST['Cap'];
            $arrayPro['Estado'] = $_POST['Estado'];
            $Profesor = new Aulas($arrayPro);
            $Profesor->insertar();
            header("Location: ../Vista/verAula.php?respuesta=1");
        } catch (Exception $e) {
            header("Location: ../Vista/verAula.php?respuesta=0");

        }



    }

}