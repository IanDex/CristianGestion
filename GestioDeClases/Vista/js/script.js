var purchased = new Array();
var totalprice = 0;

$(document).ready(function() {

 $('.item').simpletip({

  offset: [40, 0],
  onShow: function() {

   var param = this.getParent().find('img').attr('src');

   if ($.browser.msie && $.browser.version == '6.0') {
    param = this.getParent().find('img').attr('style').match(/src=\"([^\"]+)\"/);
    param = param[1];
   }

   this.load('js/tooltip.php', {
    img: param
   });
  }

 });

 $(".item img").draggable({

  containment: 'document',
  opacity: 0.6,
  revert: 'invalid',
  helper: 'clone',
  zIndex: 100

 });

 $("div.content.drop-box").droppable({

  drop: function(e, ui) {
   var param = $(ui.draggable).attr('src');

   if ($.browser.msie && $.browser.version == '6.0') {
    param = $(ui.draggable).attr('style').match(/src=\"([^\"]+)\"/);
    param = param[1];
   }

   addlist(param);
  }

 });

});


function addlist(param) {
 $.ajax({
  type: "POST",
  url: "js/cart.php",
  data: 'img=' + encodeURIComponent(param),
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
     if (cnt >= 1) alert("ya esta"); return false;

     purchased[i].cnt++;
     $('#' + msg.id + '_cnt').val(purchased[i].cnt);
    }

    totalprice += msg.price;
    total_update();

   }

   $('.tooltip').hide();

  }
 });
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