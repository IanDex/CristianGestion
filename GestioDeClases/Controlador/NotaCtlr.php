<?php
require_once (__DIR__.'/../Modelo/Nota.php');

if(!empty($_GET['action'])){
    NotaCtlr::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 29/07/2017
 * Time: 11:14 PM
 */
class NotaCtlr
{
    static function main($action){
        if ($action == "crear"){
            NotaCtlr::crear();
        }
    }

    static public function crear (){
        try {
            $arrayno = array();
            $arrayno['N_final'] = 'none';
            $arrayno['P_50'] = $_POST['P_50'];
            $arrayno['S_50'] = $_POST['S_50'];
            $arrayno['Profesor'] = $_POST['ide'];
            $nota = new Nota($arrayno);
            $nota->insertar();
            header("Location: ../Vista/verno.php?respuesta=1");
        } catch (Exception $e) {
            header("Location: ../Vista/verno.php?respuesta=0");

        }



    }



}