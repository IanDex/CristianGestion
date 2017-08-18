<?php

require_once (__DIR__.'/../Modelo/Admin.php');

if(!empty($_GET['action'])){
    AdminCtlr::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
/**
 * Created by PhpStorm.
 *  User: juli-
 * Date: 30/06/2017
 * Time: 19:00
 */
class AdminCtlr
{

    static function main($action){
        if ($action == "crear"){
            AdminCtlr::crear();
        }elseif ($action = "editar"){
            AdminCtlr::editar();
        }
    }

    static public function crear (){
        try {
            $arrayPro = array();
            $img = $_POST['Doc'];

            $new=$_FILES['archivos']['name'];
            $nomdir = "../Vista/images/";
            $nombrefoto=$nomdir.$img.$new;
            move_uploaded_file($_FILES['foto']['tmp_name'],'../Vista/images/'.$img.$new);
            $path = 'images/'.$img.$new;
            $arrayPro['Nombre'] = $_POST['Nombre'];
            $arrayPro['Apellido'] = $_POST['Apellido'];
            $arrayPro['TipoDoc'] = $_POST['TipoDoc'];
            $arrayPro['Doc'] = $_POST['Doc'];
            $arrayPro['Tel'] = $_POST['Tel'];
            $arrayPro['email'] = $_POST['email'];
            $arrayPro['foto'] = $path;
            $arrayPro['Profesion'] = 'none';
            $arrayPro['Seguro'] = 'none';
            $arrayPro['antig'] = 'none';
            $arrayPro['tipo'] = 'Admin';
            $arrayPro['Obser'] = $_POST['Obser'];
            $arrayPro['user'] = $_POST['Doc'];
            $arrayPro['pass'] = $_POST['Doc'];
            $arrayPro['fecha'] = '132143';
            $Profesor = new Admin($arrayPro);
            $Profesor->insertar();
            header("Location: ../Vista/Admin.php?respuesta=1");
        } catch (Exception $e) {
            header("Location: ../Vista/Admin.php?respuesta=0");

        }



    }
    static public function editar (){
        try {
            $arrayA = array();
            $arrayA['Nombre'] = $_POST['Nombre'];
            $arrayA['Apellido'] = $_POST['Apellido'];
            $arrayA['TipoDoc'] = $_POST['TipoDoc'];
            $arrayA['Doc'] = $_POST['Doc'];
            $arrayA['Tel'] = $_POST['Tel'];
            $arrayA['email'] = $_POST['email'];

            $A = new  Admin($arrayA);
            $A->editar();
            header("Location: ../Vista/EditAdmin.php?respuesta=1");
        } catch (Exception $e) {
            header("Location: ../Vista/EditAdmin.php?respuesta=0");
        }
    }







}