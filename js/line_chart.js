const ctx1 = document.getElementById('line_chart').getContext('2d');
const myChart1 = new Chart(ctx1, {
    type: 'line',
    data: {
labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
datasets: [{
    label: 'Spendings',
    data: [65, 59, 80, 81, 1000, 55, 40],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
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