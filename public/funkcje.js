function tomek() {

$(".cos1").hide();
}

function wyloguj() {
  
 window.open("/wyloguj",'_parent');
 // alert("dobrze");
  
  
}
//alert("dobrze");
function apply(id,user,url) {
  
  //alert(url);
  window.open(url + "?id=" + id + "&user=" + user, '_parent');
  
}


//$('').hide();

function hide(i) {
  //var j = 0;
  var zmienna;
  for (j = 0;j <= i;j++) {
    zmienna = "#field"+j;
    $(zmienna).hide();
  }
}

function show_field(i) {
   var zmienna = "#field"+i;
   //alert(id);
   $(zmienna).toggle();
}

function hide_fieldy(i) {
  var zmienna;
  
  for (j=0;j<=i;j++) {
    zmienna = ".fieldy"+j;
    //alert(zmienna);
    $(zmienna).hide();
  }
}

function show_fieldy(i) {
    var zmienna = ".fieldy"+i;
   //alert(id);
   $(zmienna).toggle();
   //var tresc = $(zmienna).html();
   
   //tresc = tresc + '<br><br>';
   //alert (tresc);
    //$(zmienna).html(tresc);
}

function write(id,if_true) {
  
 alert(id); 
}