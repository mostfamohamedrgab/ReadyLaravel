@push('css')
<style>
  .py-4{
    padding-top: 0 !important
  }
</style>
@endpush
@extends('layouts.app')
@section('content')
<!-- ======================= Start Contact Us ======================= -->
<div class="contact-us">
  <div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
      <h1 class="display-4">اتصل بنا</h1>
      <p class="lead">نود ان نكون دائما بالقرب منك .</p>
    </div>
  </div>

  <div class="container">
    <div class="contact-icon">
      <div class="row">
        <div class="col-md-3 text-center">
          <a href="#">
            <i class="fa fa-map-marker"></i>
          </a>
          <p>
            حقل نصي يمكن تغيره ,
            حقل نصي يمكن تغيره ,
            حقل نصي يمكن تغيره ,

          </p>
        </div>

        <div class="col-md-3 text-center">
          <a href="#">
            <i class="fa fa-mail-bulk"></i>
          </a>
          <p>serdabio@gmail.com</p>
        </div>

        <div class="col-md-3 text-center">
          <a href="#">
            <i class="fa fa-phone"></i>
          </a>
          <p>+90 123 458 9632 1478</p>
        </div>

        <div class="col-md-3 text-center">
          <a href="#">
            <i class="fa fa-mobile"></i>
          </a>
          <p>+90 111 33356 97746</p>
        </div>
      </div>
    </div>

    <div class="contact-form">
      <form method="post" action="{{ route('contact') }}">
        @csrf
        <div class="form-group">
          <input type="text" class="form-control"   placeholder="الاسم"
            value="{{old('name')}}" required="required" name="name">
        </div>

        <div class="form-group">
          <input type="email" class="form-control" placeholder="الايميل"
          value="{{old('email')}}" required="required" name="email">
        </div>

        <div class="form-group">
          <textarea class="form-control" required="required" name="msg"  rows="10" placeholder="الرساله">{{old('msg')}}</textarea>
        </div>

        <button type="submit" class="btn btn-success">
          ارسال
        </button>
      </form>
    </div>
  </div>

</div>
<!-- ======================= End Contact Us ======================= -->


@stop
