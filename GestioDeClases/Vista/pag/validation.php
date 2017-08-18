<?php
require 'config.php';

if(isset($_POST['login'])) {
    $errMsg = '';

    // Get data from FORM
    $username = $_POST['user'];
    $password = $_POST['pass'];

    if($username == '')
        $errMsg = 'Enter username';
    if($password == '')
        $errMsg = 'Enter password';

    if($errMsg == '') {
        try {
            $stmt = $connect->prepare('SELECT idP, Nombre, Apellido, TipoDoc, Doc, Tel, email, tipo, user, pass FROM prueba WHERE user = :username');

            $stmt->execute(array(
                ':username' => $username
            ));
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
          $sql = "SELECT count(*) FROM 'prueba'";
          $res = $connect->prepare($sql);
          $num = $res->fetchColumn();

            if($data == false){
                $errMsg = "User $username not found.";
            }
            else {
                if($password == $data['pass']) {
                    $_SESSION['idP'] = $data['idP'];
                    $_SESSION['name'] = $data['Nombre'];
                    $_SESSION['app'] = $data['Apellido'];
                    $_SESSION['TipoDoc'] = $data['TipoDoc'];
                    $_SESSION['Doc'] =  $data['Doc'];
                    $_SESSION['Tel'] =  $data['Tel'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['tipo'] = $data['tipo'];
                    $_SESSION['user'] = $data['user'];
                    $_SESSION['pass'] = $data['pass'];
                    $admi = $_SESSION['tipo'];


                        if ($admi == 'Admin') {

                            header('Location: ../index.php');
                            exit;
                        } elseif ($admi == 'Profesor') {
                            header('Location: ../indexpro.php');
                            exit;
                        } elseif ($admi == 'Estudiante') {
                            header('Location: ../indexeds.php');
                            exit;
                        }


                     else {
                        header('Location: login.php');
                    }
                }


                else
                    $errMsg = 'Password not match.';
            }
        }
        catch(PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
}
?>