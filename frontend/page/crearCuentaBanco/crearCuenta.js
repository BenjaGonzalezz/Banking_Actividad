window.onload = () => {
    mostrarCorreoUsuario();
    verificarSesion();
    crearCuenta();
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

function logoutUsuario(event) {
    // Prevenir la redirección automática del enlace
    if (event) {
        event.preventDefault();
    }

    // Eliminar datos de sesión en localStorage
    localStorage.removeItem('userToken');
    localStorage.removeItem('email');

    // Mostrar la alerta y redirigir después de que el usuario la cierre
    mostrarAlerta("Ha cerrado sesión correctamente", () => {
        window.location.href = '../inicio.html';
    });
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
    }
}


function crearCuenta() {
    let formElement = document.querySelector("#form-crear");

    formElement.onsubmit = async (e) => {
        e.preventDefault();
        let formData = new FormData(formElement);
        let url = "http://localhost/banking_actividad/backend/Controller/cuentaControlador.php?function=crear";

        let config = {
            method: "POST",
            body: formData
        };

        mostrarAlertaCuenta("✅ ¡Se creo con exito! ✅", () => {
            window.location.href = '../tusCuentas/tusCuentas.html';
        });

            let respuesta = await fetch(url, config);
            let datos = await respuesta.json();
            console.log(datos); // Verifica la respuesta del servidor




    };
}


//alerta personalizda
function mostrarAlertaCuenta(mensaje, callback) {
    const fondoOscuro = document.getElementById('fondoOscuro2');
    const alerta = document.getElementById('alertaPersonalizada2');
    const alertaMensaje = document.getElementById('alertaMensaje2');
    const alertaCerrar = document.getElementById('alertaCerrar2');

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
