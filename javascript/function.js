$(document).ready(function() {


    var query = window.location.search.substring(1);
    var vars = query.split("=");
    console.log(vars[1]);

    $.ajax({
        url: "./graphs/average.php?a_id=" + vars[1],
        method: "GET",
        success: function(data) {
            var average = [];
            var assignment_name = [];
            var running_points = 0;
            var running_points_possible = 0;
            var num = 1;
            for (var i in data) {
                assignment_name.push(" ");
                running_points += parseFloat(data[i].points);
                running_points_possible += parseFloat(data[i].points_possible);
                console.log(running_points + " / " + running_points_possible)
                average.push((running_points / running_points_possible) * 100);
                num++;
            }
            var chartdata = {
                labels: assignment_name,
                datasets: [{
                    label: 'Average',
                    backgroundColor: 'rgba(93, 173, 226, 0.4)',
                    borderColor: 'rgb(93, 173, 226)',
                    hoverBackgroundColor: 'rgba(75,192,192,0.4)',
                    hoverBorderColor: 'rgba(75,192,192,0.4)',
                    data: average,


                }]

            };

            var ctx = $("#average");
            var myChart = new Chart(ctx, {
                type: 'line',
                data: chartdata,
                options: {
                    scales: {
                        xAxes: [{
                            display: false
                        }],
                        yAxes: [{
                            position: 'left',
                        }]
                    },
                    title: {
                        display: false,
                    }
                },

            });

            console.log(data);
        },
        error: function(data) {
            console.log(data);
        }
    });

    var a = document.getElementsByTagName("a");
    for (var i = 0; i < a.length; i++) {
        a[i].onclick = function() {
            window.location = this.getAttribute("href");
            return false
        }
    }

});
