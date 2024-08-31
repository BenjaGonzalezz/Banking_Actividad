document.addEventListener('DOMContentLoaded', function () {
    const toggleIcon = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('contraseña');

    toggleIcon.addEventListener('click', function () {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.src = '../../assets/esconder.png'; // Cambia la imagen a "ocultar"
        } else {
            passwordInput.type = 'password';
            toggleIcon.src = '../../assets/ver.png'; // Cambia la imagen a "mostrar"
        }
    });
});