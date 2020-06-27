@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحه التحكم
            / {{$new->name}}
          </h1>

          <hr style="border-color:#aaa"/>

          </section>
          @include('layouts.msgs')
        <!-- Main content -->
<section class="content">

      <div class="text-r modal-content">

        <div class="modal-body">
          <h4>عنوان الخبر</h4>
          <h5>{{$new->title}}.</h5>
          <hr />
          <h4>صوره الخبر</h4>
          <h5>
            <img src="{{asset('public/storage/imgs/'.$new->image)}}"
              style="width:60px;height:60px;border-radius:50%" />
            .</h5>
          <hr />

          <h4>وصف قصير</h4>
          <h5>{{$new->description}}.</h5>
          <hr />
          <h4>المحتوي</h4>
          {!! $new->content !!}
        </div>

      </div>


@endsection
