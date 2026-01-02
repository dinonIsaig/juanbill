function applyFilters(modalId) {

    const selectedYear = document.getElementById('filter-year').value;
    const selectedMonth = document.getElementById('filter-month').value;
    const selectedStatus = document.getElementById('filter-status').value;

    const rows = document.querySelectorAll('.transaction-row');

    rows.forEach(row => {
        const rowYear = row.getAttribute('data-year');
        const rowMonth = row.getAttribute('data-month');
        const rowStatus = row.getAttribute('data-status');

        const yearMatch = (selectedYear === 'all' || selectedYear === rowYear);
        const monthMatch = (selectedMonth === 'all' || selectedMonth === rowMonth);
        const statusMatch = (selectedStatus === 'all' || selectedStatus === rowStatus);

        if (yearMatch && monthMatch && statusMatch) {
            row.classList.remove('hidden');
        } else {
            row.classList.add('hidden');
        }
    });

    document.getElementById(modalId).classList.add('hidden');
}

window.applyFilters = applyFilters;
