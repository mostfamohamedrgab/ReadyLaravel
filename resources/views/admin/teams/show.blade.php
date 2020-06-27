@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحه التحكم
            / {{$team->name}}
          </h1>

          <hr style="border-color:#aaa"/>

          </section>
          @include('layouts.msgs')
        <!-- Main content -->
<section class="content">

  <table class="table">
    <thead>
      <tr >
        <td>#</td>
        <td>العضو</td>
        <td>النقاط</td>
        <td>الحاله</td>
      </tr>
    </thead>
    <tbody>


      @foreach($team->users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->points}}</td>
        <td>
          @if($team->creator == $user->id)
            <i
            title="مسؤول"
            class="fa fa-shield text-info"></i>
          @else
            @if($user->pivot->approved)
            <i
            title="نشط"
            class="fa fa-check text-success"></i>
            @else
            <i
            title="بانتظار الموافقة"
            class="fa fa-close text-danger"></i>
            @endif
          @endif
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>

    <hr />

  <canvas id="myChart"></canvas>



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
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! $team->ApprovedUsers->pluck('name') !!},
        datasets: [{
            label: '# Points ' + {!! $team->users->sum('points') !!},
            data: {!! $team->ApprovedUsers->pluck('points') !!},
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
