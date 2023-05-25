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
        imagen.width = 300;
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

        var elemento = document.getElementById("containerBlur");
        elemento.className += " blur";
        document.getElementById("imgCargando").removeAttribute("hidden");
        setTimeout(validaSubirHorarioAlmCRG, 3000);

        function validaSubirHorarioAlmCRG(){
            document.getElementById("containerBlur").classList.remove("blur");
            document.getElementById("imgCargando").setAttribute("hidden","true");

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
                    swal("¡ERROR!", "LA IMAGEN SUPERA LOS 400KB ACEPTADOS", "error");
                }
                if(data["bandera"]==4){
                    swal("¡ERROR!", "SELECCIONA UN ARCHIVO VALIDO", "error");
                }
            });
        }
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
        var elemento = document.getElementById("containerBlur");
        elemento.className += " blur";
        document.getElementById("imgCargando").removeAttribute("hidden");
        setTimeout(validFichaCanalizacionAlmCRG, 3000);

        function validFichaCanalizacionAlmCRG(){
            document.getElementById("containerBlur").classList.remove("blur");
            document.getElementById("imgCargando").setAttribute("hidden","true");

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
                    swal("¡ERROR!", "LA IMAGEN SUPERA LOS 400KB ACEPTADOS", "error");
                }
                if(data["bandera"]==4){
                    swal("¡ERROR!", "SELECCIONA UN ARCHIVO VALIDO", "error");
                }
            });
        }
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
    var elemento = document.getElementById("containerBlur");
    elemento.className += " blur";

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
        if(data["bandera"] == 1){
            var psicologo = data["psicologo"];
            swal("BIENVENIDO "+psicologo+"");
            document.getElementById("containerBlur").classList.remove("blur");
        }
    });
}
// agregar dia y hora a la tabla de horario
function agregarHoraPsi(){
    var diaHorario = document.getElementById("diaHorario").value;
    var horaHorario = document.getElementById("horaHorario").value;

    var elemento = document.getElementById("containerBlur");
    elemento.className += " blur";

    var tablaFormarHorarioPsi = document.getElementById("tablaFormarHorarioPsi");
    var contFormarHorarioPsi = "";

    if(diaHorario!="" && horaHorario!=""){
        var bandera=0;
        var resume_table = document.getElementById("tablaFormarHorarioPsi");

        for (var i = 0, row; (row = resume_table.rows[i]); i++) {
            var arrv = row.innerText.split("\t");
            if(arrv[0]==diaHorario && arrv[1]==horaHorario){
                swal("¡ERROR!", "YA SELECCIONASTE ESE DIA Y HORA", "error");
                document.getElementById("containerBlur").classList.remove("blur");
                bandera=1;
            }
        }
        if(bandera==0){
            contFormarHorarioPsi = tablaFormarHorarioPsi.innerHTML;
            contFormarHorarioPsi = contFormarHorarioPsi + "<tr><td>"+diaHorario+"</td><td>"+horaHorario+"</td></tr>";
            tablaFormarHorarioPsi.innerHTML = contFormarHorarioPsi;
            document.getElementById("frmAgregarHorarioPsi").reset();
            document.getElementById("containerBlur").classList.remove("blur");
        }
    }else{
        swal("SELECCIONE UN DIA Y UNA HORA PARA FORMAR SU HORARIO");
        document.getElementById("containerBlur").classList.remove("blur");
    }
}
// agregar horario a la BD
function guardarHorarioPsicologo(){
    var elemento = document.getElementById("containerBlur");
    elemento.className += " blur";
    
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
                document.getElementById("containerBlur").classList.remove("blur");
                document.getElementById("frmAgregarHorarioPsi").reset();
                var tablaFormarHorarioPsi = document.getElementById("tablaFormarHorarioPsi");
                tablaFormarHorarioPsi.innerHTML="";
            }    
            if(data["bandera"] == 2){
                swal("¡ERROR!", "NO SE ENCONTRO LA SESION, INTENTA DE NUEVO", "error");
            }     
            if(data["bandera"] == 3){
                swal("¡ERROR!", "NO HAS SELECCIONADO DÍA Y HORA PARA TU HORARIO", "error");
                document.getElementById("containerBlur").classList.remove("blur");
            }     
            if(data["bandera"] == 4){
                swal("ÉXITO!", "SE BORRÓ TU HORARIO ANTERIOR Y SE ACTUALIZÓ POR EL ACTÚAL", "success");
                document.getElementById("containerBlur").classList.remove("blur");
                document.getElementById("frmAgregarHorarioPsi").reset();
                var tablaFormarHorarioPsi = document.getElementById("tablaFormarHorarioPsi");
                tablaFormarHorarioPsi.innerHTML="";
            }  
        });
}
// ver el horario del psicologo
function VerHorarioPsicologo(){
    var elemento = document.getElementById("containerBlur");
    elemento.className += " blur";

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
                document.getElementById("containerBlur").classList.remove("blur");
            }    
            if(data["bandera"] == 2){
                swal("¡ERROR!", "NO HAS FORMADO TU HORARIO", "error");
                document.getElementById("containerBlur").classList.remove("blur");
            }     
            if(data["bandera"] == 3){
                swal("¡ERROR!", "NO SE ENCONTRO LA SESION, INTENTA DE NUEVO", "error");
            }     
        });
}
// borrar el horario de la BD
function borrarHorarioPsicologo(){
    var elemento = document.getElementById("containerBlur");
    elemento.className += " blur";
    swal({
        title: "¿ESTÁ SEGURO DE BORRAR HORARIO?",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
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
                        document.getElementById("containerBlur").classList.remove("blur");
                        swal("ÉXITO!", "SE BORRÓ EL HORARIO CORRECTAMENTE", "success");
                        document.getElementById("frmAgregarHorarioPsi").reset();
                        var tablaFormarHorarioPsi = document.getElementById("tablaFormarHorarioPsi");
                        tablaFormarHorarioPsi.innerHTML="";
                    }    
                    if(data["bandera"] == 2){
                        document.getElementById("containerBlur").classList.remove("blur");
                        swal("¡ERROR!", "NO HAY HORARIO PARA BORRAR", "error");
                    }     
                    if(data["bandera"] == 3){
                        swal("¡ERROR!", "NO SE ENCONTRO LA SESION, INTENTA DE NUEVO", "error");
                    }     
                    if(data["bandera"] == 4){
                        document.getElementById("containerBlur").classList.remove("blur");
                        swal("¡ERROR!", "NO SE PUEDE BORRAR EL HORARIO, HAY CITAS AGENDADAS EN TU HORARIO", "error");
                    }   
                });
        } else {
            document.getElementById("containerBlur").classList.remove("blur");
        }
      });
}
// escoger la cita con el psicologo
function escogerCita(a){
    var elemento = document.getElementById("containerBlur");
    elemento.className += " blur";

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
                var tablaHorarios = document.getElementById("tablaHorarioPsi");
                tablaHorarios.innerHTML = "";
            }
            if(data["bandera"] == 1){
                var dia = data["dia"];
                var hora = data["hora"];
                var psicologo = data["psicologo"];
                swal("ÉXITO!", "TU CITA QUEDÓ AGENDADA PARA EL DÍA "+dia.toUpperCase()+" EN UN HORARIO DE "+hora.toUpperCase()+", CON EL PSICOLOGO "+psicologo+
                ", NO OLVIDES ACUDIR 5 MINUTOS ANTES DE TU CITA CON TU FICHA DE CANALIZACIÓN EN FÍSICO", "success");
                var tablaHorarios = document.getElementById("tablaHorarioPsi");
                tablaHorarios.innerHTML = "";
                document.getElementById("containerBlur").classList.remove("blur");
            }    
            if(data["bandera"] == 2){
                swal("¡ERROR!", "YA TIENES CITA AGENDADA ANTERIORMENTE", "error");
                var tablaHorarios = document.getElementById("tablaHorarioPsi");
                tablaHorarios.innerHTML = "";
                document.getElementById("containerBlur").classList.remove("blur");
            }     
            if(data["bandera"] == 3){
                swal("¡ERROR!", "NO SE ENCONTRO LA SESION, INTENTA DE NUEVO", "error");
                var tablaHorarios = document.getElementById("tablaHorarioPsi");
                tablaHorarios.innerHTML = "";
            }     
        });
}
// entra para modificar el horario de psicologo
function modificarHorario(id){
    var elemento = document.getElementById("containerBlur");
    elemento.className += " blur";

    document.getElementById("divmodal").reset();
    document.getElementById("divmodal").removeAttribute("hidden");
    
    document.getElementById("frmAgregarHorarioPsi").setAttribute("hidden", "true");
    
    const options = {
        method: "GET",
        }; 
        fetch("/citasPsicologicas/php/AJAX/editarHorarioAJAX.php?idHora="+id, options)
        .then(response => response.json())
        .then(data => {
            // console.log(data)
            if(data["bandera"] == 0){
                swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO", "error");
            }
            if(data["bandera"] == 1){
                document.getElementById("containerBlur").classList.remove("blur");
                var idHorario = data["idHorario"];
                var dia = data["dia"];
                var hora = data["hora"];
                var descripcion = data["descripcion"];

                var tablaHorarios = document.getElementById("tablaHora");
                var conTablaHorarios ="";
                
                tablaHorarios.innerHTML = "";
                conTablaHorarios.innerHTML ="";

                conTablaHorarios = "<tr><input hidden id=\"idHorarioHid\" value=\""+idHorario+"\"></tr>";
                conTablaHorarios = conTablaHorarios + "<tr><th>DÍA</th><th>HORA</th><th>ESTADO</th></tr>";
                conTablaHorarios = conTablaHorarios + "<tr><td>"+dia+"</td><td>"+hora+"</td><td>"+descripcion+"</td></tr>"
                tablaHorarios.innerHTML = conTablaHorarios;
            }    
            if(data["bandera"] == 2){
                document.getElementById("containerBlur").classList.remove("blur");
                swal("¡ERROR!", "TIENES UNA CITA EN ESE HORARIO, NO SE PUEDE EDITAR", "error");
            }     
            if(data["bandera"] == 3){
                document.getElementById("containerBlur").classList.remove("blur");
                swal("¡ERROR!", "NO SE ENCONTRO HORARIO, INTENTA DE NUEVO", "error");
            }   
            if(data["bandera"] == 4){
                swal("¡ERROR!", "NO SE ENCONTRO LA SESION, INTENTA DE NUEVO", "error");
            }     
        });
}
// modifica el horario del psicologo
function actualizarHora(){
    var elemento = document.getElementById("containerBlur");
    elemento.className += " blur";

    var formulario = document.getElementById("divmodal");
    var idHora = formulario.idHorarioHid.value;
    var diaUpdate = formulario.ActualizarDiaHorario.value;
    var horaUpdate = formulario.ActualizarHoraHorario.value;

    if(idHora=="" || diaUpdate=="" || horaUpdate==""){
        swal("¡ERROR!", "LLENE LOS CAMPOS PARA ACTUALIZAR EL HORARIO ACTUAL", "error");
        document.getElementById("containerBlur").classList.remove("blur");
    }else{
        const options = {
            method: "GET",
            }; 
            fetch("/citasPsicologicas/php/AJAX/horarioActualizadoAJAX.php?idHora="+idHora+"&diaUpdate="+diaUpdate+"&horaUpdate="+horaUpdate, options)
            .then(response => response.json())
            .then(data => {
                // console.log(data)
               if(data["bandera"]==0){
                swal("¡ERROR!", "OCURRIO UN ERROR INESPERADO", "error");
               }
               if(data["bandera"]==1){
                swal("¡ÉXITO!", "HORA ACTUALIZADA", "success");
                document.getElementById("containerBlur").classList.remove("blur");

                document.getElementById("divmodal").reset();
                document.getElementById("divmodal").setAttribute("hidden","true");
                document.getElementById("frmAgregarHorarioPsi").removeAttribute("hidden");
                setTimeout(VerHorarioPsicologo, 1500);
               }
               if(data["bandera"]==2){
                swal("¡ERROR!", "YA EXISTE EL DÍA Y HORA EN TU HORARIO ACTUAL", "error");
                document.getElementById("containerBlur").classList.remove("blur");
               }
               if(data["bandera"]==3){
                swal("¡ERROR!", "EL HORARIO SELECCIONADO TIENE UNA CITA AGENDADA, NO SE PUEDE EDITAR", "error");
                document.getElementById("containerBlur").classList.remove("blur");
               }
               if(data["bandera"]==4){
                swal("¡ERROR!", "NO SE ENCONTRO LA SESION, INTENTA DE NUEVO", "error");
               }
            });
    }
}