<?php
session_start();
require_once '../Modelo/Profesores.php';
$customers = new Profesores();
$data = $customers->ciclo();
?>
<!DOCTYPE html>
<html>
<body>
<?php echo $_SESSION['idC']?>
</body>
</html>