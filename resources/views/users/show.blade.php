@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="text-center">
    [{{$user->points}}]
    {{$user->name}}
    <i class="fa fa-users"></i>
  </h3>
  <hr />
</div>

@endsection

@section('chart')
<div class="container">
  <canvas id="myChart"></canvas>
</div>
@endsection

@push('css')
  <style>
    #myChart {
      display: none
    }
  </style>
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! $user->challangesSloved->pluck("name") !!},
        datasets: [{
            label: "تحليل النقاط",
            data: {!! $user->challangesSloved->pluck('points') !!},
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(100, 159, 64, 0.2)',
                'rgba(120, 159, 64, 0.2)',
                'rgba(110, 159, 64, 0.2)',
                'rgba(190, 159, 64, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
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
@endpush
