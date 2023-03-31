//get all canvas
//get data
//apply chart data

function setChartData(pieCanvas, barCanvas, options, data) {
    pieCanvas = document.getElementById(pieCanvas);
    barCanvas = document.getElementById(barCanvas);

    // Pie chart
    new Chart(pieCanvas, {
        type: 'doughnut',
        data: {
            labels: options.split(","),
            datasets: [{
                label: '# of Votes',
                data: data.split(","),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Bar chart
    new Chart(barCanvas, {
        type: 'bar',
        data: {
            labels: options.split(","),
            datasets: [{
                label: '# of Votes',
                data: data.split(","),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}