import { hideAlert, togglePasswordVisibility } from '../utils';

document.addEventListener("DOMContentLoaded", () => {

    const button =
        document.getElementById("togglePassword");

    if (!(button instanceof HTMLButtonElement)) {
        return;
    }

    button.addEventListener("click", () => {
        togglePasswordVisibility(
            "password",
            "togglePassword",
            "iconPassword"
        );
    });

    hideAlert("alertSuccess");

});