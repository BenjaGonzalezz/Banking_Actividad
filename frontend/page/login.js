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

            alert("Login exitoso");
            window.location.href = '../page/inicio.html';
        }
    }
}
