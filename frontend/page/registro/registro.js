window.onload=()=>{
    
    let formElement = document.querySelector("#register")

    formElement.onsubmit = async (e) =>{
        e.preventDefault()
        let formData = new FormData(formElement);
        let url = "http://localhost/banking_actividad/backend/Controller/Controller.php?function=RegisterUsuario"

        let config = {
                method: 'POST',
                body: formData
        }

        let respuesta = await fetch(url, config);
        let datos = await respuesta.json();
        console.log(datos);
    
        if (datos ==null){
            alert("Datos Incorrectos");
        }else{
            mostrarAlerta("Tu cuenta se a creado con exito", () => {
            window.location.href = '../login.html';
        });

        }
    }
}


// EN EL REGISTRO PARA QUE EL INPUT SE PONGA VERDE CUANDO LA CONTRASEÑA ES VALIDA


document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('contraseña');

    passwordInput.addEventListener('input', function() {
        const pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

        if (pattern.test(passwordInput.value)) {
            passwordInput.classList.add('valid');
            passwordInput.classList.remove('invalid');
        } else {
            passwordInput.classList.add('invalid');
            passwordInput.classList.remove('valid');
        }
    });
    // Funcionalidad para mostrar/ocultar contraseña
    const toggleIcon = document.getElementById('togglePassword');
    toggleIcon.addEventListener('click', function () {
        const passwordInput = document.getElementById('contraseña');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.src = '../../assets/esconder.png'; // Cambia la imagen a "ocultar"
        } else {
            passwordInput.type = 'password';
            toggleIcon.src = '../../assets/ver.png'; // Cambia la imagen a "mostrar"
        }
    });
});


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
