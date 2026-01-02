document.addEventListener('DOMContentLoaded', function() {
    const toggleCheckbox = document.getElementById('toggle_show_password');
    const passwordFields = [
        document.getElementById('password'),
        document.getElementById('new_password'),
        document.getElementById('confirm_password')
    ];

    if (toggleCheckbox) {
        toggleCheckbox.addEventListener('change', function() {
            const type = this.checked ? 'text' : 'password';

            passwordFields.forEach(field => {
                if (field) {
                    field.type = type;
                }
            });
        });
    }
});
