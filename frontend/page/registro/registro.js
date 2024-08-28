

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
});