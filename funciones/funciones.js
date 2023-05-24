// valida que no se ingresen caracteres especiales en inputs 
function soloLetrasyNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) {
        return true;
    }
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function soloLetras(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) {
        return true;
    }
    patron = /[A-Z a-z]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function soloNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) {
        return true;
    }
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
// valida el iniciar sesion del alumno
function validaLoginAlumno(){
    var formulario = document.getElementById("frmLogin");
    var numControlLogin = formulario.numControlLogin.value.trim();
    var contraseñaLogin = formulario.contraseñaLogin.value.trim();

    if(numControlLogin.toUpperCase()=="" || contraseñaLogin==""){
        swal("¡ERROR!", "LLENE LOS DATOS MÍNIMOS PARA INICIAR SESIÓN", "error");
    }else{
        const options = {
            method: "GET",
        }; 
        fetch("/citasPsicologicas/php/AJAX/loginAlumnoAJAX.php?numeroControl="+numControlLogin.toUpperCase()+"&contraseña="+contraseñaLogin, options)
            .then(response => response.json())
            .then(data => {
                // console.log(data)
                if(data["bandera"] == 0){
                    swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO, INTENTALO MÁS TARDE", "error");
                }
                if(data["bandera"] == 1){
                    // swal("ÉXITO!", "REGISTRO EXITOSO", "success");
                    location.href="/citasPsicologicas/php/pantallaPrincipalAlumno.php";
                }
                if(data["bandera"] == 2){
                    swal("¡ERROR!", "NÚMERO DE CONTROL O CONTRASEÑA INCORRECTA", "error");
                }
            });
    }
}
// valida el registro del alumno
function validaRegistroAlumno(){
    var formulario = document.getElementById("frmRegistroAlm");
    var nombre = formulario.nombreRegistroAlm.value.trim();
    var edad = formulario.edadRegistroAlm.value.trim();
    var carrera = formulario.carreraRegistroAlm.value.trim();
    var numeroControl = formulario.numControlRegistroAlm.value.trim();
    var correoPersonal = formulario.correoPersRegistroAlm.value.trim();
    var correoInst = formulario.correoInstRegistroAlm.value.trim();
    var contraseña = formulario.contraseñaRegistroAlm.value.trim();
    var numeroCel = formulario.numeroRegistroAlm.value.trim();

    if(nombre.toUpperCase()==""||edad==""||carrera==""||numeroControl.toUpperCase()==""||correoPersonal==""||correoInst.toUpperCase()==""||contraseña==""||numeroCel==""){
        swal("¡ERROR!", "LLENE LOS DATOS MÍNIMOS PARA INICIAR SESIÓN", "error");
    }else{
        const options = {
            method: "GET",
        }; 
        fetch("/citasPsicologicas/php/AJAX/registroAlumnoAJAX.php?nombre="+nombre.toUpperCase()+"&edad="+edad+"&carrera="+carrera+"&numeroControl="+numeroControl.toUpperCase()+"&correoPersonal="+correoPersonal+"&correoInst="+correoInst.toUpperCase()+"&contraseña="+contraseña+"&numeroCel="+numeroCel, options)
            .then(response => response.json())
            .then(data => {
                // console.log(data)
                if(data["bandera"] == 0){
                    swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO, INTENTALO MÁS TARDE", "error");
                }
                if(data["bandera"] == 1){
                    swal("ÉXITO!", "REGISTRO EXITOSO", "success");
                    document.getElementById("frmRegistroAlm").reset();
                }
                if(data["bandera"] == 2){
                    swal("¡ERROR!", "YA EXISTE EL REGISTRO", "error");
                }
            });
    }
}
// valida login de psicologo
function validaLoginPsicologo(){
    var formulario = document.getElementById("frmLoginPsi");
    var correoPersonalLogin = formulario.correoPersonalLogin.value.trim();
    var contraseñaLogin = formulario.contraseñaLogin.value.trim();

    if(correoPersonalLogin=="" || contraseñaLogin==""){
        swal("¡ERROR!", "LLENE LOS DATOS MÍNIMOS PARA INICIAR SESIÓN", "error");
    }else{
        const options = {
            method: "GET",
        }; 
        fetch("/citasPsicologicas/php/AJAX/loginPsicologoAJAX.php?correoPersonal="+correoPersonalLogin+"&contraseña="+contraseñaLogin, options)
            .then(response => response.json())
            .then(data => {
                // console.log(data)
                if(data["bandera"] == 0){
                    swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO, INTENTALO MÁS TARDE", "error");
                }
                if(data["bandera"] == 1){
                    location.href="/citasPsicologicas/php/pantallaPrincipalPsicologo.php";
                }
                if(data["bandera"] == 2){
                    swal("¡ERROR!", "CORREO O CONTRASEÑA INCORRECTA", "error");
                }
            });
    }
}
// valida el registro del psicologo
function validaRegistroPsicologo(){
    var formulario = document.getElementById("frmRegistroPsi");
    var nombre = formulario.nombreRegistroPsi.value.trim();
    var edad = formulario.edadRegistroPsi.value.trim();
    var escuela = formulario.escuelaRegistroPsi.value.trim();
    var correoPersonal = formulario.correoPersRegistroPsi.value.trim();
    var contraseña = formulario.contraseñaRegistroPsi.value.trim();
    var numeroCel = formulario.numeroRegistroPsi.value.trim();

    if(nombre.toUpperCase()==""||edad==""||escuela.toUpperCase()==""||correoPersonal==""||contraseña==""||numeroCel==""){
        swal("¡ERROR!", "LLENE LOS DATOS MÍNIMOS PARA INICIAR SESIÓN", "error");
    }else{
        const options = {
            method: "GET",
        }; 
        fetch("/citasPsicologicas/php/AJAX/registroPsicologoAJAX.php?nombre="+nombre.toUpperCase()+"&edad="+edad+"&escuela="+escuela.toUpperCase()+"&correoPersonal="+correoPersonal+"&contraseña="+contraseña+"&numeroCel="+numeroCel, options)
            .then(response => response.json())
            .then(data => {
                // console.log(data)
                if(data["bandera"] == 0){
                    swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO, INTENTALO MÁS TARDE", "error");
                }
                if(data["bandera"] == 1){
                    swal("ÉXITO!", "REGISTRO EXITOSO", "success");
                    document.getElementById("frmRegistroPsi").reset();
                }
                if(data["bandera"] == 2){
                    swal("¡ERROR!", "YA EXISTE EL REGISTRO", "error");
                }
            });
    }
}
// muestra la imagen seleccionada en el input tipo file
function verImagen() {
    var imagen=document.getElementById("mostrarImagen");
    imagen.innerHTML = "";
    document.getElementById("file").onchange = function () {
    const ul = document.getElementById("mostrarImagen");
    const imagen = document.createElement("img");
    const read = new FileReader();
    const file = this.files;

    read.onload = function () {
        const result = this.result;
        const url = result;
        imagen.width = 150;
        imagen.src = url;
        ul.appendChild(imagen);
    };
    read.readAsDataURL(file[0]);
    };
}
// valida cuando se sube el horario
function validaSubirHorarioAlm(){
    var formulario = document.getElementById("frmSubirHorarioAlm");
    var horario = formulario.file.value;

    if(horario==""){
        swal("¡ERROR!", "NO HAS SELECCIONADO TU HORARIO", "error");
    }else{
        const data = new FormData(document.getElementById('frmSubirHorarioAlm'));
        const options = {
            method: "POST",
            body: data
        }; 
        fetch("/citasPsicologicas/php/AJAX/subirHorarioAJAX.php?horario="+horario, options)
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            if(data["bandera"]==0){
                swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO", "error");
            }
            if(data["bandera"]==1){
                swal("ÉXITO!", "SE GUARDÓ TU HORARIO CORRECTAMENTE", "success");
                document.getElementById("frmSubirHorarioAlm").reset();
                var imagen=document.getElementById("mostrarImagen");
                imagen.innerHTML = "";
            }
            if(data["bandera"]==2){
                swal("ÉXITO!", "SE ACTUALIZÓ TU HORARIO CORRECTAMENTE", "success");
                document.getElementById("frmSubirHorarioAlm").reset();
                var imagen=document.getElementById("mostrarImagen");
                imagen.innerHTML = "";
            }
            if(data["bandera"]==3){
                swal("¡ERROR!", "LA IMAGEN SUPERA LOS 200KB ACEPTADOS", "error");
            }
            if(data["bandera"]==4){
                swal("¡ERROR!", "SELECCIONA UN ARCHIVO VALIDO", "error");
            }
        });
    }
}
// regresa a la pagina principal
function volverInicio(){
    location.href="/citasPsicologicas/php/pantallaPrincipalAlumno.php";
}
function volverInicioPsi(){
    location.href="/citasPsicologicas/php/pantallaPrincipalPsicologo.php";
}
// instrucciones
function instrucciones(){
    swal("INSTRUCCIONES","1. Sube tu ficha de canalización. 2. Selecciona la fecha y hora para agendar la cita.");
}
// valida cuando selecciona ficha de canalizacion
function validFichaCanalizacionAlm(){
    var formulario = document.getElementById("frmAgendarCitaAlm");
    var fichaCanalizacion = formulario.file.value;

    if(fichaCanalizacion==""){
        swal("¡ERROR!", "NO HAS SELECCIONADO TU FICHA DE CANALIZACIÓN", "error");
    }else{
        const data = new FormData(document.getElementById('frmAgendarCitaAlm'));
        const options = {
            method: "POST",
            body: data
        }; 
        fetch("/citasPsicologicas/php/AJAX/subirFichaCanalizacionAJAX.php?fichaCanalizacion="+fichaCanalizacion, options)
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            if(data["bandera"]==0){
                swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO", "error");
            }
            if(data["bandera"]==1){
                swal("ÉXITO!", "SE GUARDÓ TU FICHA DE CANALIZACIÓN CORRECTAMENTE", "success");
                document.getElementById("frmAgendarCitaAlm").reset();
                var imagen=document.getElementById("mostrarImagen");
                imagen.innerHTML = "";
                document.getElementById("contenido1").setAttribute("hidden", "true");
                document.getElementById("contenido2").removeAttribute("hidden");
            }
            if(data["bandera"]==2){
                swal("ÉXITO!", "SE ACTUALIZÓ TU FICHA DE CANALIZACIÓN CORRECTAMENTE", "success");
                document.getElementById("frmAgendarCitaAlm").reset();
                var imagen=document.getElementById("mostrarImagen");
                imagen.innerHTML = "";
                document.getElementById("contenido1").setAttribute("hidden", "true");
                document.getElementById("contenido2").removeAttribute("hidden");
            }
            if(data["bandera"]==3){
                swal("¡ERROR!", "LA IMAGEN SUPERA LOS 200KB ACEPTADOS", "error");
            }
            if(data["bandera"]==4){
                swal("¡ERROR!", "SELECCIONA UN ARCHIVO VALIDO", "error");
            }
        });
    }
}
// cerra sesiones en el sistema
function cerrarSesion(){
    swal({
        title: "¿ESTÁ SEGURO DE CERRAR SESIÓN?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            location.href="/citasPsicologicas/php/cerrarSesion.php";
        } else {
            
        }
      });
}
// mensaje de bienvenida alumno
function mensajeBienvenida(){
    var numCtrlHid = document.getElementById("numControlHid").value;

    const options = {
    method: "GET",
    }; 
    fetch("/citasPsicologicas/php/mensajeBienvenida.php?numCtrlHid="+numCtrlHid, options)
    .then(response => response.json())
    .then(data => {
        // console.log(data)
        if(data["bandera"] == 0){
            swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO", "error");
        }
        var alumno = data["alumno"];
        if(data["bandera"] == 1){
            swal("BIENVENIDO "+alumno+"");
        }
    });
}
// mensaje de bienvenida psicologo
function mensajeBienvenidaPs(){
    var correoPersonalHid = document.getElementById("correoPersonalHid").value;

    const options = {
    method: "GET",
    }; 
    fetch("/citasPsicologicas/php/mensajeBienvenidaPs.php?correoPersonalHid="+correoPersonalHid, options)
    .then(response => response.json())
    .then(data => {
        // console.log(data)
        if(data["bandera"] == 0){
            swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO", "error");
        }
        var psicologo = data["psicologo"];
        if(data["bandera"] == 1){
            swal("BIENVENIDO "+psicologo+"");
        }
    });
}
// agregar dia y hora a la tabla de horario
function agregarHoraPsi(){
    var diaHorario = document.getElementById("diaHorario").value;
    var horaHorario = document.getElementById("horaHorario").value;

    var tablaFormarHorarioPsi = document.getElementById("tablaFormarHorarioPsi");
    var contFormarHorarioPsi = "";

    if(diaHorario!="" && horaHorario!=""){
        var bandera=0;
        var resume_table = document.getElementById("tablaFormarHorarioPsi");

        for (var i = 0, row; (row = resume_table.rows[i]); i++) {
            var arrv = row.innerText.split("\t");
            if(arrv[0]==diaHorario && arrv[1]==horaHorario){
                swal("¡ERROR!", "YA SELECCIONASTE ESE DIA Y HORA", "error");
                bandera=1;
            }
        }
        if(bandera==0){
            contFormarHorarioPsi = tablaFormarHorarioPsi.innerHTML;
            contFormarHorarioPsi = contFormarHorarioPsi + "<tr><td>"+diaHorario+"</td><td>"+horaHorario+"</td></tr>";
            tablaFormarHorarioPsi.innerHTML = contFormarHorarioPsi;
            document.getElementById("frmAgregarHorarioPsi").reset();
        }
    }else{
        swal("SELECCIONE UN DIA Y UNA HORA PARA FORMAR SU HORARIO");
    }
}
// agregar horario a la BD
function guardarHorarioPsicologo(){
    var arrHorario = new Array;
    var resume_table = document.getElementById("tablaFormarHorarioPsi");
    for (var i = 0, row; (row = resume_table.rows[i]); i++) {
        var arrv = row.innerText.split("\t");
        arrHorario[i] = ["-"+arrv];
    }
    const options = {
        method: "GET",
        }; 
        fetch("/citasPsicologicas/php/AJAX/subirHorarioPsicologoAJAX.php?arrHorario="+arrHorario, options)
        .then(response => response.json())
        .then(data => {
            // console.log(data)
            if(data["bandera"] == 0){
                swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO", "error");
            }
            if(data["bandera"] == 1){
                swal("ÉXITO!", "SE GUARDÓ TU HORARIO CORRECTAMENTE", "success");
                document.getElementById("frmAgregarHorarioPsi").reset();
                var tablaFormarHorarioPsi = document.getElementById("tablaFormarHorarioPsi");
                tablaFormarHorarioPsi.innerHTML="";
            }    
            if(data["bandera"] == 2){
                swal("¡ERROR!", "NO SE ENCONTRO LA SESION, INTENTA DE NUEVO", "error");
            }     
            if(data["bandera"] == 3){
                swal("¡ERROR!", "SELECCIONA UN DÍA Y HORA, DESPUÉS PRESIONA EL BOTÓN DE AGREGAR Y POR ÚLTIMO GUARDAR", "error");
            }     
            if(data["bandera"] == 4){
                swal("ÉXITO!", "SE BORRÓ TU HORARIO ANTERIOR Y SE ACTUALIZÓ POR EL ACTÚAL", "success");
                document.getElementById("frmAgregarHorarioPsi").reset();
                var tablaFormarHorarioPsi = document.getElementById("tablaFormarHorarioPsi");
                tablaFormarHorarioPsi.innerHTML="";
            }  
        });
}
// ver el horario del psicologo
function VerHorarioPsicologo(){
    const options = {
        method: "GET",
        }; 
        fetch("/citasPsicologicas/php/AJAX/verHorarioPsiAJAX.php", options)
        .then(response => response.json())
        .then(data => {
            // console.log(data)
            if(data["bandera"] == 0){
                swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO", "error");
            }
            if(data["bandera"] == 1){
                var horarios = data["arrHorarios"];
                // console.log(horarios);
                location.href="/citasPsicologicas/php/verHorarioPsi.php?arrHorarios="+horarios;
            }    
            if(data["bandera"] == 2){
                swal("¡ERROR!", "NO HAS FORMADO TU HORARIO", "error");
            }     
            if(data["bandera"] == 3){
                swal("¡ERROR!", "NO SE ENCONTRO LA SESION, INTENTA DE NUEVO", "error");
            }     
        });
}
// borrar el horario de la BD
function borrarHorarioPsicologo(){
    const options = {
        method: "GET",
        }; 
        fetch("/citasPsicologicas/php/AJAX/borrarHorarioPsiAJAX.php", options)
        .then(response => response.json())
        .then(data => {
            // console.log(data)
            if(data["bandera"] == 0){
                swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO", "error");
            }
            if(data["bandera"] == 1){
                swal("ÉXITO!", "SE BORRÓ EL HORARIO CORRECTAMENTE", "success");
                document.getElementById("frmAgregarHorarioPsi").reset();
                var tablaFormarHorarioPsi = document.getElementById("tablaFormarHorarioPsi");
                tablaFormarHorarioPsi.innerHTML="";
            }    
            if(data["bandera"] == 2){
                swal("¡ERROR!", "NO HAS FORMADO TU HORARIO", "error");
            }     
            if(data["bandera"] == 3){
                swal("¡ERROR!", "NO SE ENCONTRO LA SESION, INTENTA DE NUEVO", "error");
            }     
        });
}
function escogerCita(a){
    var idHorario = a.id;
    const options = {
        method: "GET",
        }; 
        fetch("/citasPsicologicas/php/AJAX/seleccionarHorarioAJAX.php?idHorario="+idHorario, options)
        .then(response => response.json())
        .then(data => {
            // console.log(data)
            if(data["bandera"] == 0){
                swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO", "error");
            }
            if(data["bandera"] == 1){
                swal("ÉXITO!", "SE BORRÓ EL HORARIO CORRECTAMENTE", "success");
            }    
            if(data["bandera"] == 2){
                swal("¡ERROR!", "NO HAS FORMADO TU HORARIO", "error");
            }     
            if(data["bandera"] == 3){
                swal("¡ERROR!", "NO SE ENCONTRO LA SESION, INTENTA DE NUEVO", "error");
            }     
        });
}