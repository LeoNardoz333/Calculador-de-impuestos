window.togglePasswordVisibility = function(inputId, buttonId, iconId) {
    var passwordInput = document.getElementById(inputId);
    var toggleButton = document.getElementById(buttonId);
    var icon = document.getElementById(iconId);

    if (passwordInput && icon && toggleButton) {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("bi-eye-fill");
            icon.classList.add("bi-eye-slash-fill");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("bi-eye-slash-fill");
            icon.classList.add("bi-eye-fill");
        }
    }
}

window.hideAlert = function(alerta){
    setTimeout(function(){
        if(document.getElementById(alerta)){
            document.getElementById(alerta).style.display="none";
        }
    }, 5000);
}