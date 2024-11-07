document.addEventListener('DOMContentLoaded', function () {
    setTimeout(() => {
        const successMessage = document.getElementById('settings-success');
        successMessage.classList.add('fade-out');
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 3000);
    }, 2000);
});
