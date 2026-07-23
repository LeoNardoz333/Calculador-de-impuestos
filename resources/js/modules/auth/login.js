import { hideAlert } from '../utils/hideAlert.js';
import { togglePasswordVisibility } from '../utils/togglePasswordVisibility.js';

document.addEventListener("DOMContentLoaded", () => {

    const button =
        document.getElementById("togglePassword");

    if (button) {
        button.addEventListener("click", () => {
            togglePasswordVisibility(
                "password",
                "togglePassword",
                "iconPassword"
            );
        });
    }

    hideAlert("alertSuccess");

});