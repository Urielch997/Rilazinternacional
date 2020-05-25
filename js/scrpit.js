window.onload = setInterval(function(){
    var src=new Array("img/toshiba.jpg","img/JobPoint_.jpg");
    var as = Math.floor(Math.random() * 2) ;
    var div = document.getElementById('img');
    div.style.backgroundImage = "url('"+src[as]+"')";
},4000);
