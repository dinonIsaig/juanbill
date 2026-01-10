document.addEventListener('DOMContentLoaded', function () {

    function setupStatusToggle(statusId, dateId) {
        const statusSelect = document.getElementById(statusId);
        const dateInput = document.getElementById(dateId);

        if (!statusSelect || !dateInput) return;

        function toggle() {
            if (statusSelect.value === 'Paid') {
                dateInput.disabled = false;
            } else {
                dateInput.disabled = true;
                dateInput.value = ''; 
            }
        }

        toggle();

        statusSelect.addEventListener('change', toggle);
    }

    setupStatusToggle('addStatusSelect', 'addDatePaidInput');
    setupStatusToggle('editStatusSelect', 'editDatePaidInput');
});