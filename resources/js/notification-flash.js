window.addEventListener('DOMContentLoaded', function () {
    const successAlert = document.getElementById('alert-success');
    const errorAlert = document.getElementById('alert-error');

    const hideAlert = (alertElement) => {
        if (alertElement) {
            setTimeout(() => {
                alertElement.style.transition = 'opacity 0.5s ease';
                alertElement.style.opacity = '0';
                setTimeout(() => {
                    alertElement.remove();
                }, 500); // Wait for fade out to complete
            }, 5000); // 5 seconds timeout
        }
    };

    hideAlert(successAlert);
    hideAlert(errorAlert);
});