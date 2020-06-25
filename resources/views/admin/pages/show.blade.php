@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحه التحكم
            / {{$page->name}}
          </h1>

          <hr style="border-color:#aaa"/>

          </section>
          @include('layouts.msgs')
        <!-- Main content -->
<section class="content">

      <div class="text-r modal-content">

        <div class="modal-body">
          <h4>عنوان الخبر</h4>
          <h5>{{$page->title}}.</h5>          
          <hr />
          <h4>المحتوي</h4>
          {!! $page->content !!}
        </div>

      </div>


@endsection
