export const hideAlert = (alertId: string, timeout = 5000) => {
    const alert = document.getElementById(alertId);
    if (alert) {
        setTimeout(() => {
            alert.remove();
        }, timeout);
    }
}