//Agregar Ingreso
const Plus= document.getElementById('mas');
        if (Plus) {
            Plus.addEventListener('click', (e)=>{
                e.preventDefault()
    
                datasend="valorMas="+1;
    
                //console.log(datasend);
    
                xmlhttp= new XMLHttpRequest();
                xmlhttp.onreadystatechange= function(){
                    if(this.readyState==4 && this.status==200){
                        console.log(this.responseText)
                        location.reload()
                    }
                }
                xmlhttp.open("POST","ingreso.php", true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send(datasend);
            });
        }

//Agregar egreso
const Minus= document.getElementById('menos');
        if (Minus) {
            Minus.addEventListener('click', (e)=> {
                datasend= "valorMenos="+1;
    
                xmlhttp= new XMLHttpRequest();
                xmlhttp.onreadystatechange= function(){
                    if(this.readyState==4 && this.status==200){
                        console.log(this.responseText)
                        location.reload()
                    }
                }
                xmlhttp.open("POST","egreso.php", true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send(datasend);
            });
        }

//Sacar gente de sala de espera     
const Minus_sp= document.getElementById('menos_sp');
        if (Minus_sp) {
            Minus_sp.addEventListener('click', (e)=> {
                datasend= "valorMenos="+1;
    
                xmlhttp= new XMLHttpRequest();
                xmlhttp.onreadystatechange= function(){
                    if(this.readyState==4 && this.status==200){
                        console.log(this.responseText)
                        location.reload()
                    }
                }
                xmlhttp.open("POST","salaespera.php", true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send(datasend);
            });
        }

        function cerrar() {
            var x = document.getElementById("popup");
            if (x.style.display == "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }


        setTimeout(() => {
            location.reload()
        }, 5000);