
<div class=" col-md-5" style="margin:5px;  border:1px solid whitesmoke">
    <h1 style="color: black;">nome</h1>
    <hr>
    <canvas id="mes" width="100%" ></canvas><br>
</div>
<div class=" col-md-5" style="margin:5px;  border:1px solid whitesmoke">
    <h1 style="color: black;">teste</h1>
    <hr>
    <canvas id="myChart2" width="100%" ></canvas><br>
</div>

<script>
    var ctx = document.getElementById("mes").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            datasets: [{
                    label: 'Taxa de Geminação',
                    data: [90, 90, 50, 165, 91, 120, 90, 90, 120, 34, 87, 77],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.9)',
                        'rgba(54, 162, 235, 0.9)',
                        'rgba(255, 206, 86, 0.9)',
                        'rgba(75, 192, 192, 0.9)',
                        'rgba(153, 200, 255, 0.9)',
                        'rgba(255, 159, 64, 0.9)',
                        'rgba(255, 159, 200, 0.9)',
                        'rgba(0, 159, 64, 0.9)',
                        'rgba(255, 30, 64, 0.9)',
                        'rgba(255, 255, 100, 0.9)',
                        'rgba(90, 50, 190, 0.9)',
                        'rgba(60, 255, 255, 0.9)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });


    var ctx = document.getElementById("myChart2").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            datasets: [{
                    label: 'Doações',
                    data: [50, 90, 50, 165, 91, 120, 90, 90, 120, 34, 87, 77],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.9)',
                        'rgba(54, 162, 235, 0.9)',
                        'rgba(255, 206, 86, 0.9)',
                        'rgba(75, 192, 192, 0.9)',
                        'rgba(153, 200, 255, 0.9)',
                        'rgba(255, 159, 64, 0.9)',
                        'rgba(255, 159, 200, 0.9)',
                        'rgba(0, 159, 64, 0.9)',
                        'rgba(255, 30, 64, 0.9)',
                        'rgba(255, 255, 100, 0.9)',
                        'rgba(90, 50, 190, 0.9)',
                        'rgba(60, 255, 255, 0.9)'
                    ],
                    borderColor: [
                        'rgba(255,255,255,9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)',
                        'rgba(255, 255, 255, 9)'
                    ],
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
</script>