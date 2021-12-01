let labels = ['Service Parts', 'Brakes', 'Engine', 'Suspension And Steering', 'Transmission', 'Cooling & Heating', 'Electrical & Lighting', 'Body & Exhaust'];
let data = [83, 67, 66, 61, 47, 187,25,14];
let colors = ['#a51e2c', '#ff928e', '#84ff67', '#1a6e70', '#fbb755', '#ff71a8', 
'#124c87', '#9b9bd7'];

let myChart4 = document.getElementById("myChart").getContext('2d');

let chart4 = new Chart(myChart4, {
    type: 'doughnut',
    data: {
        labels: labels,
        datasets: [ {
            data: data,
            backgroundColor: colors
        }]
    },
    options: {
        title: {
            text: "Population of the European Union (in mio)",
            display: true
        }
    }
});