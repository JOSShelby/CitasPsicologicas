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
        if(numControlLogin.toUpperCase()=='IS18110312' && contraseñaLogin=='123456'){
            location.href ="/citasPsicologicas/php/pantallaPrincipalAlumno.php";
        }else{
            swal("¡ERROR!", "EL NÚMERO DE CONTROL O CONTRASEÑA SON INCORRECTOS", "error");
        }
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
    var correoInstLogin = formulario.correoInstLogin.value.trim();
    var contraseñaLogin = formulario.contraseñaLogin.value.trim();

    if(correoInstLogin.toUpperCase()=="" || contraseñaLogin==""){
        swal("¡ERROR!", "LLENE LOS DATOS MÍNIMOS PARA INICIAR SESIÓN", "error");
    }else{
        if(correoInstLogin.toUpperCase()=='jo0zue99@hotmail.com' && contraseñaLogin=='123456'){

            swal("ÉXITO!", "LLENASTE LOS DATOS CORRECTAMENTE", "success");
        }else{
            swal("¡ERROR!", "EL NÚMERO DE CONTROL O CONTRASEÑA SON INCORRECTOS", "error");
        }
    }
}
// valida el registro del psicologo
function validaRegistroPsicologo(){
    var formulario = document.getElementById("frmRegistroAlm");
    var nombre = formulario.nombreRegistroPsi.value.trim();
    var edad = formulario.edadRegistroPsi.value.trim();
    var escuela = formulario.escuelaRegistroPsi.value.trim();
    var correoPersonal = formulario.correoPersRegistroPsi.value.trim();
    var contraseña = formulario.contraseñaRegistroPsi.value.trim();
    var numeroCel = formulario.numeroRegistroPsi.value.trim();

    if(nombre.toUpperCase()==""||edad==""||escuela==""||correoPersonal==""||contraseña==""||numeroCel==""){
        swal("¡ERROR!", "LLENE LOS DATOS MÍNIMOS PARA INICIAR SESIÓN", "error");
    }else{
        swal("ÉXITO!", "SE REGISTRARON LOS DATOS CORRECTAMENTE", "success");
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
        swal("ÉXITO!", "SE GUARDO TU HORARIO CORRECTAMENTE", "success");
    }
}
// regresa a la pagina principal
function volverInicio(){
    location.href="/citasPsicologicas/php/pantallaPrincipalAlumno.php";
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
        swal("ÉXITO!", "SE GUARDO TU FICHA DE CANALIZACIÓN CORRECTAMENTE, SELECCIONA HORA PARA LA CITA", "success");
        document.getElementById("contenido1").setAttribute("hidden","true");
        document.getElementById("contenido2").removeAttribute("hidden");
    }
}