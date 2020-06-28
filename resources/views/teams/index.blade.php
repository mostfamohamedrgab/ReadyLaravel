@extends('layouts.app')

@section('content')
<div class="container">
  <h3 class="text-center">
    الفرق
    <i class="fa fa-object-group"></i>
  </h3>
  <hr />
</div>
@endsection

@section('chart')
<div class="container">
  <canvas id="myChart"></canvas>
  <section class="analyzing">
    @foreach($teams as  $team)
    <div class="item">
      <h4><a href="{{ route('showTeam',$team->id) }}">
        {{$team->name}} <i class="fa fa-link"></i> </a></h4>
        <hr />
        @if(auth()->check())
        <!-- check User Stustes With Groups !-->
          @php
            $user = auth()->user();
            $userTeams = auth()->user()->TeamsJoined;
          @endphp
            @if($user->id == $team->creator)
            <a class="join-btn btn btn-success">
                مسؤول
               <i class="fa fa-shield-alt"></i>
            </a>
            @else
            @if(in_array($team->id,$userTeams->pluck('team_id')->toArray() ))
              @if(in_array($user->id,$team->waitToApprovedUsers->pluck('user_id')->toArray() ) )
              <a href="{{ route('joinTeam',$team->id) }}" class="join-btn btn btn-danger">
                حذف الطلب
                 <i class="fa fa-window-close"></i>
              </a>
              @else
              <a href="{{ route('joinTeam',$team->id) }}" class="join-btn btn btn-danger">
                الخروج من المجموعه
                 <i class="fa fa-window-close"></i>
              </a>
              @endif
          @else
          <a href="{{ route('joinTeam',$team->id) }}" class="join-btn btn btn-info">
            طلب الانضمام <i class="fa fa-user-plus"></i>
          </a>
          @endif
          @endif
        @endif
      <h5>
        {{$team->points}}
        نقطة
      </h5>
    </div>
    @endforeach
  </section>
</div>
@endsection

@push('css')
  <style>
    #myChart {
      display: none
    }
    .analyzing {
      margin-bottom: 20px;
    }
    .analyzing .item {
      position: relative;
      text-align: right;
      background: #fff;
      padding: 20px;
      margin: 10px;
      box-shadow: 2px 2px 10px #eee, -2px -2px 10px #eee;
    }
    .analyzing .item:hover {
      transition: all ease .5s;
      box-shadow: 2px 2px 30px #eee, -2px -2px 30px #eee;
    }
    .analyzing .item .join-btn{
      position: absolute;
      left: 20px;
      top: 12px;
      color: #fff;
      box-shadow: 2px 2px 10px #eee, -2px -2px 10px #eee;
    }
    .analyzing .item a{
      text-decoration: none;
      color:#000
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
        labels: {!! $teams->pluck('name') !!},
        datasets: [{
            label: "# لوحة بينات الفرق",
            data: {!! $teams->pluck('points') !!},
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
