<?php
define('INCLUDE_CHECK',1);
require "conn.php";

if(!$_POST)
{
	
	if($_SERVER['HTTP_REFERER'])
	header('Location : '.$_SERVER['HTTP_REFERER']);

	exit;
	
}
?>
    <!doctype html>
<html>
<head>
<meta charset="UTF-8">
        <title>My Shopping Bag | SoftAOX</title>

    </head>
    <body>

            <div class="content">
			<table width="40%" align="center" frame="box" border="1">
			<tr>
				<td colspan="3" align="center"><h1>My Shopping Bag</h1></td>
			</tr>
			<tr>
				<td width="10%">Qty.</td>
				<td width="85%">Product</td>
			</tr>
                <?php

				$cnt = array();
				$products = array();
				$total = 0;
				
				foreach($_POST as $key=>$value)
				{
					$key=(int)str_replace('_cnt','',$key);

					$products[]=$key;
					$cnt[$key]=$value;
				}

				$result = mysql_query("SELECT * FROM asignatura WHERE id IN(".join($products,',').")");

				if(!mysql_num_rows($result))
				{
					echo '<p>There was an error processing your order.</p>';
				}
				else
				{
					
					$sno = 1;
	
					while($row=mysql_fetch_assoc($result))
					{

						echo '<tr>';
						echo '<td>'.$cnt[$row['id']].' </td><td> '.$row['name'].' </td><td> '.$row['price'].'</td>';
						echo '</tr>';

						$total+=$cnt[$row['id']]*$row['price'];
					}

				}
				?>
				<tr>
					<td colspan="3" align="right"><h4>Total: $<?php echo $total; ?></h4></td>
				</tr>
			</table>
            </div>
    </body>
</html>