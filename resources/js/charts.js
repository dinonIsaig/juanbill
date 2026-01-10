import Chart from 'chart.js/auto';

// Make this function available globally
window.initAnnualChart = function(canvasId, label, data, unit = '', color = '#1e3a8a') {
    const ctx = document.getElementById(canvasId);

    if (!ctx) return;

    // Check if a chart instance already exists and destroy it (to prevent glitches when updating)
    const existingChart = Chart.getChart(ctx);
    if (existingChart) {
        existingChart.destroy();
    }

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: label,
                data: data,
                backgroundColor: color,
                borderColor: color,
                fill: false,
                tension: 0.3, // Smooth curves
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y + ' ' + unit;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [2, 4],
                        color: '#e5e7eb'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
};

window.initDualChart = function(canvasId, year, elecData, waterData) {
    const ctx = document.getElementById(canvasId);
    if (!ctx) return;

    // Destroy existing chart to prevent overlay glitches
    const existingChart = Chart.getChart(ctx);
    if (existingChart) {
        existingChart.destroy();
    }

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Electricity (kWh)',
                    data: elecData,
                    borderColor: '#fbbf24',
                    backgroundColor: '#fbbf24',
                    yAxisID: 'y',
                    tension: 0.3,
                    pointRadius: 4,
                },
                {
                    label: 'Water (m³)',
                    data: waterData,
                    borderColor: '#3b82f6',
                    backgroundColor: '#3b82f6',
                    yAxisID: 'y1',
                    tension: 0.3,
                    pointRadius: 4,
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            plugins: {
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    text: 'Consumption Overview (' + year + ')'
                }
            },
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: { display: true, text: 'Electricity (kWh)' },
                    grid: { borderDash: [2, 4], color: '#f3f4f6' }
                },
                y1: {
                    type: 'linear',
                    display: true,
                    position: 'right',
                    title: { display: true, text: 'Water (m³)' },
                    grid: { drawOnChartArea: false }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });
};
