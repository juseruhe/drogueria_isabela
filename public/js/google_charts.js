google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    $.ajax({
        type: "get",
        url: "/ventas/total",
        success: function (response) {
            var data_arr = [
                ['Día', 'Ventas',],
            ];

            $.each(response, function (index, value) {
                data_arr.push(
                   Integer.parseInt() value.dia, value.total
                )
            });

            console.log(data_arr)
           
            var options = {
                title: 'VENTAS DEL MES',
                curveType: 'function',
                legend: { position: 'bottom' }
            };

            var figura = google.visualization.arrayToDataTable(data_arr)

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(figura, options);
        },error: function(error){
            alert(error.status)
        }
    });



}