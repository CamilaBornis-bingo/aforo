function volver(){
    location.href = "index.html"
}

function ingreso(){
    location.href = "ingreso.html"
}

function egreso(){
    location.href = "egreso.html"
}

function monitor(){
    location.href = "monitor.html"
}

function countdown(){
    let end = new Date('12/17/2100 9:30 AM');

    let _second = 1000;
    let _minute = _second * 60;
    let _hour = _minute * 60;
    let _day = _hour * 24;
    let timer;

    function showRemaining() {
        let now = new Date();
        let distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'EXPIRED!';

            return;
        }
        let days = Math.floor(distance / _day);
        let hours = Math.floor((distance % _day) / _hour);
        let minutes = Math.floor((distance % _hour) / _minute);
        let seconds = Math.floor((distance % _minute) / _second);

        document.getElementById('countdown').innerHTML = days + ' dias, ';
        document.getElementById('countdown').innerHTML += hours + ' horas, ';
        document.getElementById('countdown').innerHTML += minutes + ' minutos y ';
        document.getElementById('countdown').innerHTML += seconds + ' segundos';
    }

    timer = setInterval(showRemaining, 1000);
}

window.onload = function () {
    var contador = 0;
    document.getElementById("menos").onclick = function () {
        contador--;
        if (contador<0) {
            contador = 0; 
        }
        let cont = localStorage.getItem('contador');
        document.getElementById("monitor").innerHTML = contador;
        document.getElementById("mostrar").innerHTML = contador;
    }
    document.getElementById("mas").onclick = function () {
        contador++;
        if (contador>500) {
            contador = 500; 
        }
        document.getElementById("mostrar").innerHTML = contador;
    }

}


