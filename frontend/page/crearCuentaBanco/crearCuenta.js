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

function logoutUsuario() {
    // Eliminar datos de sesión en localStorage
    localStorage.removeItem('userToken');
    localStorage.removeItem('email');
    
    alert("Has cerrado sesión exitosamente");
    window.location.href = '../inicio.html';
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

        alert("Se creó una nueva cuenta para este Email");
        
            let respuesta = await fetch(url, config);
            let datos = await respuesta.json();
            console.log(datos); // Verifica la respuesta del servidor




    };
}
