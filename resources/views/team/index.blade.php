@extends('layouts.app')

@section('content')

<div class="container">
  <h3 class="text-center">
    فرقي
    <i class="fa fa-object-group"></i>
  </h3>
  <hr />

@if( ! is_null($UserTeam) )
<div class="item">
  <h4><a href="{{ route('showTeam',$UserTeam->id) }}">
    {{$UserTeam->name}} <i class="fa fa-link"></i> </a></h4>
    <hr />
    <!-- check if he The Manger -->
    @if($UserTeam->creator == $user->id)
    <a href="{{ route('Team.show',$UserTeam->id) }}" class=" join-btn btn btn-success">
      أدراة المجموعه
      <i class="fa fa-shield-alt"></i>
    </a>
    @else
    <!-- check approve status --->

      @if($UserTeam->pivot->approved)
      <a href="{{ route('leaveTeam') }}" class="confirm join-btn btn btn-danger">
        الخروج من المجموعه
        <i class="fa fa-door-open"></i>
      </a>
      @else
      <a href="{{ route('leaveTeam') }}" class="confirm join-btn btn btn-danger">
        الغاء الطلب
        <i class="fa fa-door-open"></i>
      </a>
      @endif

    @endif
  <h5>
    {{$UserTeam->ApprovedUsers->sum('points') }}
    نقطة
  </h5>
</div>
@else

  <a href="{{route('Teams')}}">
لم تنضم لفرق بعد يمكن الانضمام من هنا
  </a>

@endif
</div>

@endsection
@push('js')
  <script type="text/javascript">
    $(document).on('click','.confirm', function (e){

      return confirm('تاكيد ؟');

    });
  </script>
@endpush
@push('css')
  <style>
  .item {
    position: relative;
    text-align: right;
    background: #fff;
    padding: 20px;
    margin: 10px;
    box-shadow: 2px 2px 10px #eee, -2px -2px 10px #eee;
  }
   .item:hover {
    transition: all ease .5s;
    box-shadow: 2px 2px 30px #eee, -2px -2px 30px #eee;
  }
   .item .join-btn{
    position: absolute;
    left: 20px;
    top: 12px;
    color: #fff;
    box-shadow: 2px 2px 10px #eee, -2px -2px 10px #eee;
  }
   .item a{
    text-decoration: none;
    color:#000
  }
  </style>
@endpush
