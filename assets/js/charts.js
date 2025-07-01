let subscriptionChart;

function initCharts() {
    const subscriptionCanvas = document.getElementById('subscriptionChart');
    if (!subscriptionCanvas || !chartData || !chartData.labels) return;
    
    const subscriptionCtx = subscriptionCanvas.getContext('2d');
    subscriptionChart = new Chart(subscriptionCtx, {
        type: 'line',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'New Subscriptions',
                data: chartData.data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                tension: 0.1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            scales: { 
                y: { 
                    beginAtZero: true 
                } 
            }
        }
    });
    
    // Add event listeners to range buttons
    document.querySelectorAll('.chart-header .btn-group button').forEach(btn => {
        btn.addEventListener('click', function() {
            const days = parseInt(this.getAttribute('data-range'));
            updateChartTimeRange(days);
        });
    });
}

function updateChartTimeRange(days) {
    fetch(`forms/get_subscription_growth.php?range=${days}`)
        .then(res => res.json())
        .then(json => {
            chartData.labels = json.map(e => e.date);
            chartData.data = json.map(e => e.count);

            if (subscriptionChart) {
                subscriptionChart.data.labels = chartData.labels;
                subscriptionChart.data.datasets[0].data = chartData.data;
                subscriptionChart.update();
            }

            // Update active button state
            document.querySelectorAll('.chart-header .btn-group button').forEach(b => {
                b.classList.remove('active');
            });
            document.querySelector(`.chart-header .btn-group button[data-range="${days}"]`).classList.add('active');
        });
}

// Initialize after data is loaded (handled in admin.php script tag)