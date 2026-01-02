window.addEventListener('DOMContentLoaded', function () {

    setTimeout(function () {
        document.getElementById('temp-success-message').style.display = 'none';
        document.getElementById('default-sentence').classList.remove('hidden');

        document.querySelectorAll('.success-alert').forEach(function (el) {
            el.style.transition = 'opacity 0.5s ease';
            el.style.opacity = '0';
            setTimeout(function () { el.remove(); }, 500);
        });
    }, 10000);

});
