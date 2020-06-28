@extends('layouts.app')

@section('content')
<div class="container" style="position:relative">
  <h3 class="text-center">
    [{{$team->points}}]
    {{$team->name}}
    <i class="fa fa-object-group"></i>
  </h3>

  <form action="{{ route('Team.destroy',$team->id) }}" method="post">
    @csrf
    @method('DELETE')
    <button class="join-btn btn btn-danger confirm">
      حذف الفريق
       <i class="fa fa-door-open"></i>
    </button>
  </form>



  <hr />
</div>

@endsection

@section('chart')
<div class="container">
  <canvas id="myChart"></canvas>

  <section class="analyzing">
    @foreach($team->users as $index => $user)

    <div class="item">
      <h4><a href="{{ route('Users.show',$user->id) }}">
        <small class="text-info" style="margin-right:10px">
          <!--- check status -->
          {{$user->pivot->approved == 1 ? 'نشيط' : 'بانتظار الموافقة'}}
        </small>
        {{$user->name}} <i class="fa fa-link"></i> [{{$index + 1}}]</a></h4>
        @if($team->creator == $user->id)
          <i class="fa fa-shield-alt"></i>
        @else

          @if($user->pivot->approved)
          <a href="{{ route('AdminRemoveUser',[$user->id,$team->id]) }}" class="confirm join-btn btn text-light btn-danger">
          حذف العضو
            <i class="fa fa-door-open"></i>
          </a>

          @else
          <a
          style="left:12%"
          href="{{ route('Adminapprove',[$user->id,$team->id]) }}" class="confirm join-btn btn text-light btn-success">
          قبول
            <i class="fa fa-check"></i>
          </a>

          <a href="{{ route('AdminRemoveUser',[$user->id,$team->id]) }}" class="confirm join-btn btn text-light btn-danger">
            الغاء الطلب
            <i class="fa fa-door-open"></i>
          </a>
          @endif

        @endif
        <hr />
      <h5>
        {{$user->points}}
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

    .join-btn{
      position: absolute;
      left: 10px;
      top: 2px;
      color: #fff;
      box-shadow: 2px 2px 10px #eee, -2px -2px 10px #eee;
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
    .analyzing .item .join-btn {
      top:10%
    }

    .analyzing .item a{
      text-decoration: none;
      color:#000
    }
  </style>
@endpush
@push('js')
  <script type="text/javascript">
    $(document).on('click','.confirm', function (e){

      return confirm('تاكيد ؟');

    });
  </script>
@endpush
@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! $team->ApprovedUsers->pluck("name") !!},
        datasets: [{
            label: "تحليل النقاط",
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
