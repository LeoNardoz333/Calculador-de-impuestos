export const togglePasswordVisibility = function (inputId: string, buttonId: string, iconId: string) {
    var passwordInput = document.getElementById(inputId);
    var toggleButton = document.getElementById(buttonId);
    var icon = document.getElementById(iconId);

    if (!(passwordInput instanceof HTMLInputElement) ||
        !(toggleButton instanceof HTMLButtonElement) ||
        !(icon instanceof HTMLElement)) {
        return;
    }

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