<?php
require_once (__DIR__ . '/../Modelo/Estudiantes.php');

if(!empty($_GET['action'])){
    EstudiantesCtlr::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}

/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 13/07/2017
 * Time: 04:28 PM
 */
class EstudiantesCtlr
{
    static function main($action)
    {
        if ($action == "crear") {
            EstudiantesCtlr::crear();
        }else if($action == "actualizar"){
            EstudiantesCtlr::actualizar();

        }
    }

    static public function crear()
    {
        try {
            $arrayEstu = array();
            $img = $_POST['Doc'];

            $new=$_FILES['foto']['name'];
            $nomdir = "../Vista/images/";
            $nombrefoto=$nomdir.$img.$new;
            move_uploaded_file($_FILES['foto']['tmp_name'],'../Vista/images/'.$new);
            $path = 'images/'.$new;

            $arrayEstu['Nombre'] = $_POST['Nombre'];
            $arrayEstu['Apellido'] =$_POST[ 'Apellido'];
            $arrayEstu['TipoDoc'] = $_POST['TipoDoc'];
            $arrayEstu['Doc'] =$_POST[ 'Doc'];
            $arrayEstu['Tel'] = $_POST['Tel'];
            $arrayEstu['email'] =$_POST[ 'email'];
            $arrayEstu['foto'] = $path;
            $arrayEstu['Profesion'] =$_POST['idp'];
            $arrayEstu['Seguro'] = 'none';
            $arrayEstu['antig'] = 'none';
            $arrayEstu['tipo'] = 'Estudiante';
            $arrayEstu['Obser'] = $_POST['Obser'];
            $arrayEstu['user'] =$_POST[ 'Doc'];
            $arrayEstu['pass'] =$_POST[ 'Doc'];
            $arrayEstu['fecha'] =$_POST[ 'fecha'];
            $Estudiante = new Estudiantes($arrayEstu);
            $Estudiante->insertar();
            header("Location: ../Vista/Estudiantes.php?respuesta=1");
        } catch (Exception $e) {
            header("Location: ../Vista/Estudiantes.php?respuesta=0");

        }
    }
    static public function actualizar (){
        try {
            $arrayE = array();
            $arrayE['Nombre'] = $_POST['name'];
            $arrayE['Apellido'] = $_POST['app'];
            $arrayE['TipoDoc'] = $_POST['TipoDoc'];
            $arrayE['Doc'] = $_POST['Doc'];
            $arrayE['Tel'] = $_POST['Tel'];
            $arrayE['email'] = $_POST['email'];
            $arrayE['idP'] = $_SESSION['idP'];

            $E = new  Estudiantes($arrayE);
            $E->actualizar();
            header("Location: ../Vista/perfilE.php?respuesta=1");
        } catch (Exception $e) {
            header("Location: ../Vista/perfilE.php?respuesta=0");
        }
    }
}