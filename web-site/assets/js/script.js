// RESERVAR LABS Y ACTUALIZAR RESERVA
function codLab(str) {
    document.getElementById('descripcionLab').innerHTML = str;
    var e = document.getElementById("fechaReserva");
    var fecha = e.value;
    if (str == "") {
        document.getElementById("descripcionLab").style.display = "none";
        document.getElementById("infoLab").style.display = "none";
        document.getElementById("descripcionLab").innerHTML = "";
        return;
    } else {
        $.ajax({
            type: 'GET',
            url: '../backend/consultarInfoLabs.php',
            data: {
                q: str
            },
            success: function(resultado) {
                console.log("Weee: " + resultado);
                document.getElementById("descripcionLab").style.display = "block";
                document.getElementById("infoLab").style.display = "block";
                document.getElementById("descripcionLab").innerHTML = resultado;
            },
            error: function(resultado) {
                console.log("Error buscarDatos: " + resultado);
            }
        })
        if (!fecha == "") {
            $.ajax({
                type: 'GET',
                url: '../backend/consultarHoras.php',
                data: {
                    fecha: fecha,
                    lab: str
                },

                success: function(resultado) {
                    console.log("Weee: " + resultado);
                    if (resultado == "") {
                        document.getElementById("horasDisponibles").innerHTML =
                            "No hay horas disponibles";
                    } else {
                        document.getElementById("horasDisponibles").innerHTML = resultado;
                    }
                },
                error: function(resultado) {
                    console.log("Error buscarDatos: " + resultado);
                }
            })
        }
    }
}

function fecha(str) {
    var e = document.getElementById("laboratorios");
    var codLab = e.value;
    $.ajax({
        type: 'GET',
        url: '../backend/consultarHoras.php',
        data: {
            fecha: str,
            lab: codLab
        },
        success: function(resultado) {
            console.log("Weee: " + resultado + str + codLab);
            if (resultado == "") {
                document.getElementById("horasDisponibles").innerHTML = "No hay horas disponibles";
            } else {
                document.getElementById("horasDisponibles").innerHTML = resultado;
            }
        },
        error: function(resultado) {
            console.log("Error buscarDatos: " + resultado + str + codLab);
        }
    })
}

function abrirAceptarModal() {
    var fecha = document.getElementById("fechaReserva").value;
    var labs = document.getElementById("laboratorios").value;
    var hora = document.getElementById("horasDisponibles").options[document.getElementById(
        'horasDisponibles').selectedIndex].text;
    var lap = document.querySelector("input[name=radio]:checked").value;
    if (fecha == "" || labs == "") {
        document.getElementById("aceptarReserva").style.display = "none";
        document.getElementById("infoModal").innerHTML =
            "Debe seleccionar salón, fecha y hora para realizar la reserva";
    } else {
        if (lap == 05) {
            document.getElementById("aceptarReserva").style.display = "block";
            if (document.querySelector('#extrasReserva:checked')) {
                document.getElementById("infoModal").innerHTML = "¿Desea reservar el laboratorio " +
                    labs + " el día " + fecha + " en el horario " + hora +
                    " sin ninguna laptop y con los extras seleccionados?";
            } else {
                document.getElementById("infoModal").innerHTML = "¿Desea reservar el laboratorio " +
                    labs + " el día " + fecha + " en el horario " + hora + " sin ninguna laptop?";
            }
        } else {
            document.getElementById("aceptarReserva").style.display = "block";
            if (document.querySelector('#extrasReserva:checked')) {
                document.getElementById("infoModal").innerHTML = "¿Desea reservar el laboratorio " +
                    labs + " el día " + fecha + " en el horario " + hora +
                    " con laptop incluida y los extras seleccionados?";
            } else {
                document.getElementById("infoModal").innerHTML = "¿Desea reservar el laboratorio " +
                    labs + " el día " + fecha + " en el horario " + hora + " con laptop incluida?";
            }
        }
    }
}

function limpiarCamposReserva() {
    document.getElementById("descripcionLab").style.display = "none";
    document.getElementById("fechaReserva").value = "";
    document.getElementById("laboratorios").value = "";
    document.getElementById("horasDisponibles").value = "";
    document.getElementById("laptopsReserva").value = 0;
    $(':checkbox').prop('checked', false);
}
// FIN DE RESERVAR LABS Y ACTUALIZAR RESERVA

