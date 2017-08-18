<?php

require_once (__DIR__.'/../Modelo/Ciclo.php');

if(!empty($_GET['action'])){
    CicloCtlr::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 30/06/2017
 * Time: 19:00
 */
class CicloCtlr
{

    static function main($action){
        if ($action == "crear"){
            CicloCtlr::crear();
        }elseif ($action == "tabla"){
            CicloCtlr::tabla();
        }
    }

    static public function tabla ()
    {
        try {
            $page = isset($_GET['p'])? $_GET['p'] : '' ;
            if($page=='view'){
            $Ciclo = new Ciclo();
            $Ciclo->tab();
            header("Location: ../Vista/verciclos.php?respuesta=1");
        }}
     catch (Exception $e) {
                header("Location: ../Vista/index.php?respuesta=0");

}

    }

        static public function crear (){
        try {
            if (!empty($_POST['nom'])){
            $arrayPro = array();
            $arrayPro['Nombre'] = $_POST['nom'];
            $arrayPro['Nivel'] = $_POST['nivel'];
            $Ciclo = new Ciclo($arrayPro);
            $Ciclo->insertar();
            header("Location: ../Vista/verciclos.php?respuesta=1");}
            else{
                header("Location: ../Vista/verciclos.php?respuesta=error");

        }
        } catch (Exception $e) {
            header("Location: ../Vista/index.php?respuesta=0");

        }



    }








}