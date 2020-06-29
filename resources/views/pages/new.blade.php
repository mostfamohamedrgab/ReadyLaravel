@push('css')
<style>
  .section {
    padding: 20px;
    background: #fff;
  }
  .card-img-top {
    width:60%;
    margin: auto;
    display: block;
    height: 230px
  }
</style>
@endpush
@extends('layouts.app')
@section('content')
<div class="container section">
  <h2 class="text-center">{{$new->title}}</h2>
  <hr />

  <img class="card-img-top" src="{{asset('public/storage/imgs/'.$new->image)}}" alt="Card image cap">
  <hr />
  {!!  $new->content !!}
</div>
@stop
