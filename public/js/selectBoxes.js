var year=document.getElementById('y'),
	month=document.getElementById('m'),
	day=document.getElementById('d'),
	i;

for(i=1920;i<=2018;i++)
{
   var opt = document.createElement("option");
   opt.value= i;
   opt.innerHTML = i.toString(); // whatever property it has

   // then append it to the select element
   year.appendChild(opt);
}
for(i=1;i<=12;i++)
{
   var opt = document.createElement("option");
   opt.value= i;
   opt.innerHTML = i.toString(); // whatever property it has

   // then append it to the select element
   month.appendChild(opt);
}
for(i=1;i<=30;i++)
{
   var opt = document.createElement("option");
   opt.value= i;
   opt.innerHTML = i.toString(); // whatever property it has

   // then append it to the select element
   day.appendChild(opt);
}