// AGREGAR Y ACTUALIZAR USUARIO
function Desplegar(MiTabla) {
    var Tabla = document.getElementById(MiTabla);
    Tabla.style.display = "block";
}

function Contraer(MiTabla) {
    var Tabla = document.getElementById(MiTabla);
    Tabla.style.display = "none";
}

function Seleccionado(that) {
    if (that.value == "FISC") {
        document.getElementById("FISC").style.display = "block";
        document.getElementById("FIC").style.display = "none";
        document.getElementById("FIE").style.display = "none";
        document.getElementById("FII").style.display = "none";
        document.getElementById("FIM").style.display = "none";
        document.getElementById("FCyT").style.display = "none";
    } else if (that.value == "FIC") {
        document.getElementById("FISC").style.display = "none";
        document.getElementById("FIC").style.display = "block";
        document.getElementById("FIE").style.display = "none";
        document.getElementById("FII").style.display = "none";
        document.getElementById("FIM").style.display = "none";
        document.getElementById("FCyT").style.display = "none";
    } else if (that.value == "FIE") {
        document.getElementById("FISC").style.display = "none";
        document.getElementById("FIC").style.display = "none";
        document.getElementById("FIE").style.display = "block";
        document.getElementById("FII").style.display = "none";
        document.getElementById("FIM").style.display = "none";
        document.getElementById("FCyT").style.display = "none";
    } else if (that.value == "FII") {
        document.getElementById("FISC").style.display = "none";
        document.getElementById("FIC").style.display = "none";
        document.getElementById("FIE").style.display = "none";
        document.getElementById("FII").style.display = "block";
        document.getElementById("FIM").style.display = "none";
        document.getElementById("FCyT").style.display = "none";
    } else if (that.value == "FIM") {
        document.getElementById("FISC").style.display = "none";
        document.getElementById("FIC").style.display = "none";
        document.getElementById("FIE").style.display = "none";
        document.getElementById("FII").style.display = "none";
        document.getElementById("FIM").style.display = "block";
        document.getElementById("FCyT").style.display = "none";
    } else if (that.value == "FCyT") {
        document.getElementById("FISC").style.display = "none";
        document.getElementById("FIC").style.display = "none";
        document.getElementById("FIE").style.display = "none";
        document.getElementById("FII").style.display = "none";
        document.getElementById("FIM").style.display = "none";
        document.getElementById("FCyT").style.display = "block";
    }
}

function actualizarUserModal(){
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    document.getElementById("infoModal").innerHTML = "¿Desea actualizar los datos de " + nombre +
        " " + apellido + "?";
}
// FIN DE AGREGAR Y ACTUALIZAR USUARIOS

// PANEL DE CONTROL
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
// FIN DE PANEL DE CONTROL

// ELIMINAR USUARIO
function eliminarUsuarioModal() {
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    document.getElementById("infoModal").innerHTML =
        "¿Está seguro de que desea eliminar del sistema al usuario " + nombre + " " + apellido +
        "?";
}
// FIN DE ELIMINAR USUARIO

// VER RESERVAS
function confirmacion(e) { //e es el evento
    if (confirm("¿Está seguro que desea eliminar la reserva seleccionada?")) {
        return true;
    } else {
        e.preventDefault(); //previene el evento de seguir a la pantalla de eliminar.php
    }
}
let linkDelete = document.querySelectorAll(".btn btn-danger btn-sm eliminar");

for(var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}
// FIN DE VER RESERVAS


// $('#displayNotif').on('click', function() {
//     var placementFrom = $('#notify_placement_from option:selected').val();
//     var placementAlign = $('#notify_placement_align option:selected').val();
//     var state = $('#notify_state option:selected').val();
//     var style = $('#notify_style option:selected').val();
//     var content = {};

//     content.message = 'Turning standard Bootstrap alerts into "notify" like notifications';
//     content.title = 'Bootstrap notify';
//     if (style == "withicon") {
//         content.icon = 'la la-bell';
//     } else {
//         content.icon = 'none';
//     }
//     content.url = 'index.html';
//     content.target = '_blank';

//     $.notify(content, {
//         type: state,
//         placement: {
//             from: placementFrom,
//             align: placementAlign
//         },
//         time: 1000,
//     });
// });
