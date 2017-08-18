<?php
session_start();
require_once (__DIR__.'/../Modelo/Profesores.php');

if(!empty($_GET['action'])){
    ProfesoresCtlr::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}
/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 30/06/2017
 * Time: 19:00
 */
class ProfesoresCtlr
{

    static function main($action){
        if ($action == "crear"){
            ProfesoresCtlr::crear();
        }else if ($action == "editar"){
            ProfesoresCtlr::editar();
        }else if ($action == "buscarID"){
            ProfesoresCtlr::buscarID(1);
        }else if($action == "Login"){
            ProfesoresCtlr::Login();
        }else if($action == "CerrarSession"){
            ProfesoresCtlr::CerrarSession();
        }else if($action == "horario"){
            ProfesoresCtlr::horario();
        }else if($action == "looo"){
            ProfesoresCtlr::looo();
        }
    }

    public function horario()
    {
        try {
            $arrayPro = array();

            $arrayPro['name'] = $_POST['name'];
            $arrayPro['price'] = $_POST['price'];
            $arrayPro['lol'] = $_POST['lol'];
            $arrayPro['pro'] = $_POST['pro'];
            $Profesor = new Profesores($arrayPro);
            $Profesor->horario();
            header("Location: ../Vista/Profe.php?respuesta=oiougf");

        }catch (Exception $e) {
            header("Location: ../Vista/Profe.php?respuesta=0");

        }
    }


    static public function crear (){
        try {
            $path = 'no hay dato';
            $arrayPro = array();
            $img = $_POST['Doc'];

                $new=$_FILES['foto']['name'];
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
            $arrayPro['Profesion'] = $_POST['Profesion'];
            $arrayPro['Seguro'] = $_POST['Seguro'];
            $arrayPro['antig'] = $_POST['antig'];
            $arrayPro['tipo'] = 'Profesor';
            $arrayPro['Obser'] = $_POST['Obser'];
            $arrayPro['user'] = $_POST['Doc'];
            $arrayPro['pass'] = $_POST['Doc'];
            $arrayPro['fecha'] = $_POST['fecha'];
            $Profesor = new Profesores($arrayPro);
            $Profesor->insertar();
           header("Location: ../Vista/Profe.php?respuesta=1");
        } catch (Exception $e) {
            header("Location: ../Vista/Profe.php?respuesta=0");

        }



    }

    public function ciclos(){

            $res = Profesores::cic();
            if (is_array($res)) {
                $_SESSION['idC'] = $res['idC'];
                $_SESSION['name'] = $res['Nombre'];
                $_SESSION['level'] = $res['Level'];
                echo TRUE;
            }
    }

    public function looo(){
        $page = isset($_GET['p'])? $_GET['p'] : '' ;
        $pg = isset($_POST['bcr'])? $_POST['bcr'] : '' ;
        $id= $_POST['id'];
        $idAs= $_POST['idAs'];
        $a = $_POST['name'];
        $ar = $_POST['price'];
        $arr = $_POST['lol'];
        $arra = $_POST['pro'];
        $respuesta = Profesores::h($id,$idAs);






    }

    public function Login (){
        try {
            $User = $_POST['User'];
            $Password = $_POST['Password'];
            if(!empty($User) && !empty($Password)){
                $respuesta = Profesores::Login($User, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['idP'] = $respuesta['idP'];
                        $_SESSION['name'] = $respuesta['Nombre'];
                    $_SESSION['app'] = $respuesta['Apellido'];
                    $_SESSION['email'] = $respuesta['email'];
                    $_SESSION['TipoDoc'] = $respuesta['TipoDoc'];
                    $_SESSION['foto'] = $respuesta['foto'];
                    $_SESSION['Tel'] = $respuesta['Tel'];
                    $_SESSION['Doc'] = $respuesta['Doc'];

                    $_SESSION['fecha'] = $respuesta['fecha'];
                    $_SESSION['materias'] = $respuesta['materias'];
                    $_SESSION['tipo'] = $respuesta['tipo'];
                    $_SESSION['user'] = $respuesta['user'];
                    $_SESSION['pass'] = $respuesta['pass'];
                    echo TRUE;
                }else if($respuesta == "Password Incorrecto"){
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> La Contraseña No Coincide Con El Usuario</p>";
                    echo "</div>";
                }else if($respuesta == "No existe el usuario"){
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> No Existe Un Usuario Con Estos Datos</p>";
                    echo "</div>";
                }
            }else{
                echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                echo "<strong>Error!</strong> Datos Vacios</p>";
                echo "</div>";
            }
        } catch (Exception $e) {
            header("Location: ../login.php?respuesta=error");
        }
    }

    public function CerrarSession (){
        session_destroy();
        header("Location: ../Vista/login.php");
    }





}