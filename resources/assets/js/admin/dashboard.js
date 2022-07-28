(function(){
    'use strict'

    ACMESTORE.admin.dashboard = function(){
        charts();
        setInterval(charts,5000)
    }
    function charts(){
        var revenue = $('#revenue');
        var order = $('#order');
        
        var orderLabels = [];
        var revenueLabels = [];
        var orderData = [];
        var revenueData = [];

        axios.get('/admin/charts').then(function(response){
            response.data.orders.forEach(function(monthly){
                orderData.push(monthly.count);
                orderLabels.push(monthly.new_date);
            });

            response.data.revenues.forEach(function(monthly){
                revenueData.push(monthly.amount);
                revenueLabels.push(monthly.new_date);
            });

            new Chart(revenue, {
                type: 'bar',
                data:{
                    labels: revenueLabels,
                    datasets: [{
                        label: '# Revenue',
                        data: revenueData,
                        backgroundColor: [
                            '#0d47a1',
                            '#4bc0c0',
                            '#ffce56',
                            '#1b5e20',
                            '#36a2eb',
                        ]
                    }]
                }
            })
            new Chart(order, {
                type: 'line',
                data:{
                    labels: orderLabels,
                    datasets: [{
                        label: '# Order',
                        data: orderData,
                        backgroundColor: ['#81c784']
                    }]
                }
            })
        })
    }
})();