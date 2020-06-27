@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحه التحكم
          </h1>
        </section>
        <hr style="border-color:#fff"/>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">الرسائل</span>
                  <span class="info-box-number">{{ App\Contact::count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-shield"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">المسؤؤولين</span>
                  <span class="info-box-number">{{ App\Admin::count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">الاعضاء</span>
                  <span class="info-box-number">{{ App\User::count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-gray"><i class="fa fa-th-list"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">الاقسام</span>
                  <span class="info-box-number">{{ App\Cat::count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-bar-chart-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">التحديات</span>
                  <span class="info-box-number">{{ App\Challenge::count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-gray"><i class="fa fa-sitemap"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">الصفحات</span>
                  <span class="info-box-number">{{ App\Page::count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-steam-square"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">الفرق</span>
                  <span class="info-box-number">  {{ App\Team::count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->


            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-newspaper-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">الاخبار</span>
                <span class="info-box-number">  {{ App\News::count() }}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->


        </div>

        <hr style="border-color:skyblue"/>
        <h2 class="d-block w-100 text-center">تحليلات الفرق</h2>
        <hr style="border-color:skyblue"/>
        <div class="row">
          @foreach($teams as $team)
          <div class="col-md-6 col-sm-12">
            <canvas  id="myChart-{{$team->id}}"></canvas>
          </div>
          @endforeach
        </div>
@stop

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@foreach($teams as $team)
<canvas id="myChart-{{$team->id}}" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('myChart-'+ {{$team->id}}).getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! $team->ApprovedUsers->pluck('name') !!},
        datasets: [{
            label: '{!! $team->name !!}'+' => Points ' + {!! $team->ApprovedUsers->sum('points') !!},
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
@endforeach
@endpush
@push('css')
  <style>
    canvas {
      display: none
    }
    .chartjs-render-monitor
    {
      margin: 5px;
      min-height: 250px;
      max-height: 250px;
    }
  </style>
@endpush
