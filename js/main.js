function validar() {
    var error = false;
    var mensajesError = "";
    var snackbar = document.getElementById("snackbar");

    if (document.getElementById("email").value == '') {
        error = true;
        mensajesError += "<p>*El Campo email no puede estar vacio</p>";
    }

    if (document.getElementById("password").value == '') {
        error = true;
        mensajesError += "<p>*El Campo password no puede estar vacio</p>";
    }

    if (document.getElementById("nombre").value == '') {
        error = true;
        mensajesError += "<p>*El Campo nombre no puede estar vacio</p>";
    }

    if (document.getElementById("apellido").value == '') {
        error = true;
        mensajesError += "<p>*El Campo apellido no puede estar vacio</p>";
    }

    if (document.getElementById("usuario").value == '') {
        error = true;
        mensajesError += "<p>*El Campo usuario no puede estar vacio</p>";
    }

    var regexEmail = /^[0-9a-zA-Z._.-]+\@[0-9a-zA-Z._.-]+\.[0-9a-zA-Z]+$/
    if (!regexEmail.test(document.getElementById("email").value)) {
        error = true;
        mensajesError += "<p>*Tiene que ingresar un mail valido</p>";
    }

   /*  var regexPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/
    if (!regexPassword.test(document.getElementById("password").value)) {
        error = true;
        mensajesError += "<p>*Tiene que ingresar un contrasena valido</p>";
    } */
    if (error) {
        snackbar.className = "show";
        snackbar.innerHTML = mensajesError;
        setTimeout(function () { snackbar.className = snackbar.className.replace("show", ""); }, 4000);
        return false;
    }
    else {
        return true;
    }
}

function validarUsuario() {
    var error = false;
    var mensajesError = "";
    var snackbar = document.getElementById("snackbar");
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (email == '') {
        error = true;
        mensajesError+="<p>El Campo email no puede estar vacio</p>";
    }

    if (password == '') {
        error = true;
        mensajesError+="<p>El Campo password no puede estar vacio</p>";
    }

    if (error) {
        snackbar.className = "show";
        snackbar.innerHTML = mensajesError;
        setTimeout(function () { snackbar.className = snackbar.className.replace("show", ""); }, 4000);
        return false;
    }
    else {
        return true;
    }
}

const inputs = document.querySelectorAll(".input");


function addcl() {
    let parent = this.parentNode.parentNode;
    parent.classList.add("focus");
}

function remcl() {
    let parent = this.parentNode.parentNode;
    if (this.value == "") {
        parent.classList.remove("focus");
    }
}


inputs.forEach(input => {
    input.addEventListener("focus", addcl);
    input.addEventListener("blur", remcl);
});
