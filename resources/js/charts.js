document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('myChart');

    if (ctx) {
        new window.Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    data: [1800, 5459, 3500, 1950, 5850, 4000],
                    backgroundColor: '#1e3a8a',
                    borderColor: '#1e3a8a',
                    fill: false,
                    tension: 0.1,
                    pointRadius: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
            }
        }});
    }
});
