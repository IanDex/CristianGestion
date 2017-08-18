<?php
session_start();
require_once (__DIR__.'/../Modelo/horariio.php');

if(!empty($_GET['action'])){
    horarCtlr::main($_GET['action']);
}else{
    echo "No se encontro ninguna accion...";
}


class horarCtlr{

    static function main($action){
        if ($action == "crear"){
            horarCtlr::crear();
        }
    }

    public function crear (){
        try {
            $User = 12;
            $Password = 12;
            if(!empty($User) && !empty($Password)){
                $respuesta = horariio::Login($User, $Password);
                if (is_array($respuesta)) {

                    echo TRUE;
                }else if($respuesta == "Password Incorrecto"){

                }else if($respuesta == "No existe el usuario"){

                }
            }else{

            }
        } catch (Exception $e) {
            header("Location: ../login.php?respuesta=error");
        }
    }
}