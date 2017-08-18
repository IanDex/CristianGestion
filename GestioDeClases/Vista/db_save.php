<?php
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("bd_pro", $conexion);
session_start();
// accept input parameter as Array
// query string is send in form as: p[]=i00 & p[]=i01 & p[]=i05 ... (of course, without spaces)
$param = $_POST['p'];

// demo: print AJAX string
print 'AJAX saved: ';

// demo: loop to display all p[] values
foreach ($param as $key => $val) {
	if ($key > 0) {
		print ', ';
	}
	print "Caabron ".$val;

    $query_offer = 'INSERT INTO bd_pro.ciclos VALUES (null, "'.$val.' ", "' . $_SESSION['idP'].'" )';
    $offers = mysql_query($query_offer, $conexion);
}

// save to database
// ..
// ..

// return string 'OK' if everything was OK ('OK' string can be tested in AJAX callback function)
//print 'OK';
?>