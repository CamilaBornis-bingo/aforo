function mke_Pagin(){
	var jx_npag= event.target.value;

	var data= "npag="+jx_npag;

	var xmlhttp= new XMLHttpRequest();
	xmlhttp.onreadystatechange= function(){
		if(this.readyState==4 && this.status==200){
			document.getElementById("content-arti").innerHTML= this.responseText;
			alert(data);
		}
	}
	xmlhttp.open("POST", "reporte.php", true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(data);
}