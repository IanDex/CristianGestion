<?php
define('INCLUDE_CHECK',1);
require "conn.php";
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
		<title>SoftAOX Shopping Cart</title>
    <style>

        /* CSS Document */
        body {
            font-size: 15px;
            background-color: #FFF;
        }

        .col-100 {
            padding: 10px;
        }

        .col-70 {
            width: 69%;
            float: left;
        }

        .col-30 {
            width: 29%;
            float: left;
        }



        .item img {
            cursor: move;
        }

        .tooltip {
            position: absolute;
            margin-left: 62px;
            z-index: 3;
            display: none;
            background-color: #ffffff;
            border: 1px double #e8e8e8;
            box-shadow: 0px 0px 1px 1px #e8e8e8;
            color: #252525;
            padding: 15px;
            -moz-border-radius: 12px;
            -webkit-border-radius: 12px;
            border-radius: 12px;
        }

        .drop-box {
            width: 100%;
            height: 300px;
            padding: 15px;
            margin-top: 70px;
            border: 1px dotted #999;
        }

        #item-list table {
            border-top: 1px dotted #cecece;
            border-bottom: 1px dotted #cecece;
            padding: 5px;
        }

        #total {
            text-transform: capitalize;
            font-size: 16px;
            padding: 5px;
            font-weight: 600;
        }

        .button {
            background: #2f2f2f;
            width: 15%;
            padding: 4px;
            text-decoration: none;
            color: #FFF;
            border-radius: 3px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            text-align: center;
        }

        .remove {
            color: #FFF;
            background: #fd0c00;
            padding: 5px 10px 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }

    </style>
</head>
	<body>
		<div class="col-100">
			<div class="col-70">
				<h1>SoftAOX</h1>
				<h3>Online Apple Shopping</h3>
                <div class="item">

                <?php
				$result = mysql_query("SELECT * FROM horario");
				while($row=mysql_fetch_assoc($result))
				{?>
                <div class="item">
                    <div style="border: 1px solid; padding: 10px; margin: 10px; width: 50%" id="<?php echo $row['img']; ?>">
                    <p> <?php echo $row['name'] ?></p>
                    <p> <?php echo $row['price'] ?></p>
                    </div>
				</div>
                    <?php
                }
					?>

			</div>
			</div>
			<div class="col-30">
					<h1 class="label-txt">My Shopping Bag</h1>
				<div class="content drop-box">
					<span>Drop your Products Here</span>
					<form name="checkoutForm" method="post" action="checkout.php">
						<div id="item-list"></div>
					</form>
					<div id="total"></div>
					<a href="" onclick="document.forms.checkoutForm.submit(); return false;" class="button">Checkout</a>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
		<script type="text/javascript" src="https://cdn.css.net/files/jquery.simpletip/1.3.1/jquery.simpletip-1.3.1.pack.js"></script>
        <script>
            var nItems = 0;
            var purchased = new Array();
            var totalprice = 0;

            $(document).ready(function() {


                $(".item div").draggable({

                    containment: 'document',
                    opacity: 0.6,
                    revert: 'invalid',
                    helper: 'clone',
                    zIndex: 100

                });

                $("div.content.drop-box").droppable({

                    drop: function(e, ui) {
                        var param 	= ($(ui.draggable).attr("id"));



                        addlist(param);
                    }

                });

            });


            function addlist(param) {

                if (nItems < 5){
                    $.ajax({
                        type: "POST",
                        url: "js/cart.php",
                        data: {img: param},
                        dataType: 'json',
                        success: function(msg) {

                            if (parseInt(msg.status) != 1) {
                                return false;
                            } else {
                                var check = false;
                                var cnt = false;

                                for (var i = 0; i < purchased.length; i++) {
                                    if (purchased[i].id == msg.id) {
                                        check = true;
                                        cnt = purchased[i].cnt;

                                        break;
                                    }
                                }

                                if (!cnt)
                                    $('#item-list').append(msg.txt);

                                if (!check) {
                                    purchased.push({
                                        id: msg.id,
                                        cnt: 1,
                                        price: msg.price
                                    });

                                } else {
                                    if (cnt >= 1) {
                                        alert("Cristtian");
                                        return false;
                                    }

                                    purchased[i].cnt++;
                                    $('#' + msg.id + '_cnt').val(purchased[i].cnt);
                                }

                                totalprice += msg.price;
                                total_update();
                                nItems++;
                            }

                            $('.tooltip').hide();

                        }
                    });
                }else{
                    alert("Error Numero de Item Excedidos");
                    return false;
                }


            }

            function findpos(id) {
                for (var i = 0; i < purchased.length; i++) {
                    if (purchased[i].id == id)
                        return i;
                }

                return false;
            }

            function remove(id) {
                var i = findpos(id);

                totalprice -= purchased[i].price * purchased[i].cnt;
                purchased[i].cnt = 0;

                $('#table_' + id).remove();
                nItems--;
                total_update();
            }

            function change(id) {
                var i = findpos(id);

                totalprice += (parseInt($('#' + id + '_cnt').val()) - purchased[i].cnt) * purchased[i].price;

                purchased[i].cnt = parseInt($('#' + id + '_cnt').val());
                total_update();
            }

            function total_update() {
                if (totalprice) {
                    $('#total').html('total: $' + totalprice);
                    $('a.button').css('display', 'block');
                } else {
                    $('#total').html('');
                    $('a.button').hide();
                }
            }
        </script>

    </body>
</html>
