//Arrays de datos:
meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
lasemana = ["Domingo", "Lunes", "Martes", "Mi&eacute;rcoles", "Jueves", "Viernes", "S&aacute;bado"]
diassemana = ["lun", "mar", "mi&eacute;", "jue", "vie", "s&aacute;b", "dom"];
//Tras cargarse la p&aacute;gina ...
window.onload = function() {
    //fecha actual
    hoy = new Date(); //objeto fecha actual
    diasemhoy = hoy.getDay(); //dia semana actual
    diahoy = hoy.getDate(); //dia mes actual
    meshoy = hoy.getMonth(); //mes actual
    annohoy = hoy.getFullYear(); //a&ntilde;o actual

    // Elementos del DOM: en cabecera de calendario 
    tit = document.getElementById("titulos"); //cabecera del calendario
    ant = document.getElementById("anterior");
    pos = document.getElementById("posterior");
    // Elementos del DOM en primera fila
    f0 = document.getElementById("fila0");

    // Definir elementos iniciales:
    mescal = meshoy; //mes principal
    annocal = annohoy //a&ntilde;o principal




    //primera l&iacute;nea de tabla: d&iacute;as de la semana.
    function primeralinea() {
        for (i = 0; i < 7; i++) {
            celda0 = f0.getElementsByTagName("th")[i];
            celda0.innerHTML = diassemana[i]
        }
    }
    //iniciar calendario:
    cabecera()
    primeralinea()
    escribirdias()

    //Pie de calendario
    pie = document.getElementById("fechaactual");
    pie.innerHTML += lasemana[diasemhoy] + ", " + diahoy + " de " + meses[meshoy] + " de " + annohoy;
    //formulario: datos iniciales:
    document.buscar.buscaanno.value = annohoy;



}


//FUNCIONES de creaci&oacute;n del calendario:
//cabecera del calendario
function cabecera() {
    tit.innerHTML = meses[mescal] + " " + annocal;
    mesant = mescal - 1; //mes anterior
    mespos = mescal + 1; //mes posterior
    if (mesant < 0) { mesant = 11; }
    if (mespos > 11) { mespos = 0; }
    ant.innerHTML = meses[mesant]
    pos.innerHTML = meses[mespos]
}
//rellenar celdas con los d&iacute;as
function escribirdias() {
    //Buscar dia de la semana del dia 1 del mes:
    primeromes = new Date(annocal, mescal, "1") //buscar primer d&iacute;a del mes
    prsem = primeromes.getDay() //buscar d&iacute;a de la semana del d&iacute;a 1
    prsem--; //adaptar al calendario espa&ntilde;ol (empezar por lunes)
    if (prsem == -1) { prsem = 6; }
    //buscar fecha para primera celda:
    diaprmes = primeromes.getDate()
    prcelda = diaprmes - prsem; //restar d&iacute;as que sobran de la semana
    empezar = primeromes.setDate(prcelda) //empezar= nº del tiempo UNIX, 1ª celda
    diames = new Date() //convertir en fecha
    diames.setTime(empezar); //diames=fecha primera celda.
    //escribir las fechas:
    for (i = 1; i < 7; i++) { //localizar fila
        fila = document.getElementById("fila" + i);
        for (j = 0; j < 7; j++) {
            midia = diames.getDate()
            mimes = diames.getMonth()
            mianno = diames.getFullYear()
            celda = fila.getElementsByTagName("td")[j];
            celda.innerHTML = midia;
            celda.style.backgroundColor = "white";
            celda.style.color = "black";
            //domingos en rojo
            if (j == 6) {
                celda.style.color = "#f11445";
            }
            //dias restantes del mes en gris	
            if (mimes != mescal) {
                celda.style.color = "#a0babc";
            }
            //destacar la fecha actual
            if (mimes == meshoy && midia == diahoy && mianno == annohoy) {
                celda.style.backgroundColor = "lightgrey";
                celda.innerHTML = "<cite title='Fecha Actual'>" + midia + "</cite>";
            }
            //pasar al siguiente d&iacute;a
            midia = midia + 1;
            diames.setDate(midia);


        }
    }
}

function mesantes() {
    nuevomes = new Date()
    primeromes--;
    nuevomes.setTime(primeromes)
    mescal = nuevomes.getMonth()
    annocal = nuevomes.getFullYear()
    cabecera()
    escribirdias()
}

function mesdespues() {
    nuevomes = new Date()
    tiempounix = primeromes.getTime()
    tiempounix = tiempounix + (45 * 24 * 60 * 60 * 1000)
    nuevomes.setTime(tiempounix)
    mescal = nuevomes.getMonth()
    annocal = nuevomes.getFullYear()
    cabecera()
    escribirdias()
}

function actualizar() {
    mescal = hoy.getMonth();
    annocal = hoy.getFullYear();
    cabecera()
    escribirdias()
}

function mifecha() {
    mianno = document.buscar.buscaanno.value;
    listameses = document.buscar.buscames;
    opciones = listameses.options;
    num = listameses.selectedIndex
    mimes = opciones[num].value;
    if (isNaN(mianno) || mianno < 1) {
        alert("El a&ntilde;o no es v&aacute;lido:\n debe ser un n&uacute;mero no negativo")
    } else {
        mife = new Date();
        mife.setMonth(mimes);
        mife.setFullYear(mianno);
        mescal = mife.getMonth();
        annocal = mife.getFullYear();
        cabecera()
        escribirdias()
    }
}