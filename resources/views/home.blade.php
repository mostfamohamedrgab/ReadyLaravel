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

  <h2 class="text-center section-title">سرداب </h2>

  <div class="row">

    <div class="col-md-4 col-sm-12">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">
            <i class="fas fa-door-open"></i>
          </h5>
          <p class="card-text">
          قم بتسجيل حساب وتجميع اعلي النقاط
          يقوم النظام بالعمل علي اعلي نظم الحماية لحفظ البينات وضمان عدم
          الغش او التلاعب
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-12">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">
            <i class="fa fa-users"></i>
          </h5>
          <p class="card-text">
            قم بتجميع فريق من اصدقائك ودعوتهم للعلب في الفريق الخاص
            بك لكي تجمع اعلي النقاط وتتصدر لوحه الشرف الخاصه بالفرق
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-sm-12">
      <div class="card text-center">
        <div class="card-body">
          <h5 class="card-title">
            <i class="fas fa-chart-line"></i>
          </h5>
          <p class="card-text">
            شارك في احلي اكبر عدد من التحديات واثبت مهاراتك لجميع الاعبين
          </p>
        </div>
      </div>
    </div>
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
      <hr />
      <a href="{{ route('news') }}" class="show-news btn btn-primary">عرض الاخبار</a>
  </div>
</section>
<hr />
<p class="text-center">
  جميع الحقوق حفوظه &reg; سرداب
  2020 - {{date('y-m-d')}}
  |
  تصميم وبرمجه
  <a href="#">
    مصطفي
  </a>
</p>
<!-- end goals -->
@endsection
