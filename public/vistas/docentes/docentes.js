export function modulo() {
    var $ = el => document.querySelector(el),
        frmDocentes = $("#frm-docentes");
    frmDocentes.addEventListener("submit", e => {
        e.preventDefault();
        e.stopPropagation();

        let docentes = {
            accion: frmDocentes.dataset.accion,
            idDocente: frmDocentes.dataset.iddocente,
            codigo: $("#txtCodigo").value,
            nombre: $("#txtNombre").value,
            direccion: $("#txtDireccion").value,
            telefono: $("#txtTelefono").value
        };
        fetch(`private/modulos/docentes/procesos.php?proceso=recibirDatos&docentes=
        ${JSON.stringify(docentes)}`).
        then(resp => resp.json()).then(resp=>{ //error aca sale
            $("#respuesta").innerHTML = `
                <div class="alert alert-success" role="alert">
                    ${resp.msg}
                </div>
            `;
        });
    });
    frmDocentes.addEventListener("reset", e => {
        $("#frm-docentes").dataset.accion = 'nuevo';
        $("#frm-docentes").dataset.iddocente = '';
    });
}