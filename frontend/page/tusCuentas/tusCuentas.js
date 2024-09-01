window.onload = () => {
    mostrarCorreoUsuario();
    verificarSesion();
    obtenerCuenta();
    mostrarCuenta();
}

function mostrarCorreoUsuario() {
    const email = localStorage.getItem('email');

    if (email) {
        // Mostrar el correo electrónico del usuario en el elemento correspondiente
        document.getElementById('userEmailDisplay').innerText = email;
    } else {
        // Si no hay correo en localStorage, redirigir al login
        window.location.href = '#';
    }
}

function logoutUsuario() {
    // Eliminar datos de sesión en localStorage
    localStorage.removeItem('userToken');
    localStorage.removeItem('email');
    
    alert("Has cerrado sesión exitosamente");
    window.location.href = '#';
    window.location.reload(); 
}

function verificarSesion() {
    const email = localStorage.getItem('email');

    if (email) {
        // Ocultar elementos que no deben mostrarse cuando el usuario está autenticado
        document.getElementById('desaparecer').style.display = 'none';
        document.getElementById('desaparecer1').style.display = 'none';
        document.getElementById('userEmailDisplay').style.display = 'block';
        document.getElementById('cerrarSesion').style.display = 'block';
    } else {
        // Mostrar elementos que solo deben aparecer cuando el usuario no está autenticado
        document.getElementById('userEmailDisplay').style.display = 'none';
        document.getElementById('cerrarSesion').style.display = 'none';
        document.getElementById('desaparecer2').style.display = 'none';
        document.getElementById('desaparecer3').style.display = 'none';
        document.getElementById('desaparecer4').style.display = 'none';
        document.getElementById('desaparecer5').style.display = 'none';
        document.getElementById('desaparecer6').style.display = 'none';
    }
}


async function obtenerCuenta(){
    let url ="http://localhost/banking_actividad/backend/Controller/cuentaControlador.php?function=obtener";
    let consulta = await fetch(url);
    let datos = await consulta.json();
    listadecuenta=datos;
    mostrarCuenta(datos) 
}
function mostrarCuenta(cuenta){
    let tbodyElement = document.querySelector("#cuerpotablaObtener")
    tbodyElement.innerHTML="";
    for(let i=0; i < cuenta.length;i++){
     tbodyElement.innerHTML+=`
     <tr>
        <td class="td1">${cuenta[i].id_usuario}</td>
        <td class="td2">${cuenta[i].n_cuenta}</td>
        <td class="td3">${cuenta[i].saldo}</td>
     </tr>
        `;
    }
}