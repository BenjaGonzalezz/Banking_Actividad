window.onload = async () => {
    // Si hay un usuario logueado, redirige a la página de inicio
    if (localStorage.getItem('email')) {
        window.location.href = '#';
    }
    loginUsuario();
}

function loginUsuario() {
    let formElement = document.querySelector("#Login");

    formElement.onsubmit = async (e) => {
        e.preventDefault();
        let formData = new FormData(formElement);
        let url = "http://localhost/banking_actividad/backend/Controller/Controller.php?function=LoginUsuario";

        let config = {
            method: "POST",
            body: formData
        };

        let respuesta = await fetch(url, config);
        let datos = await respuesta.json();
        console.log(datos); // Verifica la respuesta del servidor

        if (datos == null || datos.error) {
            alert("Datos incorrectos");
        } else {
            // Almacenar información de sesión en localStorage
            localStorage.setItem('userToken', datos.token); // Suponiendo que la respuesta contiene un token
            localStorage.setItem('email', datos.email); // Almacenar el correo electrónico del usuario

            mostrarAlerta("Login exitoso", () => {
                window.location.href = '../page/inicio.html';
            });
        }
    }
}

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