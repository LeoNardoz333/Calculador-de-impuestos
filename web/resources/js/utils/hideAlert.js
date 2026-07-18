window.hideAlert = function(alert, timeout = 5000) {
    document.querySelectorAll(".auto-dismiss").forEach(alert => {
        setTimeout(() => {
            alert.remove();
        }, timeout);
    })
}