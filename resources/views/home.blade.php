@push('css')
  <link rel="stylesheet" href="{{ asset('public/css/home.css') }}"></link>
@endpush
@extends('layouts.app')

@section('content')
<!-- start sliders -->
<section class="slider"></section>
<!-- end sliders --->
<!-- start service -->
<section class="service" id="Service">
<div class="container">

  <h2 class="text-center ">الاعلانات </h2>

  <div class="row">
    @foreach($ads as $ad)
    <div class="col-md-4 col-sm-12">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">
            {!! $ad->icon !!}
          </h5>
          <h3 class="card-title">{{$ad->title}}</h3>
          <p class="card-text">
        {{$ad->description}}
          </p>
        </div>
      </div>
    </div>
    @endforeach

  </div>

</div>
</section>
<!-- end service -->
<!-- start gaols-->
<section class="news">
  <div class="container">
      <h2 class="text-center section-title">
        اخر الاخبار <i class="fa fa-bullseye"></i>
      </h2>

      <div class="row">
          @foreach($news as $new)
          <div class="col-md-3 col-sm-12">
            <div class="card">
            <img class="card-img-top" src="{{asset('public/storage/imgs/'.$new->image)}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{$new->title}}</h5>
              <p class="card-text">{{$new->description}}.</p>
              <a href="{{route('new',$new->id)}}" class="btn btn-primary">الاطلاع علي الخبر</a>
            </div>
          </div>
          </div>
          @endforeach
      </div>
  </div>
</section>
<hr />
<p class="text-center">
  جميع الحقوق حفوظه &reg; سرداب
  2020
</p>
<!-- end goals -->
@endsection
