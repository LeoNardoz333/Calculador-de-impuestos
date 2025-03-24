window.togglePasswordVisibility = function(inputId, buttonId) {
    var passwordInput = document.getElementById(inputId);
    var toggleButton = document.getElementById(buttonId);
    var passwordIcon = toggleButton.querySelector("img");

    if (passwordInput && passwordIcon && toggleButton) {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.src = toggleButton.dataset.hide;
        } else {
            passwordInput.type = "password";
            passwordIcon.src = toggleButton.dataset.show;
        }
    }
}