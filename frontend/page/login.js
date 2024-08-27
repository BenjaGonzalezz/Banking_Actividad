window.onload=()=>{
    
    let formElement = document.querySelector("#Login")

    formElement.onsubmit = async (e) =>{
        e.preventDefault()
        let formData = new FormData(formElement);
        let url = "http://localhost/banking_actividad/backend/Controller/Controller.php?function=Guardar"

        let config = {
                method: 'POST',
                body: formData
        }

        let respuesta = await fetch(url, config);
        let datos = await respuesta.json();
        console.log(datos);
    
        if (datos ==null){
            alert("Datos incorrectos");
        }else{
           alert("Bienvenido al sistema");
           window.location.href='../IngresarImagen/IngresarImagen.html'
        }
    }
}