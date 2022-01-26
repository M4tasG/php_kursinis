const ctx1 = document.getElementById('line_chart').getContext('2d');
const myChart1 = new Chart(ctx1, {
    type: 'line',
    data: {
labels: changeArray,
datasets: [{
    label: 'Change',
    data: changeArray,
    fill: false,
    borderColor: 'rgb(201, 0, 255)',
    tension: 0.1
}]
},
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});