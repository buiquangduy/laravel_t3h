$(document).ready(function () {
    var arrTunoverTotals = [];
    var arrRevenueTotals = [];
    $.ajax({
        url: "/laravel_t3h/admin/report/getturnover",
        method: "GET",
        success: function (response) {
            var data = {};
            $.each(response.data, function (i, item) {
               data[item.month] = item;
            });
            console.log(data);

            $.each(response.month, function (i, item) {
                var tm= data[item] ? data[item].qty : 0;
                arrTunoverTotals.push(tm);
                tm= data[item] ? data[item].amount : 0;
                arrRevenueTotals.push(tm);
            });
            // Line chart tổng số hoa don
            var ctx = document.getElementById("lineChart");
            var lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: response.month,
                    datasets: [{
                        label: "My First dataset",
                        backgroundColor: "rgba(38, 185, 154, 0.31)",
                        borderColor: "rgba(38, 185, 154, 0.7)",
                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointBorderWidth: 1,
                        data: arrTunoverTotals
                    }]
                }
            });
            //line tong so tien
            var ctx = document.getElementById("mybarChart");
            var mybarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: response.month,
                    datasets: [{
                        label: '# of Votes',
                        backgroundColor: "#26B99A",
                        data: arrRevenueTotals
                    }]
                }
            });
        }
    });
});