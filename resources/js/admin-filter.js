function adminApplyFilters(modalId) {

    const selectedMonth = document.getElementById('filter-month').value;
    const selectedBuilding = document.getElementById('filter-building').value; 
    const selectedFloor = document.getElementById('filter-floor').value;       
    const typedUnit = document.getElementById('filter-unit').value.trim();     

    const rows = document.querySelectorAll('.transaction-row');

    rows.forEach(row => {

        
        const rowFullUnit = row.getAttribute('data-unit') || ""; 
        const rowMonth = row.getAttribute('data-month');

        const rowBuilding = "0" + rowFullUnit.charAt(0); 
        const rowFloor = "0" + rowFullUnit.charAt(1);    
        const rowRoom = rowFullUnit.substring(2);        

        
        const monthMatch = (selectedMonth === 'all' || selectedMonth === rowMonth);
        
        
        const buildingMatch = (selectedBuilding === 'all' || selectedBuilding === rowBuilding);
        const floorMatch = (selectedFloor === 'all' || selectedFloor === rowFloor);
        const unitMatch = (typedUnit === '' || rowFullUnit === typedUnit);

        
        if (monthMatch && buildingMatch && floorMatch && unitMatch) {
            row.classList.remove('hidden');
        } else {
            row.classList.add('hidden');
        }
    });

    
    document.getElementById(modalId).classList.add('hidden');
}

window.adminApplyFilters = adminApplyFilters;