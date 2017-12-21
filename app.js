
$(document).ready(function(){
    $('#question').change(function()
    {          
        var sel_question_id = $('#question').val();
        $.ajax(
        {
            type: "POST",
            url: "http://localhost:100/survey app/charts_data.php",
            data: {sel_question_id:sel_question_id},
            success: function(data) 
            {
                console.log(data);
                var parsed_data = JSON.parse(data);
                console.log("Parse data is "+parsed_data[1].option_text);
                var question = [];
                var count = [];
                var i =0;
                
                for(i in parsed_data) 
                {
                    question.push(parsed_data[i].option_text);   
                    count.push(parsed_data[i].resp_count);                             
                }

                var chartdata = {
                    labels: question,
                    datasets : [
                        {
                            label: 'Responses',
                            backgroundColor: 'rgba(200, 200, 200, 0.75)',
                            borderColor: 'rgba(200, 200, 200, 0.75)',
                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                            data: count
                        }
                    ]
                };
                console.log("cd"+chartdata);
                var ctx = $("#mycanvas");

                var barGraph = new Chart(ctx, 
                {
                    type: 'bar',
                    data: chartdata,
                    options:
                    {
                        scales: 
                        {
                            yAxes: 
                            [{
                                stacked: true,
                                ticks: 
                                {
                                    
                                    min:0,
                                    stepSize:1
                                }
                            }]
                        }
                    }
                });
            },
            error: function(data) 
            {
                console.log(data);
            }
        });
    });
});

;