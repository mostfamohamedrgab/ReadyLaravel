@push('css')
<style>
  .card {
    width:60%;
    margin: auto;
  }
  .card:hover {
    box-shadow: 2px 2px 10px #eee,-2px -2px 10px #eee
  }
  .card-img-top {
    height: 230px
  }
</style>
@endpush
@extends('layouts.app')
@section('content')
<div class="container">
  <h2 class="text-center">اخر الاخبار</h2>
  <hr />
  @if($news->count())
  @foreach($news as $new)
  <div class="card mb-3">
  <img class="card-img-top" src="{{asset('public/storage/imgs/'.$new->image)}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$new->title}}</h5>
    <p class="card-text">{{$new->description}}.</p>
    <p class="card-text"><small class="text-muted">{{$new->created_at->diffForHumans()}}</small></p>
    <a href="{{route('new',$new->id)}}" class="btn btn-primary">الاطلاع علي الخبر</a>
  </div>
  </div>
  @endforeach
  @else
  <div class="text-center text-info">
    لايوجد جديد حاليا تابعنا <i class="fa fa-smile " style="color:blue"></i>
  </div>
  @endif
</div>
@stop
