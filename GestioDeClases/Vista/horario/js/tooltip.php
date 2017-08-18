<?php
define('INCLUDE_CHECK',1);

require "../conn.php";

if(!$_POST['img']) die("There is no such product!");

$img=mysql_real_escape_string(end(explode('/',$_POST['img'])));

$row=mysql_fetch_assoc(mysql_query("SELECT * FROM asignatura WHERE img='".$img."'"));

if(!$row) die("There is no such product!");

echo '<strong>'.$row['name'].'</strong>

<p>'.$row['description'].'</p>

<strong>price: $'.$row['price'].'</strong>
<small>Drag it to your shopping cart to purchase it</small>';
?>
