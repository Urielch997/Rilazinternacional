var actual=new Date();
function mostrarCalendario(year,month)
{
	var now=new Date(year,month-1,1);
	var last=new Date(year,month,0);
	var primerDiaSemana=(now.getDay()==0)?7:now.getDay();
	var ultimoDiaMes=last.getDate();
	var dia=0;
	var resultado="<tr class='tr'>";
	var diaActual=0;
	
	var dias=Array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado","Domingo");
	var last_cell=primerDiaSemana+ultimoDiaMes;
 
	// hacemos un bucle hasta 42, que es el máximo de valores que puede
	// haber... 6 columnas de 7 dias
	for(var i=1;i<=42;i++)
	{
		if(i==primerDiaSemana)
		{
			// determinamos en que dia empieza
			dia=1;
		}
		if(i<primerDiaSemana || i>=last_cell)
		{
			// celda vacia
			resultado+="<td>&nbsp;</td>";
		}else{
			// mostramos el dia
			if(dia==actual.getDate() && month==actual.getMonth()+1 && year==actual.getFullYear())
				resultado+="<td class='hoy'>"+dia+"</td>";
			else
				resultado+="<td>"+dia+"</td>";
			dia++;
		}
		if(i%7==0)
		{
			if(dia>ultimoDiaMes)
				break;
			resultado+="</tr><tr class='tr'>\n";
		}
	}
	resultado+="</tr>";
 
	var meses=Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
 
	// Calculamos el siguiente mes y año
	nextMonth=month+1;
	nextYear=year;
	if(month+1>12)
	{
		nextMonth=1;
		nextYear=year+1;
	}
 
	// Calculamos el anterior mes y año
	prevMonth=month-1;
	prevYear=year;
	if(month-1<1)
	{
		prevMonth=12;
		prevYear=year-1;
	}
	
	console.log(now.getDay());
	document.getElementById("calendar").getElementsByTagName("caption")[0].innerHTML="<div class='tabla red'><label class='y'>"+year+"</label>"+dias[now.getDay()]+", "+actual.getDate()+" de "+meses[month-1]+"</div><div class='tabla pas'><a onclick='mostrarCalendario("+prevYear+","+prevMonth+")'>&lt;</a> <a onclick='mostrarCalendario("+nextYear+","+nextMonth+")'>&gt;</a></div>";
	document.getElementById("calendar").getElementsByTagName("tbody")[0].innerHTML=resultado;
	
}
 
mostrarCalendario(actual.getFullYear(),actual.getMonth()+1);