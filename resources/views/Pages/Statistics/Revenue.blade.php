@extends('Index')

@section('title', 'Thống kê')

@section('content')
    <script src="/js/Chart.min.js"></script>
    <input type="hidden" name="" id="data" value="{{json_encode($revenueStatistic)}}">
    <div style="text-align: center; padding-top: 40px;">
        <canvas id="income" width="600" height="400"></canvas>
        <p><h5>Thống kê doanh thu theo loại</h5></p>
    </div>
    <script>
        var data = $('#data').val();console.log(data);
        data = JSON.parse(data);
        var arrLabel = [];
        var arrValue = [];
        var arrValue2 = [];
        for(var i=0; i<data.length; i++) {
            arrLabel.push(data[i].name);
            arrValue.push(parseInt(data[i].total));
            arrValue2.push(parseInt(data[i].quantity))
        }
        console.log(arrValue, arrLabel);
        var barData = {
            labels : arrLabel,
            datasets : [
                {
                    fillColor : "#48A497",
                    strokeColor : "#48A4D1",
                    data : arrValue
                },
                {
                    fillColor : "rgba(73,188,170,0.4)",
                    strokeColor : "rgba(72,174,209,0.4)",
                    data : arrValue2
                }
            ]
        }

        // get bar chart canvas
        var income = document.getElementById("income").getContext("2d");

        // draw bar chart
        new Chart(income).Bar(barData);
    </script>
@endsection

@section('script')
    <script src="/js/Chart.min.js"></script>
@endsection
