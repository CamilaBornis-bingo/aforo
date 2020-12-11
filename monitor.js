var t;
function interval(){
    t=1;
    setInterval(function(){
        document.getElementById("testdiv").innerHTML=t++;
    },1000,"JavaScript");
}

function volver(){
    location.href = "index.html"
}