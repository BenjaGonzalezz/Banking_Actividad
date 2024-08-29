window.onload=async ()=> {
    loginUsuario();
}
function loginUsuario(){
    let formElement=document.querySelector("#Login");

    formElement.onsubmit = async (e) => {
        e.preventDefault()
        let formData = new FormData(formElement);
        let url = "http://localhost/banking_actividad/backend/Controller/Controller.php?function=LoginUsuario";

        let config = {
            method:"POST",
            body:formData
        }
        let respuesta = await fetch(url,config);
        let datos = await respuesta.json();
        console.log(datos);
        formElement.reset();


        if (datos ==null){
            alert("Datos incorrectos");
        }else{
           alert("Login existoso");
           window.location.href='../page/inicio.html';
        }
    }

}