window.onload = () => {
    mostrarCorreoUsuario();
    verificarSesion();
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
    
    mostrarAlerta("Ha cerrado sesión correctamente", () => {
        window.location.href = '../page/inicio.html';
    });
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

//alerta personalizda
function mostrarAlerta(mensaje, callback) {
    const fondoOscuro = document.getElementById('fondoOscuro');
    const alerta = document.getElementById('alertaPersonalizada');
    const alertaMensaje = document.getElementById('alertaMensaje');
    const alertaCerrar = document.getElementById('alertaCerrar');

    alertaMensaje.textContent = mensaje;
    fondoOscuro.style.display = 'block'; // Mostrar el fondo oscuro
    alerta.style.display = 'block'; // Mostrar la alerta

    alertaCerrar.onclick = function() {
        fondoOscuro.style.display = 'none'; // Ocultar el fondo oscuro
        alerta.style.display = 'none'; // Ocultar la alerta
        if (callback) {
            callback(); // Ejecutar la función de callback si se proporciona
        }
    }
}