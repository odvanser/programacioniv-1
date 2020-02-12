
document.addEventListener("DOMContentLoaded", e=>{
    document.querySelector("#frmAlumnos").addEventListener("submit",event=>{
        event.preventDefault();

        let codigo = document.querySelector("#textCodigoAlumno").value,
        nombre = document.querySelector("#textNombreAlumno").value,
        direccion = document.querySelector("#textDireccionAlumnos").value,
        telefono = document.querySelector("#textTelefonoAlumno").value,
        if('localStorege' in Window){
            window.localStorage.setItem("codigo",codigo);
            window.localStorage.setItem("nombre",nombre);
            window.localStorage.setItem("direccion",direccion);
            window.localStorage.setItem("telefono",telefono);
        }else{
            alert("Por favor actualizate")
        }

    } );
    document.querySelector("#btnRecuperarAlumno").addEventListener("click", event=>{
        document.querySelector("#txtCodigoAlumno")
    })
});


/*document.addEventListener("DOMContentLoaded",function(e){
    alert("CALLBACK LISTO");
});


/*document.addEventListener("DOMContentLoaded",init);

function init(e){
    alert("Listo")
}*/